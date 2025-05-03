<?php

use Illuminate\Support\Facades\Route;
use Modules\Homes\Http\Controllers\HomesController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('homes', HomesController::class)->names('homes');
});
