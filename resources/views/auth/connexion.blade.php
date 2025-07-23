@extends('auth.auth_layout')

@section('titre', "Eat & Drink - Connexion")

@section('auth-form')

    <div class="w-[450px] m-auto rounded-lg px-10 py-6 items-center flex flex-col shadow-xl shadow-[#f7e3c9] bg-white">
        <h4 class="logo flex gap-3 items-center text-2xl mb-1">Eat <img src="{{ asset('assets/images/stand.png') }}" class="h-10 rotate-45"/>Drink</h4>
        <h1 class="text-4xl font-bold text-[#E8492A] mb-2">Connexion</h1>
        
        <div class="h-18 w-18 mb-3">
            <img src="{{ asset('assets/images/burger.png') }}" class="w-full h-full">
        </div>
        
        <p class="accroche text-lg mb-3">Ravi de vous revoir. Connectez-vous !</p>
        
        <form method="POST" action="#" class="flex flex-col w-[95%] mb-4">
            <input type="email" name="email" placeholder="Entrez votre email" class="border-1 rounded-lg mb-5 px-3 py-2">
            <input type="password" name="password" placeholder="Entrez votre mot de passe" class="border-1 rounded-lg mb-5 px-3 py-2">
            <button type="submit" class="bg-[#262424] py-2 rounded-lg text-white">Se connecter</button>
        </form>
        
        <p class="text-sm">Vous n’avez pas encore de compte ? <a href="{{ route('auth.inscription') }}" class="text-[#E8492A]">Inscrivez-vous</a>.</p>
    </div>

@endsection