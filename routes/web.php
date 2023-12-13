<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class,'redirect'])->name('home');
});

Route::get('/',[HomeController::class,'index'])->name('index');

Route::get('/about', function () { return view('pages.about'); })->name('about');
Route::get('/contact', function () { return view('pages.contact'); })->name('contact');
Route::get('/details', function () { return view('pages.details'); })->name('details');
Route::get('/blog', function () { return view('pages.blog'); })->name('blog');

// Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
