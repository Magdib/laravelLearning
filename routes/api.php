<?php

use App\Http\Controllers\TestingVueController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('vue',[TestingVueController::class,'index']);