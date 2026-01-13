<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;

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

    Route::prefix("dashboard")->group(function() {
        // Dashboard Page
        Route::controller(DashboardController::class)->group(function() {
            Route::get("/", 'index')->name("dashboard");
        });

        // Product Page
        Route::prefix("product")->controller(ProductController::class)->group(function() {
            // View
            Route::get("/", 'index')->name("admin.products.index");
            Route::get("/create", 'create')->name("admin.products.create");
            Route::get("/update/{id}", 'updateView')->name("admin.products.edit");
            
            // Services
            Route::post("/store", 'store')->name("admin.products.store");
            Route::put("/update/{id}", 'update')->name("admin.products.update");
            Route::delete("/delete/{id}", 'delete')->name("admin.products.destroy");
        });
    });
});