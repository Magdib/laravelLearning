<?php

// use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;
Route::view('/' , 'welcome' );
Route::view('contact' , 'contact' );
Route::view('about' , 'about' );
//We Can Replace Every one of above actions with this:
Route::resource('customers', CustomersController::class);
//Remember to use this to create controller
// php artisan make:controller TestController -r -m Customers