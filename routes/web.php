<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landingPage.page.index');
});



//login
Route::get('/login', function () {
    return view('login');
})->name('login');


Route::get('/admin/dashboard', function () {
    return view('admin.page.dashboard');
})->name('dashboard');
