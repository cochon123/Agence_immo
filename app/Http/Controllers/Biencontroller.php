<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Biencontroller extends Controller
{
    public function home() {
        $biens = Bien::select('titre', 'slug', 'surface', 'prix', 'ville', 'code_postal', 'description')->paginate();
        return view('home', [ 'biens' => $biens ]);
    }
}
