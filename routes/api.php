<?php

use App\Http\Controllers\backend\Api\AuthController;
use App\Http\Controllers\backend\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('admin')->get('all-product',[ProductController::class,'index']);

// Route::get('all-product',[ProductController::class,'index']);


Route::controller(AuthController::class)->group(function(){
      Route::post('register','register');
      Route::post('login','login');
});