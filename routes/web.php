<?php

// use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\HomeController;
Route::view('/', 'home');
Route::view('about' , 'about' );
// //Form 1
// Route::resource('customers', CustomersController::class)->middleware('auth');
// Form 2 + CustomersController Comments
    Route::resource('customers', CustomersController::class);
Route::get('contact',[ContactFormController::class,'create']);
Route::post('contact',[ContactFormController::class,'store']);
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
//php artisan down 
//php artisan up