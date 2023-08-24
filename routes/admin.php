<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get ('/login'       , [AuthController::class, 'login'       ])->name('admin.login');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('admin.authenticate');
Route::get ('/logout'      , [AuthController::class, 'logout'      ])->name('admin.logout');

Route::prefix('dashboard')->middleware('auth:admin')->group(function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
});

