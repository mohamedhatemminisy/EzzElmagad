<?php

use App\Http\Controllers\Api\ContractTermsController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


    Route::get('contract_terms', [ContractTermsController::class, 'contractTerms']);
    Route::post('create_user', [UserController::class, 'createUser']);
    Route::post('update_device_token', [UserController::class, 'updateDeviceToken']);
    Route::get('user/{user}', [UserController::class, 'show']);
    Route::get('setting', [SettingController::class, 'index']);
    Route::post('/create_orders', [OrderController::class, 'store']);
    Route::get('/user/{user}/orders', [OrderController::class, 'userOrders']);
    Route::get('/user/{user}/order/{order}', [OrderController::class, 'orderDetails']);
    Route::post('/orders/{order}/update-status', [OrderController::class, 'updateStatus']);
