<?php

use App\Http\Controllers\admin\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
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

Route::get('/admin/login',[AdminLoginController::class,'adminLogin'])->name('admin.login')->middleware('guest');


Route::group(['namespace'=>'App\Http\Controllers\admin','prefix'=>'admin','as'=>'admin.','middleware'=>['auth','admin']],function(){
    Route::controller(AdminController::class)
        ->group(function () {
            Route::get('dashboard', 'index')->name('dashboard');
            Route::get('logout', 'adminLogOut')->name('logout');
        });
        Route::controller(CategoryController::class)
                    ->prefix('category')
                    ->as('category.')
                    ->group(function () {
            Route::get('list', 'index')->name('list');
        });

});

