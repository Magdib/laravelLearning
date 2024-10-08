<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\HomeController;
Route::view('/', 'home');
Route::view('about' , 'about' );
Route::resource('customers', CustomersController::class);
Route::get('contact',[ContactFormController::class,'create'])->name('contact.create');
Route::post('contact',[ContactFormController::class,'store'])->name('contact.store');
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
// composer require intervention/image: