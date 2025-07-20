<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;  

Route::get('/', function () {
    return view('welcome');
});
// Route pour la connexion
Route::post('/connexion',[AuthController::class,'connexion'])->name('connexion.submit');
