<?php

use Illuminate\Support\Facades\Route;
use Modules\Users\Http\Controllers\UsersController;
use Modules\Users\Http\Controllers\AuthController;


Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('users', UsersController::class)->names('users');
});

// TODO: Add thottle
Route::group([], function () {
    Route::get('users/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('users/create', [UsersController::class, 'store'])->name('users.store');
    Route::get('/login', [AuthController::class, 'index'])->name('login');
});
