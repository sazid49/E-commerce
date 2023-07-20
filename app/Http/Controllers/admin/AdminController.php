<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function adminPasswordChange()
    {
        return view('admin.profile.password_change');
    }
    public function adminPasswordUpdate(Request $request)
    {
        $validated = $request->validate([
             'old_password'=>'required',
             'password'=>'required|min:6|confirmed',
        ]);
        $current_pass = Auth::user()->password;
        $old_pass = $request->old_password;
        $new_pass = Hash::make($request->password);

        if(Hash::check($old_pass,$current_pass)){
           $user = User::query()->findOrFail(Auth::id());
            $user->password = $new_pass; 
            $user->update();
            Auth::logout();
            return redirect()->route('admin.login')->with(['message'=>'Password change success']);

        }else{
            return redirect()->back()->with(['message'=>'Password not match']);
        }
    }
}
