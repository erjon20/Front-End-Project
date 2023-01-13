<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\PostLiked;
use App\Models\Feedback;
use App\Models\NewsLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth']);
    // }

    public function index()
    {
        return view('home');
    }
    public function store(Request $request)
    {
        // newsletter
        $this->validate($request, [
            'email' => 'required|email|max:255|unique:news_letters,email',
        ]);
        NewsLetter::create([
            'email' => $request->email
        ]);

        return view('home');
    }
}
