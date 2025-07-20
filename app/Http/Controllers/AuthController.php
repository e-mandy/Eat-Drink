<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function connexion(Request $request)
    {
        //Valider les champs de la page de connexion
        $request->validate([
            'email'=> 'required|email',
            'password' => 'required'
        ]);
        //Si la personne veux ce connecter
        if (Auth::attempt(['email'=> $request->email , 'password'=> $request->password])) {
            //Connexion reussie
            $request->session()->regenerate();

            //Redirection vers le dashboard ou acceuil ca depends pour l'instant j'ai pris dashboard
            return redirect()->intended('/dashboard'); 
        }
        // Connexion pas reussie 
        return back()->withErrors([
            'email' =>'Email ou mot de passe incorrect.',
        ]);
    }
}
