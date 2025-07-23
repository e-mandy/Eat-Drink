<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;  

use App\Http\Controllers\PasswordResetController;

Route::get('/', function () {
    return view('home');
});

Route::group([
    'as' => 'auth.',
    'prefix' => 'auth'
    ], function (){
    Route::get('/connexion', function () {
        return view('auth.connexion');
    })->name('connexion');
});

//Pour afficher le formulaire
Route::group([
    'as' => 'auth.',
    'prefix' => 'auth'
], function(){

    Route::get('/inscription', function () {
        return view('auth.inscription');
    })->name('inscription');

    Route::get('/connexion', function () {
        return view('auth.connexion');
    })->name('connexion');

    Route::post('/connexion',[AuthController::class,'connexion'])->name('connexion.submit');

    Route::post('/inscription',[AuthController::class,'inscription'])->name('inscription.submit');

    Route::get('/mot-de-passe-oublie', [PasswordResetController::class, 'showLinkRequestForm'])->name('password.request');
    
    Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');

    Route::post('/mot-de-passe-email', [PasswordResetController::class, 'sendResetLinkEmail'])->name('password.email');

    Route::post('/reset-password', [PasswordResetController::class, 'reset'])->name('password.update');
});


//Route pour l'inscription

//Route pour mot de passe et email


Route::get('/dashboard', function(){
    return view('entrepreneur.dashboard');
})->name('dashboard');

Route::group(['as' => "entrepreneur.", 'prefix' => "entrepreneur", 'middleware' => ''], function(){
    
});