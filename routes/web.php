<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


//welcome page
Route::get('/', function () {
    return view('welcome');
})->name("home");

Route::prefix("/auth")->group(function () {
    Route::get("/register", [AuthController::class, "register"])
        ->name("auth.register");
    Route::post("/register", [AuthController::class, "store"])
        ->name("auth.register.post");
    Route::get("/login", [AuthController::class, "login"])
        ->name("auth.login");
    Route::post("/login", [AuthController::class, "authenticate"])
        ->name("auth.login.post");
})->middleware("guest");

Route::prefix("/auth")->middleware("auth")->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::get("/habits/index", [AuthController::class, "viewHabits"]);
