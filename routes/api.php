<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\VariationController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\UserTransactionsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::name('api.')->group(function () {
    Route::apiResource('roles', RoleController::class);
    Route::apiResource('permissions', PermissionController::class);

    Route::apiResource('users', UserController::class);

    // User Transactions
    Route::get('/users/{user}/transactions', [
        UserTransactionsController::class,
        'index',
    ])->name('users.transactions.index');
    Route::post('/users/{user}/transactions', [
        UserTransactionsController::class,
        'store',
    ])->name('users.transactions.store');

    Route::apiResource('transactions', TransactionController::class);

    Route::apiResource('variations', VariationController::class);
});
