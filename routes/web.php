<?php

use Illuminate\Support\Facades\Route;
//Auth
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AppSettingController;

Route::get('/', function () {
    return view('landingPage.page.index');
});

Route::prefix('admin')->group(function () {

    // Guest only
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])
            ->name('admin.login.form');

        Route::post('/login', [AuthController::class, 'login'])
            ->name('admin.login');
    });

    // Authenticated user only
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.page.dashboard');
        })->name('admin.dashboard');

        Route::group(['prefix' => 'app-settings', 'as' => 'admin.app_settings.'], function () {
            Route::get('/', [AppSettingController::class, 'index'])
                ->name('index');
            Route::post('/', [AppSettingController::class, 'update'])
                ->name('update');
        });

        Route::post('/logout', [AuthController::class, 'logout'])
            ->name('admin.logout');
    });
});
