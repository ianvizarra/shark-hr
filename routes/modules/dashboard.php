<?php

use App\Modules\Dashboard\Http\Controllers\DashboardController;

Route::group(['before' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
