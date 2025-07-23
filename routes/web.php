<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::group([
    'as' => 'auth.',
    'prefix' => 'auth'
    ], function (){
    Route::get('/inscription', function () {
    return view('auth.inscription');
    })->name('inscription');
    
    Route::get('/connexion', function () {
        return view('auth.connexion');
    })->name('connexion');
});