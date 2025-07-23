@extends('auth.auth_layout')

@section('titre', "Eat & Drink - Vérification d'email")

@section('auth-form')

    <div class="w-[450px] m-auto rounded-lg px-10 py-6 items-center flex flex-col shadow-xl shadow-[#f7e3c9] bg-white">
        <h4 class="logo flex gap-3 items-center text-2xl mb-1">Eat <img src="../assets/images/stand.png" class="h-10 rotate-45"/>Drink</h4>
        <h1 class="text-3xl font-bold text-[#E8492A] mb-2 text-center">Validation d'email</h1>

        <div class="h-18 w-18 mb-3">
            <img src="../assets/images/burger.png" class="w-full h-full">
        </div>

        <p class="accroche text-lg mb-4 text-center">
            Un code de validation a été envoyé à votre adresse email.
            <br>Veuillez le saisir ci-dessous pour confirmer votre compte.
        </p>

        <form method="POST" action="#" class="flex flex-col w-[95%] mb-4">
            @csrf
            <input type="text" name="verification_code" placeholder="Code de validation" class="border-1 rounded-lg mb-5 px-3 py-2 text-center tracking-widest text-lg font-semibold">
            <button type="submit" class="bg-[#262424] py-2 rounded-lg text-white">
                Valider mon compte
            </button>
        </form>

        <p class="text-sm text-center">
            Vous n'avez pas reçu le code ? 
            <a href="#" class="text-[#E8492A]">Renvoyer</a>
        </p>
    </div>

@endsection