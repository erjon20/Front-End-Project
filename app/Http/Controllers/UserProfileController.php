<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware(['guest']);
    }

}
