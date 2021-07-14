<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FileUploadController;
use Illuminate\Support\Facades\Route;


// Login
Route::post('/login', [AuthController::class, 'login'])->name('api.login');

// Refresh
Route::post('refresh', [AuthController::class, 'refresh'])->name('api.refresh');

// Login Required Routes
Route::middleware('auth:api')->group(function(){
    // List all users
    Route::get('/users', [AuthController::class, 'index'])->name('api.users');

    // Logout (Revoke Token)
    Route::get('/logout', [AuthController::class, 'logout'])->name('api.logout');
});

Route::post('upload', [FileUploadController::class, 'upload'])->name('api.file.upload');
