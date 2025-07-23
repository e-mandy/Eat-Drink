<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;  

use App\Http\Controllers\PasswordResetController;

Route::get('/', function () {
    return view('home');
});


//Pour afficher le formulaire
Route::get('/inscription', function () {
    return view('inscription');
})->name('inscription.form');

Route::get('/mot-de-passe-oublie', [PasswordResetController::class, 'showLinkRequestForm'])->name('password.request');

Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');

// Route pour la connexion
Route::post('/connexion',[AuthController::class,'connexion'])->name('connexion.submit');
//Route pour l'inscription
Route::post('/inscription',[AuthController::class,'inscription'])->name('inscription.submit');
//Route pour mot de passe et email
Route::post('/mot-de-passe-email', [PasswordResetController::class, 'sendResetLinkEmail'])->name('password.email');
Route::post('/reset-password', [PasswordResetController::class, 'reset'])->name('password.update');

