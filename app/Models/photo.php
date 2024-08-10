<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class photo extends Model
{
    use HasFactory;
    protected $fillable = [
        'liens',
        'bien_id',
    ];

    public function bien () {
        return $this->belongsTo(Bien::class);
    }

    public function photourl () : string
    {
        return Storage::url("/photos/".$this->liens);
    }
}
