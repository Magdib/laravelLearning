<?php

// use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;
Route::view('/' , 'welcome' );
Route::view('contact' , 'contact' );
Route::view('about' , 'about' );
Route::get('customers',[CustomersController::class,'list']);
Route::post('customers',[CustomersController::class,'store']);


