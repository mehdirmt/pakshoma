<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get ('/'         , [IndexController::class, 'index'         ])->name('index');
Route::post('/cart/add' , [CartController::class , 'addToCart'     ])->name('addToCart');
Route::get ('/cart'     , [CartController::class , 'index'         ])->name('cart.index');
Route::post('/cart/calc', [CartController::class , 'calcTotalPrice'])->name('cart.calcTotalPrice');
