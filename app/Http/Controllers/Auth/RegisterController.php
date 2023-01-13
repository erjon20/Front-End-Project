<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Ramsey\Uuid\Rfc4122\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Input\Input;

class RegisterController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['guest']);
    // }

    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {

        // validimi i te dhenave te register
        $this->validate($request, [

            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'confirmed'
            ],

           
        ]);

        // krijon nje user me te dhenat e marra

        User::create([

            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);

    
        // pas register e ben log in dhe redirect home
        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('home');
    }
}
