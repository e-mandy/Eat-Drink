<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;  

Route::get('/', function () {
    return view('welcome');
});

//Pour afficher le formulaire
Route::get('/inscription', function () {
    return view('inscription');
})->name('inscription.form');

// Route pour la connexion
Route::post('/connexion',[AuthController::class,'connexion'])->name('connexion.submit');
//Route pour l'inscription
Route::post('/inscription',[AuthController::class,'inscription'])->name('inscription.submit');
