<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\ProductController;
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
    Route::get ('/'               , [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::get ('/products/create', [ProductController::class  , 'create'   ])->name('admin.products.create');
    Route::post('/products'       , [ProductController::class  , 'store'    ])->name('admin.products.store');
    Route::get ('/plans/create'   , [PlanController::class     , 'create'   ])->name('admin.plans.create');
    Route::post('/plans'          , [PlanController::class     , 'store'    ])->name('admin.plans.store');
});

