<?php

use App\Http\Controllers\AdminPanel\CategoryController;
use App\Http\Controllers\AdminPanel\ProductsController;
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
Route::get('/test',[HomeController::class,'test'])->name('test');

//ADMİN PANEL ROUTES ADMİN PANEL ROUTES ADMİN PANEL ROUTES ADMİN PANEL ROUTES ADMİN PANEL ROUTES
//ADMİN PANEL ROUTES ADMİN PANEL ROUTES ADMİN PANEL ROUTES ADMİN PANEL ROUTES ADMİN PANEL ROUTES
//ADMİN PANEL ROUTES ADMİN PANEL ROUTES ADMİN PANEL ROUTES ADMİN PANEL ROUTES ADMİN PANEL ROUTES
//ADMİN PANEL ROUTES ADMİN PANEL ROUTES ADMİN PANEL ROUTES ADMİN PANEL ROUTES ADMİN PANEL ROUTES
Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/',[AdminHomeController::class,'index'])->name('index');
    //ADMIN CATEGORY ROUTES ADMIN CATEGORY ROUTES ADMIN CATEGORY ROUTES ADMIN CATEGORY ROUTES
    Route::prefix('/category')->name('category.')->controller(CategoryController::class)->group(function(){
        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::post('/update/{id}','update')->name('update');
        Route::get('/delete/{id}','delete')->name('destroy');
        Route::get('/edit/{id}','edit')->name('edit');
    });


    // ADMIN PRODUCTS CONTROLLER

    Route::prefix('/products')->name('products.')->controller(ProductsController::class)->group(function(){
        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::post('/update/{id}','update')->name('update');
        Route::get('/delete/{id}','destroy')->name('destroy');
        Route::get('/edit/{id}','edit')->name('edit');
    });
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
