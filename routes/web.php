<?php

// use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;
Route::view('/' , 'welcome' );
Route::view('contact' , 'contact' );
Route::view('about' , 'about' );
Route::get('customers',[CustomersController::class,'index']);
Route::get('customers/create',[CustomersController::class,'create']);
Route::post('customers',[CustomersController::class,'store']);
Route::get('customers/{customer}',[CustomersController::class,'show']);
Route::get('customers/{customer}/edit',[CustomersController::class,'edit']);
Route::put('customers/{customer}',[CustomersController::class,'update']);