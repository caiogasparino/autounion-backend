<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\FileController;

Route::prefix('/login')->group(function () {
    Route::post('', [LoginController::class, 'login']);
    Route::get('/reset', [LoginController::class, 'reset']);
});

Route::prefix('/user')->group(function () {
    Route::get('', [UserController::class, 'get']);
    Route::post('/edit', [UserController::class, 'edit']);
    Route::post('/create', [UserController::class, 'create']);
    Route::delete('/deleteUserPermanently/{id}', [UserController::class, 'inactivate']);
});

Route::prefix('underAnalysis')->group(function () {
    Route::get('', [AnalysisController::class, 'get']);
    Route::post('/approve/{id}', [AnalysisController::class, 'approve']);
    Route::delete('/reject/{id}', [AnalysisController::class, 'reject']);
});

Route::post('/image/{id}', [FileController::class, 'save']);

Route::get('/', function () {
    return view('welcome');
});