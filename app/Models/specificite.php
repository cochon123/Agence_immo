<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class specificite extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
    ];

    public function Biens() {
        return $this->belongsToMany(Bien::class);
    }
}
