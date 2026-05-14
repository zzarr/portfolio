<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
//Auth
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AppSettingController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ProjectController;

Route::get('/', [LandingPageController::class, 'index']);



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
            Route::post('/profile/update', [AppSettingController::class, 'update'])
                ->name('update');
            Route::post('/profile/photo', [AppSettingController::class, 'updateProfilePhoto'])
                ->name('update_profile_photo');
        });

        Route::group(['prefix' => 'experience', 'as' => 'admin.experience.'], function () {
            Route::get('/', [ExperienceController::class, 'index'])
                ->name('index');
            // DataTables route
            Route::get('/data', [ExperienceController::class, 'data'])
                ->name('data');

            // CRUD routes
            Route::post('/store', [ExperienceController::class, 'store'])
                ->name('store');
            Route::get('/show/{id}', [ExperienceController::class, 'show'])
                ->name('show');
            Route::put('/update/{id}', [ExperienceController::class, 'update'])
                ->name('update');
            Route::delete('/destroy/{id}', [ExperienceController::class, 'destroy'])
                ->name('destroy');
        });

        Route::group(['prefix' => 'tag', 'as' => 'admin.tag.'], function () {
            Route::get('/', [TagController::class, 'index'])
                ->name('index');
            // DataTables route
            Route::get('/data', [TagController::class, 'data'])
                ->name('data');
            // CRUD routes
            Route::post('/store', [TagController::class, 'store'])
                ->name('store');
            Route::get('/show/{id}', [TagController::class, 'show'])
                ->name('show');
            Route::put('/update/{id}', [TagController::class, 'update'])
                ->name('update');
            Route::delete('/destroy/{id}', [TagController::class, 'destroy'])
                ->name('destroy');
        });

        Route::group(['prefix' => 'projects', 'as' => 'admin.projects.'], function () {
            Route::get('/', [ProjectController::class, 'index'])
                ->name('index');
            // DataTables route
            Route::get('/data', [ProjectController::class, 'data'])
                ->name('data');
            // CRUD routes
            Route::post('/store', [ProjectController::class, 'store'])
                ->name('store');
            Route::get('/show/{id}', [ProjectController::class, 'show'])
                ->name('show');
            Route::put('/update/{id}', [ProjectController::class, 'update'])
                ->name('update');
            Route::delete('/destroy/{id}', [ProjectController::class, 'destroy'])
                ->name('destroy');
        });

        Route::post('/logout', [AuthController::class, 'logout'])
            ->name('admin.logout');
    });
});
