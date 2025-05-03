<?php

use Illuminate\Support\Facades\Route;
use Modules\Dashboard\Http\Controllers\DashboardController;

//middleware(['auth', 'verified'])
Route::group([], function () {
    Route::resource('dashboard', DashboardController::class)->names('dashboard');
});
