<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\frontend\HomeController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('frontend.home');
// });


Route::group(['namespace'=>'App\Http\Controllers\frontend'],function(){

           Route::get('/',[HomeController::class,'index']);
});




Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/login',[UserLoginController::class,'userLogin'])->name('login')->middleware('guest');

Route::get('user/{user}',function(User $user){
       return $user;
});

