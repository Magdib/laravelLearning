<?php

// use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\HomeController;
Route::view('/', 'home');
Route::view('about' , 'about' );
//For the resource it auto-handle names
Route::resource('customers', CustomersController::class);
Route::get('contact',[ContactFormController::class,'create'])->name('contact.create');
Route::post('contact',[ContactFormController::class,'store'])->name('contact.store');

Auth::routes();
// Form 1
Route::get('/home', [HomeController::class, 'index'])->name('home');