<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\photo;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Biencontroller extends Controller
{
    public function home() : View
    {
        $biens = Bien::select('id','titre', 'slug', 'surface', 'prix', 'ville', 'code_postal', 'description')->latest('updated_at')->take(4)->get();
        return view('home', [ 'biens' => $biens ]);
    }

    public function biens() : View
    {
        $biens = Bien::select('id', 'titre', 'slug', 'surface', 'prix', 'ville', 'code_postal', 'description')->paginate();
        return view('biens', [ 'biens' => $biens ]);
    }

    public function single(String $slug)
    {
        $bien = Bien::all()->where('slug', '=', $slug)->first();
        //return view('single', [ 'bien' => $bien ]);
        return view('single', [ 'bien' => $bien ]);

    }
}
