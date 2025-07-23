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

    Route::get('/mot_de_passe_oublie', function(){
        return view('auth.mot_de_passe_oublie');
    })->name('forgot_password');

    ROute::get('/email_verification', function(){
        return view('auth.email_verification');
    })->name('email_verification');
});

Route::group(['as' => "entrepreneur.", 'prefix' => "entrepreneur"], function(){
    Route::get('/dashboard', function(){
        return view('entrepreneur.dashboard');
    })->name('dashboard');
});