<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('landingPage.page.index');
})->name('home');

//login
Route::get('/login', function () {
    return view('login');
})->name('login');
