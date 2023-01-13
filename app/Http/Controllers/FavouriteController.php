<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Image;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    public function index()
    {
        //Merr likes, images dhe i kthen tek user profile 
        $likes = Like::all();
        $images = Image::get();

        return view('pages.userprofile')->with('likes', $likes)->with('images', $images);
    }
}
