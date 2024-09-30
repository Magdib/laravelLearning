<?php

// use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\HomeController;
Route::view('/', 'home');
Route::view('about' , 'about' );
Route::resource('customers', CustomersController::class);
Route::get('contact',[ContactFormController::class,'create']);
Route::post('contact',[ContactFormController::class,'store']);
////Use Command php artisan ui:auth 
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');