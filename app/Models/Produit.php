<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable =[
        'nom',
        'description',
        'prix',
        'photo',

        'id_stand'
    ];
}
