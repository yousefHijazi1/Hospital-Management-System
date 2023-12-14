<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\ContactsController;
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
Route::get('/details', function () { return view('pages.details'); })->name('details');
Route::get('/blog', function () { return view('pages.blog'); })->name('blog');

Route::get('/contact', [ContactsController::class ,'index'])->name('contact');
Route::post('/contact_store',[ContactsController::class,'store'])->name('contact_store');

Route::post('/appointment',[AppointmentsController::class,'store'])->name('appointment_store');
// Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
