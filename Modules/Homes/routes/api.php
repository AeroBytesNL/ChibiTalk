<?php

use Illuminate\Support\Facades\Route;
use Modules\Homes\Http\Controllers\HomesController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('homes', HomesController::class)->names('homes');
});
