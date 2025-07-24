<<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Commande extends Model
{
    use HasFactory;

    /**
     * Les attributs qui sont assignables en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'stand_id',
        'details_commande',
        'date_commande',
    ];

    /**
     * Les attributs qui doivent être castés.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'details_commande' => 'array',
        'date_commande' => 'datetime',
    ];

    /**
     * Obtient le stand associé à la commande.
     */
    public function stand(): BelongsTo
    {
        return $this->belongsTo(Stand::class);
    }
} 