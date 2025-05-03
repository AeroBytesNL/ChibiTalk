<?php

use Illuminate\Support\Facades\Route;
use Modules\Users\Http\Controllers\UsersController;
use Modules\Users\Http\Controllers\AuthController;

// TODO: Add thottle
Route::group([], function () {
    Route::get('users/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('users/create', [UsersController::class, 'store'])->name('users.store');

    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'postLogin'])->name('login.post');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout'); // TODO: Make post
    Route::get('/confirm', [UsersController::class, 'confirmEmail'])->name('email.confirm');
});

Route::get('/new-chibi', function () {
    return view('users::created');
});
