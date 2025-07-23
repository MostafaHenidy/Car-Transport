<?php

use App\Http\Controllers\SupportStaffAuth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:support_stuff')->group(function () {

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('support_stuff')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
