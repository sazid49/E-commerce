<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public  function adminLogin()
    {
        return view('auth.adminLogin');
    }
    
}
