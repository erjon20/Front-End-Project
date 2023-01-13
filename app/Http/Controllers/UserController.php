<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\User;
use App\Models\Image;
use App\Models\ReportBug;
use App\Models\card_details;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('user.usersettings');
    }

    public function carddetails(Request $request)
    {

        // validimi per te dhenat e kartes
        $this->validate($request, [
            'card_number' => 'required|unique:card_details,card_number|max:16|min:16',
            'address1' => 'required',
            'expiration_dateM' => 'required',
            'expiration_dateY' => 'required',
            'csc' => 'required',
            'zip_code' => 'required',
            'payment_id' => 'required',
        ]);

        // kontrollon nese user ka karte qe ti bej update apo nese jo ta krijoj ate

        if (card_details::where('user_id', auth()->user()->id)->exists()) {

            card_details::where('user_id', auth()->user()->id)->update([

                'card_number' => $request->card_number,
                'address1' => $request->address1,
                'expiration_dateM' => $request->expiration_dateM,
                'expiration_dateY' => $request->expiration_dateY,
                'csc' => $request->csc,
                'zip_code' => $request->zip_code,
                'payment_id' => $request->payment_id,

            ]);
        } else {

            card_details::where('id', auth()->user()->id)->create([

                'user_id' => auth()->user()->id,
                'card_number' => $request->card_number,
                'address1' => $request->address1,
                'expiration_dateM' => $request->expiration_dateM,
                'expiration_dateY' => $request->expiration_dateY,
                'csc' => $request->csc,
                'zip_code' => $request->zip_code,
                'payment_id' => $request->payment_id,

            ]);
        }
        return back();
    }

    public function userdetails(Request $request)
    {

        // update per te dhenat e user

        User::where('id', auth()->user()->id)->update([

            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'age' => $request->age,
            'country_name' => $request->country_name,
            'bio' => $request->bio,
        ]);

        return back();
    }



    public function userprofile()
    {
        $userprofile = User::get();

        // user profile view

        return view('pages.userprofile')->with('userprofile', $userprofile);
    }

    public function userChangeProfilePic(Request $request)
    {
        // ndryshimi i fotos se profilit
        User::find(auth()->user()->id)->update([
            'profile_pic' => $request->profile_pic->hashName(),
        ]);


        $request->profile_pic->store('images', 'public');

        return back();
    }
    public function usersettings()
    {
        $users = User::all();
        $bugs = ReportBug::all();
        $likes = Like::get();
        $images = Image::get();

        // kthen user settings me te dhenat e mesiperme nga tabelat e db

        return view('users.usersettings')->with('users', $users)->with('bugs', $bugs)->with('likes', $likes)->with('images', $images);
    }


    public function changePassword(Request $request)
    {

        // kontrollon nese password i vjeter esht i sakt

        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        //update i password te tabela
        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
    }


    public function delete()
    {
        User::find(auth()->user()->id)->delete();
        // deactivate account
        auth()->logout();

        return redirect()->route('home');
    }

    public function deleteByAdmin(Request $request)
    {
        // ben delete user qe admini selekton
        User::find($request->only('currentID'))->first()->delete();

        return redirect()->route('user_settings');
    }


    public function upload(Request $request)
    {

        // validimi i upload

        $this->validate($request, [
            'image_title' => 'required',
            'year' => 'required',
            'resolution' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'image_description' => 'required',
            'author' => 'required',
            'category_id' => 'required',
        ]);


        // krijimi
        Image::where('id', auth()->user()->id)->create([

            "path_name" => $request->path_name->hashName(),
            'image_title' => $request->image_title,
            'year' => $request->year,
            'resolution' => $request->resolution,
            'stock' => $request->stock,
            'price' => $request->price,
            'image_description' => $request->image_description,
            'author' => $request->author,
            'category_id' => $request->category_id,

        ]);
        $request->path_name->store('images', 'public');
        return back();
    }
}
