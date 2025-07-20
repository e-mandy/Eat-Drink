<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use App\Models\User;

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

     public function inscription(Request $request) 
     {   
    //Validons les donnees
    $request->validate([
        'nom'=>'required|string|max:255',
        'prenom'=>'required|string|max:255',
        'email'=>'required|email|unique:users,email',
        'password'=>'required|confirmed',
        'nom_entreprise'=>'required|string|max:255',
        'description'=>'nullable|string|max:1000',

    ]);
    //Creation de l'utilisateur
    $user = User ::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' =>  Hash::make($request->password),
            'nom_entreprise' => $request->nom_entreprise,
            'description' => $request->description,
            'role'=>'entrepreneur_en_attente',
    ]);

    //Une redirection avec un message
    return redirect()->route('inscription.form')->with('success','Inscription reussie! En attente de validation');
    }
}