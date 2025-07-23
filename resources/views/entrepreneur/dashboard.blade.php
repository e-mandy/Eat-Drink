@extends('entrepreneur.entrepreneur_layout')

@section('titre', 'Eat & Drink - Dashboard Entrepreneur')

@section('entrepreneur')
    <main class="flex-1 p-8">
        <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Bienvenue, Entrepreneur !</h1>
        <button class="bg-[#E8492A] text-white px-4 py-2 rounded-lg shadow hover:bg-[#cc3f20]">+ Nouveau Produit</button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <p class="text-sm text-gray-500">Ventes aujourd'hui</p>
            <h2 class="text-2xl font-bold">75 000 FCFA</h2>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6">
            <p class="text-sm text-gray-500">Commandes en cours</p>
            <h2 class="text-2xl font-bold">32</h2>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6">
            <p class="text-sm text-gray-500">Produits en stock</p>
            <h2 class="text-2xl font-bold">145</h2>
        </div>
        </div>
    </main>
@endsection