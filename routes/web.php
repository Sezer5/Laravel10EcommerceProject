<?php

use App\Http\Controllers\AdminPanel\CategoryController;
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

Route::get('/admin',[AdminHomeController::class,'index'])->name('index');
Route::get('/admin/category',[CategoryController::class,'index'])->name('index');
Route::get('/admin/category/create',[CategoryController::class,'create'])->name('create');
Route::post('/admin/category/store',[CategoryController::class,'store'])->name('store');
Route::post('/admin/category/update/{id}',[CategoryController::class,'update'])->name('update');
Route::get('/admin/category/delete/{id}',[CategoryController::class,'destroy'])->name('destroy');
Route::get('/admin/category/edit/{id}',[CategoryController::class,'edit'])->name('edit');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
