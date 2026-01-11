<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

// public page
Route::get("/login", [AuthController::class, "login"]);
Route::controller(HomeController::class)->group(function() {
    Route::get("/", "home");
    Route::get("/products", "products");
});

// Dashboard Page
Route::controller(DashboardController::class)->group(function() {
    Route::get("/dashboard", 'index');
});