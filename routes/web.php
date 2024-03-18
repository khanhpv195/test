<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Middleware\Admin;


Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')->group(function () {
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

        // Route group for locations
        Route::prefix('locations')->group(function () {
            Route::get('data', [LocationController::class, 'data'])->name('locations.data');
            Route::resource('', LocationController::class);
        });
    });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
