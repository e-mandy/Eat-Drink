@extends('produit.produit_layout')

@section('titre', "Eat & Drink - Dashboard Entrepreneur")

@section('produit_content')

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
    
    <div class="bg-white rounded-lg shadow-lg p-6">
      <h2>Liste des Produits</h2>
      <div>
        <ul class="grid grid-cols-3 gap-12">
            
          <li>
            <div class="w-full h-[350px] rounded-lg border-1 overflow-hidden">
              <a href="#" class="block w-full h-1/2 bg-[url({{ asset('assets/images/crepe.jpeg')}})] bg-cover bg-center bg-no-repeat bg-gray-100"></a>
              <div class="px-3">
                <h5 class="text-xl font-bold py-3">Nom produit</h5>
                <p class="flex gap-1 py-2"><span class="text-[#E8492A] font-bold">12.000</span>FCFA</p>
                <hr class="w-[90%] mx-auto mb-4">
                <div class="flex justify-between">
                  <div class="bg-gray-100 flex rounded-lg gap-1 items-center px-1">
                    <button class="rounded-lg p-1 text-xs flex items-center bg-white shadow-xs">Quantité produit</button>
                    <span class="font-semibold">10</span>
                  </div>
                  <button class="flex items-center gap-1 rounded-lg text-xs py-1 px-2 shadow-sm">Augmenter la quantité <img class="w-5 h-5" src="{{ asset('assets/images/ajouter.png') }}" alt=""></button>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>

@endsection