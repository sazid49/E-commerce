<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    public  function adminLogOut()
    {
        Auth::logout();
        $info = ['info'=>'logout Success!'];
        return redirect()->route('admin.login')->with($info);
    }
}
