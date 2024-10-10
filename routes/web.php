<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\HomeController;
Route::view('/', 'home');
Route::view('about' , 'about' );
// Route::resource('customers', CustomersController::class);
Route::get('customers',[CustomersController::class,'index']);
Route::get('customers/create',[CustomersController::class,'create'])->name('customers.create');
Route::post('customers',[CustomersController::class,'store']);
Route::get('customers/{customer}',[CustomersController::class,'show'])->middleware('can:view,customer');
Route::get('customers/{customer}/edit',[CustomersController::class,'edit']);
Route::put('customers/{customer}',[CustomersController::class,'update']);
Route::delete('customers/{customer}',[CustomersController::class,'destroy']);
Route::get('contact',[ContactFormController::class,'create'])->name('contact.create');
Route::post('contact',[ContactFormController::class,'store'])->name('contact.store');
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
// php artisan make:policy CustomerPolicy -m Customers