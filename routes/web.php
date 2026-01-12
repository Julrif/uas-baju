<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

// public page
Route::controller(HomeController::class)->group(function() {
    Route::get("/", "home");
    Route::get("/products", "products");
    Route::get("/about", "about");
});
Route::middleware("guest")->controller(AuthController::class)->group(function() {
    Route::get("/login", "login")->name("login");
    Route::post("/login", "auth")->name("login.auth");
});

// Dashboard Page
Route::middleware("auth")->group(function() {
    Route::get("/logout", [AuthController::class, "logout"])->name("logout");

    Route::controller(DashboardController::class)->group(function() {
        Route::get("/dashboard", 'index')->name("dashboard");
    });
});