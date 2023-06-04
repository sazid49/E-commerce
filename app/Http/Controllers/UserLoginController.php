<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserLoginController extends Controller
{
    public  function userLogin()
    {
        return view('auth.userLogin');
    }
}
