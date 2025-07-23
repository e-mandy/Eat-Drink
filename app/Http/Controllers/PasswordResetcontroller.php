<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Password;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Str;


class PasswordResetController extends Controller

{
     // Affiche le formulaire de demande de lien
    public function showLinkRequestForm()
    {
        return view('auth.mot_de_passe_oublie');
    }

    // Envoie l'e-mail avec le lien de réinitialisation
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    // Affiche le formulaire de réinitialisation
    public function showResetForm($token)
    {
        return view('auth.reinitialise_mdp', ['token' => $token]);
    }

    // Traitement de la réinitialisation
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('auth.connexion')->with('success', 'Mot de passe reinitialisé')

            : back()->withErrors(['email' => [__($status)]]);
         


    }
}
