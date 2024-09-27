<?php

// use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ContactFormController;
Route::view('/' , 'welcome' );
Route::view('about' , 'about' );
Route::resource('customers', CustomersController::class);
Route::get('contact',[ContactFormController::class,'create']);
Route::post('contact',[ContactFormController::class,'store']);