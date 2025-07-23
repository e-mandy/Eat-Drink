<aside class="w-64 bg-white shadow-xl px-6 py-8 flex flex-col">
    <div class="flex items-center gap-2 text-2xl font-bold mb-10">
      <img src="../assets/images/stand.png" class="h-10 rotate-45" />
      <span class="text-[#E8492A]">Mon Stand</span>
    </div>
    <nav class="flex flex-col gap-5 text-sm">
      <a href="{{ route('entrepreneur.dashboard') }}" class="hover:text-[#E8492A]">Tableau de bord</a>
      <a href="{{ route('entrepreneur.produit.index') }}">Produits</a>
      <a href="#">Stands</a>
    </nav>
</aside>