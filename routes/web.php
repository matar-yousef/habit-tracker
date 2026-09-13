<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HabitController;
use App\Http\Controllers\CategoryController;

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

Route::prefix("/habits")->middleware("auth")->group(function () {
    Route::get('/', [HabitController::class, 'index'])->name('habits.index');
    Route::get('/create', [HabitController::class, 'create'])->name('habits.create');
    Route::post('/store', [HabitController::class, 'store'])->name('habits.store');
    Route::get('/{habit}/edit', [HabitController::class, 'edit'])->name('habits.edit');
    Route::put('/{habit}', [HabitController::class, 'update'])->name('habits.update');
    Route::delete('/{habit}', [HabitController::class, 'destroy'])->name('habits.destroy');
    Route::post('/{habit}/toggle', [HabitController::class, 'toggle'])->name('habits.toggle');
    Route::get('/{habit}/show', [HabitController::class, 'show'])->name('habits.show');
});

Route::prefix("/categories")->middleware("auth")->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::get('/{category}/show', [CategoryController::class, 'show'])->name('categories.show');
});
