<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(AuthController::class)->group(function() {
    Route::get("/login", "login");
});

// Dashboard Page
Route::controller(DashboardController::class)->group(function() {
    Route::get("/dashboard", 'index');
});