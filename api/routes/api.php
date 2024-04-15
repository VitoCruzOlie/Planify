<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// FEITO
Route::group(["prefix" => "/auth"], function() {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:sanctum');
});

Route::group(["prefix" => "/user"], function() {
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/', [UserController::class, 'show'])->name('show');
        Route::get('/confirm/{id}', [UserController::class, 'confirmParticipation'])->name('confirmParticipation');
    });
});

Route::group(["prefix" => "/event"], function() {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/{id}', [UserController::class, 'show'])->name('show');
    Route::post('/', [UserController::class, 'create'])->name('create');
    Route::put('/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
    Route::post('/invite/{id}', [UserController::class, 'destroy'])->name('destroy');
});
