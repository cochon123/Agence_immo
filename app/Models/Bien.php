<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendu',
        'slug',
        'titre',
        'surface',
        'nb_pieces',
        'prix',
        'nb_chambres',
        'nb_étages',
        'chauffage',
        'description',
        'adresse',
        'ville',
        'code_postal',
    ];

    public function photos () {
        return $this->hasMany(photo::class);
    }
}
