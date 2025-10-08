<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmploeeController; // 

Route::get('/', function () {
    return view('welcome');
});

Route::resource('employees',EmploeeController::class);