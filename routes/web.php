<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/inscription', function () {
    return view('auth.inscription');
});