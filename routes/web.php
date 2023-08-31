<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\ReportsController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Leave Routes
Route::group(['middleware' => 'auth'], function () {
    Route::get('/leave', [LeaveController::class, 'index'])->name('leave.index');
    Route::post('/leave', [LeaveController::class, 'store'])->name('leave.store');
});

// Reports Routes
Route::group(['middleware' => 'auth'], function () {
    Route::get('/reports/leave-history', [ReportsController::class, 'leaveHistory'])->name('reports.leave.history');
});

