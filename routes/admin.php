<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\Category;
use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\SubCategoryController;
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
            Route::get('pasword/change', 'adminPasswordChange')->name('password.change');
            Route::post('pasword/update', 'adminPasswordUpdate')->name('password.update');
        });
        Route::controller(CategoryController::class)
                    ->prefix('category')
                    ->as('category.')
                    ->group(function () {
            Route::get('list', 'index')->name('list');
            Route::post('store', 'store')->name('store');
            Route::get('delete/{id}', 'destroy')->name('destroy');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update', 'update')->name('update');
        });
    Route::controller(SubCategoryController::class)
        ->prefix('sub-category')
        ->as('sub.category.')
        ->group(function () {
           Route::get('list', 'index')->name('list');
           Route::post('store', 'store')->name('store');
           Route::get('delete/{id}', 'destroy')->name('destroy');
           Route::get('edit/{id}', 'edit')->name('edit');
           Route::post('update', 'update')->name('update');
        });
        Route::controller(ChildCategoryController::class)
        ->prefix('child-category')
        ->as('child.category.')
        ->group(function () {
           Route::get('list', 'index')->name('list');
           Route::post('store', 'store')->name('store');
           Route::get('delete/{id}', 'destroy')->name('destroy');
           Route::get('edit/{id}', 'edit')->name('edit');
           Route::patch('update', 'update')->name('update');
        });
        Route::controller(BrandController::class)
        ->prefix('brand')
        ->as('brand.')
        ->group(function () {
           Route::get('list', 'index')->name('list');
           Route::post('store', 'store')->name('store');
           Route::get('delete/{id}', 'destroy')->name('destroy');
           Route::get('edit/{id}', 'edit')->name('edit');
           Route::post('update', 'update')->name('update');
        });

        Route::controller(SettingController::class)
        ->prefix('setting')
        ->as('setting.')
        ->group(function () {
           Route::get('seo', 'seoSetting')->name('seo');
           Route::post('seo/update', 'seoSettingUpdate')->name('seo.update');
           Route::get('smtp', 'smtpSetting')->name('smtp');
           Route::post('smtp/update', 'smtpUpdate')->name('smtp.update');
        });

        Route::controller(PageController::class)
        ->prefix('page')
        ->as('page.')
        ->group(function () {
           Route::get('/', 'index')->name('index');
           Route::post('store', 'store')->name('store');
           Route::get('edit/{id}', 'edit')->name('edit');
           Route::post('update/{id}', 'update')->name('update');
           Route::get('delete/{id}', 'destroy')->name('destroy');

        });

});

