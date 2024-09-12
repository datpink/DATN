<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('orders', OrderController::class);
    // Route cho thùng rác
    Route::get('/orders-trash', [OrderController::class, 'trash'])->name('orders.trash');
    Route::post('/orders/{id}/restore', [OrderController::class, 'restore'])->name('orders.restore');
    Route::delete('/orders/{id}/force-delete', [OrderController::class, 'forceDelete'])->name('orders.forceDelete');
});
