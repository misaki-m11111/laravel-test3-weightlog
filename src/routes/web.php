<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WeightLogController;
use App\Http\Controllers\GoalSettingController;

Route::get('/register/step1', [RegisterController::class, 'showStep1']);
Route::post('/register/step1', [RegisterController::class, 'storeStep1']);

Route::get('/register/step2', [RegisterController::class, 'showStep2']);
Route::post('/register/step2', [RegisterController::class, 'storeStep2']);

Route::middleware('auth')->group(function () {

    Route::get('/weight_logs', [WeightLogController::class, 'index']);

    Route::get('/weight_logs/create', [WeightLogController::class, 'create']);
    Route::post('/weight_logs/create', [WeightLogController::class, 'store']);

    Route::post('/weight_logs/search', [WeightLogController::class, 'search']);

    Route::get('/weight_logs/goal_setting', [GoalSettingController::class, 'edit']);
    Route::put('/weight_logs/goal_setting', [GoalSettingController::class, 'update']);

    Route::get('/weight_logs/{weightLogId}', [WeightLogController::class, 'show']);
    Route::put('/weight_logs/{weightLogId}/update', [WeightLogController::class, 'update']);

    Route::delete('/weight_logs/{id}', [WeightLogController::class, 'destroy']);
});
