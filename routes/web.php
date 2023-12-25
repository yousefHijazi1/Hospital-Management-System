<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\Auth\LoginController;


// Authenticated users routes
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class,'redirect'])->name('home');
    Route::get('/settings',function(){ return view('admin.setting');})->name('setting');
    Route::post('/permission/{userId}',[AdminController::class,'togglePermission'])->name('permission');
    Route::post('/profileUpdate/{user}',[AdminController::class,'profileUpdate'])->name('profileUpdate');
    Route::delete('/delete/{id}',[AdminController::class,'destroy'])->name('delete');
});

// Project index route
Route::get('/',[HomeController::class,'index'])->name('index');

// Guest pages routes
Route::get('/about', function () { return view('pages.about'); })->name('about');
Route::get('/details', function () { return view('pages.details'); })->name('details');
Route::get('/blog', function () { return view('pages.blog'); })->name('blog');

// Contact us routes
Route::get('/contact', [ContactsController::class ,'index'])->name('contact');
Route::post('/contact_store',[ContactsController::class,'store'])->name('contact_store');

// Appointments routes
Route::post('/appointment',[AppointmentsController::class,'store'])->name('appointment_store');
Route::delete('/appointment_delete/{id}/',[AppointmentsController::class,'destroy'])->name('appointment_delete');

