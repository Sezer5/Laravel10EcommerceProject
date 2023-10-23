<?php

use App\Http\Controllers\AdminPanel\CategoryController;
use App\Http\Controllers\AdminPanel\ProductGalleryController as ProductGalleryController;
use App\Http\Controllers\AdminPanel\ProductsController;
use App\Http\Controllers\AdminPanel\SlidersController;
use App\Http\Controllers\AdminPanel\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminPanel\HomeController as AdminHomeController;
use Illuminate\Support\Facades\Route;

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
//Sample Comment

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/productdetails/{id}',[HomeController::class,'productdetails'])->name('productdetails');
Route::get('/login_user',[HomeController::class,'login_user'])->name('login_user');
Route::get('/logout_user/{id}',[HomeController::class,'logout_user'])->name('logout_user');
Route::post('/login_user_check' ,[HomeController::class,'login_user_check'])->name('login_user_check');


//ADMİN PANEL ROUTES ADMİN PANEL ROUTES ADMİN PANEL ROUTES ADMİN PANEL ROUTES ADMİN PANEL ROUTES
//ADMİN PANEL ROUTES ADMİN PANEL ROUTES ADMİN PANEL ROUTES ADMİN PANEL ROUTES ADMİN PANEL ROUTES
//ADMİN PANEL ROUTES ADMİN PANEL ROUTES ADMİN PANEL ROUTES ADMİN PANEL ROUTES ADMİN PANEL ROUTES
//ADMİN PANEL ROUTES ADMİN PANEL ROUTES ADMİN PANEL ROUTES ADMİN PANEL ROUTES ADMİN PANEL ROUTES
Route::middleware('admin')->prefix('admin')->name('admin.')->group(function(){
    Route::get('/',[AdminHomeController::class,'index'])->name('index');
    Route::get('/login',[AdminHomeController::class,'login'])->name('login');
    Route::post('/login_admin',[AdminHomeController::class,'login_admin'])->name('login_admin');
    Route::get('/logout',[AdminHomeController::class,'logout'])->name('logout');
    //ADMIN CATEGORY ROUTES ADMIN CATEGORY ROUTES ADMIN CATEGORY ROUTES ADMIN CATEGORY ROUTES
    Route::prefix('/category')->name('category.')->controller(CategoryController::class)->group(function(){
        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::post('/update/{id}','update')->name('update');
        Route::get('/destroy/{id}','destroy')->name('destroy');
        Route::get('/edit/{id}','edit')->name('edit');
    });


    // ADMIN PRODUCTS CONTROLLER ADMIN PRODUCTS CONTROLLERADMIN PRODUCTS CONTROLLER

    Route::prefix('/products')->name('products.')->controller(ProductsController::class)->group(function(){
        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::post('/update/{id}','update')->name('update');
        Route::get('/delete/{id}','destroy')->name('destroy');
        Route::get('/edit/{id}','edit')->name('edit');
    });

    Route::prefix('/gallery')->name('gallery.')->controller(ProductGalleryController::class)->group(function(){

        Route::get('/show/{id}','show')->name('show');
        Route::get('/destroy/{id}','destroy')->name('destroy');
        Route::post('/store','store')->name('store');
    });
    Route::prefix('/sliders')->name('sliders.')->controller(SlidersController::class)->group(function(){

        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::post('/update/{id}','update')->name('update');
        Route::get('/destroy/{id}','destroy')->name('destroy');
        Route::get('/edit/{id}','edit')->name('edit');
    });

    Route::prefix('/users')->name('users.')->controller(UserController::class)->group(function(){
        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::post('/update/{id}','update')->name('update');
        Route::post('/add_role/{id}','add_role')->name('add_role');
        Route::get('/destroy/{id}','destroy')->name('destroy');
        Route::get('/destroy_role/{uid}/{rid}','destroy_role')->name('destroy_role');
        Route::get('/edit/{id}','edit')->name('edit');
    });

});


