<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\UserController;

Route::middleware(['throttle:guest'])->group(function () {
    Route::get('/', function () {
        return response()->json('This app is only for tests --- ELDRITCH BLAST!!!!!!');
    });

    Route::post('login', [AuthController::class, 'login']);
    // Route::post('forgot-password', [AuthController::class, 'forgotPassword']);
    // Route::post('reset-password', [AuthController::class, 'resetPassword']);
});

Route::middleware(['auth:sanctum', 'throttle:authenticated'])->group(function () {
    Route::get('validate-token', [AuthController::class, 'validateToken']);

    /**
     * User
     */
    Route::prefix('user')->group(function () {
        Route::post('store', [UserController::class, 'store']); //->middleware('permission:User,store');
        Route::put('update', [UserController::class, 'update']); //->middleware('permission:User,update');
        Route::delete('delete', [UserController::class, 'delete']); //->middleware('permission:User,delete');
        Route::get('show', [UserController::class, 'show']); //->middleware('permission:User,show');
    });

    /**
     * User
     */
    Route::prefix('campaign')->group(function () {
        Route::post('store', [CampaignController::class, 'store']); //->middleware('permission:Campaign,store');
        Route::put('update/{id}', [CampaignController::class, 'update']); //->middleware('permission:Campaign,update');
        Route::put('restore/{id}', [CampaignController::class, 'restore']); //->middleware('permission:Campaign,restore');
        Route::delete('delete/{id}', [CampaignController::class, 'delete']); //->middleware('permission:Campaign,delete');
        Route::get('show/{id}', [CampaignController::class, 'show']); //->middleware('permission:Campaign,show');
    });
});
