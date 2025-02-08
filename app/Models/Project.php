<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * Les attributs qui peuvent être assignés en masse.
     */
    protected $fillable = [
        'title',
        'description',
        'category',
        'goal_amount',
        'collected_amount',
        'start_date',
        'end_date',
        'return_rate',
        'status',
        'image' // Ajout de l'image
    ];

    /**
     * Les attributs qui doivent être convertis en types natifs.
     */
    protected $casts = [
        'start_date'       => 'date',
        'end_date'         => 'date',
        'goal_amount'      => 'decimal:2',
        'collected_amount' => 'decimal:2',
        'return_rate'      => 'decimal:2',
    ];

    /**
     * Définir une relation avec le modèle Investment (si nécessaire).
     *
     * Par exemple, si chaque projet peut avoir plusieurs investissements :
     */
    public function investments()
    {
        return $this->hasMany(Investment::class);
    }
}
