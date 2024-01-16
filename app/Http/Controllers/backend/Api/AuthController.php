<?php

namespace App\Http\Controllers\backend\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password'
        ]);

        if($data->fails()){
            return response()->json([
               'success' =>'false',
               'message' =>$data->erroes()
            ],400);
        }

        $input = $request->all();
        $input['password']=bcrypt($input['password']);
        $input['is_admin']=0;
        $user =  User::create($input);

        $success['token'] = $user->createToken('MyApp')->plainTextToken; 
        $success['name'] = $user->name; 
        return response()->json([
           'success' =>'true',
           'data'=>$success,
           'message' =>'user register success'
        ],200);

    }

    public function login(Request $request){
         if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
           $user = Auth::user();
           $success['token'] = $user->createToken('MyApp')->plainTextToken; 
           $success['name'] = $user->name; 
            return response()->json([
            'success' =>'true',
            'data'=>$success,
            'message' =>'user login success'
            ],200);
         }else{
             return response()->json([
               'success' =>'false',
               'message' =>'user login failed'
            ],400);
         }
    }
}
