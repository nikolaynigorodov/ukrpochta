<?php

use App\Http\Controllers\ManagerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', MainController::class)->middleware(['manager.order', 'user.order'])->name('home');

Route::middleware(['auth', 'manager.order'])->group(function () {
    Route::get('/manager', [ManagerController::class, 'showOrders'])->name('manager');
    Route::post('/manager-change-answer', [ManagerController::class, 'changeAnswer'])->name('change_answer_ajax');
});

Route::middleware(['auth', 'user.order'])->group(function () {
    Route::get('/order', [OrderController::class, 'showOrderForm'])->name('order');
    Route::post('/order_process', [OrderController::class, 'storeOrder'])->name('order_process');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login_process', [LoginController::class, 'login'])->name('login_process');

    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/register_process', [RegisterController::class, 'register'])->name('register_process');
});
