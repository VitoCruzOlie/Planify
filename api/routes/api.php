<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;



Route::group(["prefix" => "/auth"], function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:sanctum');
});

Route::group(["prefix" => "/user"], function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/', [UserController::class, 'show'])->name('show');
        Route::get('/events', [UserController::class, 'events'])->name('userEvents');
        Route::get('/events/invites', [UserController::class, 'eventsInvites'])->name('userEvents');
        Route::post('/confirm/{id}', [UserController::class, 'confirmParticipation'])->name('confirmParticipation'); 
    });
});

Route::group(["prefix" => "/event"], function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/', [EventController::class, 'index'])->name('index');
        Route::get('/{id}', [EventController::class, 'show'])->name('show');
        Route::post('/', [EventController::class, 'create'])->name('create');
        Route::put('/{id}', [EventController::class, 'update'])->name('update');
        Route::delete('/{id}', [EventController::class, 'destroy'])->name('destroy');
    });
});

Route::group(["prefix" => "/invite"], function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/{id}', [EventController::class, 'invite'])->name('invite');
        Route::delete('/{id}', [EventController::class, 'removeInvite'])->name('removeInvite');
    });
});


