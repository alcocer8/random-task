<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Routes Guest
Route::middleware("guest")->group(function () {
    Route::controller(LoginController::class)->group(function () {
        Route::get("/login", "index")->name("login");
        Route::post("/login", "store")->name("login.store");
    });

    Route::controller(RegisterController::class)->group(function () {
        Route::get("/register", "index")->name("register");
        Route::post("/register", "store")->name("register.store");
    });

    Route::get("/test", function(){
        return response()->json([
            "msg" => env("DB_CONNECTION")
        ]);
    });
});


Route::middleware("auth")->group(function(){
    Route::controller(DashboardController::class)->group(function(){
        Route::get("/dashboard", "index")->name("dashboard");
    });

    // Logout
    Route::get("/logout", [LogoutController::class, "index"])->name("logout.index");
});