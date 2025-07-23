@extends('produit.produit_layout')

@section('titre', "Eat & Drink - Ajout de produit")

@section('produit_content')
<div class="max-w-[600px] m-auto bg-white shadow-xl shadow-[#f7e3c9] rounded-2xl px-10 py-8">

  <div class="text-center mb-6">
    <h4 class="logo flex justify-center items-center gap-2 text-2xl font-bold text-[#262424]">
      Eat <img src="{{ asset('assets/images/stand.png') }}" class="h-10 rotate-45" />Drink
    </h4>
    @if(isset($produit))
        <h1 class="text-3xl font-extrabold text-[#E8492A] mt-2">Modifier un produit</h1>
        <p class="text-gray-600 mt-1">Modifiez les informations du produit de votre stand.</p>
        @else
        <h1 class="text-3xl font-extrabold text-[#E8492A] mt-2">Ajouter un produit</h1>
        <p class="text-gray-600 mt-1">Remplissez les informations pour enrichir votre stand.</p>
    @endif
  </div>

  <form action="{{ route('entrepreneur.produit.store') }}" method="POST" class="flex flex-col gap-4">
    @csrf
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">Nom du produit</label>
      <input type="text" name="nom" placeholder="Attieke poisson" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#E8492A]" old="{{ isset($produit) ? old('nom', $produit->nom) : old('nom') }}" />
    </div>

    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
      <textarea name="description" rows="3" placeholder="Un plat d'attieke épicé supplément alloco." class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#E8492A]"></textarea>
    </div>

    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">Prix (FCFA)</label>
      <input type="number" name="price" step="0.01" placeholder="1.500" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#E8492A]"/>
    </div>

    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">Image du produit</label>
      <input type="file" name="image" accept="image/*" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm"/>
    </div>

    <button type="submit" class="mt-4 bg-[#262424] text-white py-2 rounded-lg hover:bg-[#3a3939] transition cursor-pointer">Ajouter le produit</button>
  </form>
</div>
@endsection