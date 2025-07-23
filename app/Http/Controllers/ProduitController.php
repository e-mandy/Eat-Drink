<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduitRequest;
use App\Models\Produit;

class ProduitController extends Controller
{
    public function index(){
        return view('produit.index');
    }

    public function create(){
        return view('produit.create');
    }

    public function store(ProduitRequest $request){
        Produit::create([$request->all()]);  
        return to_route('entrepreneur.produit.index');
    }

    public function update(Produit $produit){
        return view('produit.update', compact('produit', $produit));
    }
}
