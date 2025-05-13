<?php

use Illuminate\Support\Facades\Route;
use Modules\Homes\Http\Controllers\HomesController;
use Modules\Homes\Http\Controllers\ChannelsController;
use Modules\Homes\Http\Controllers\MessagesController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/homes/{homeId}', [HomesController::class, 'show'])->name('homes.show');
    Route::resource('homes', HomesController::class)->names('homes');
    Route::post('/channels/create', [ChannelsController::class, 'store'])->name('channels.store');
    Route::resource('messages', MessagesController::class)->names('messages');
});

Route::get('/invite/{homeId}', [HomesController::class, 'invite'])->name('homes.invite');
Route::post('/invite/{homeId}', [HomesController::class, 'invitePost'])->name('homes.invitePost');
