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
        $biens = Bien::select('id', 'titre', 'slug', 'surface', 'prix', 'ville', 'code_postal', 'description')->paginate(4);
        return view('biens', [ 'biens' => $biens ]);
    }

    public function single(String $slug)
    {
        $bien = Bien::with('specificites')->with('photos')->where('slug', '=', $slug)->first();
        //return view('single', [ 'bien' => $bien ]);
        return view('single', [ 'bien' => $bien ]);

    }

    public function select_biens(Request $request)
    {
        $biens = Bien::select('id', 'titre', 'slug', 'surface', 'prix', 'ville', 'code_postal', 'description');
        //selectionner la surface min
        if($request->surface_min !== null){
            $biens = $biens->where('surface', '>=', $request->surface_min);
        }

        //selectionner le nombre de piece min
        if($request->nb_pieces_min !== null){
            $biens = $biens->where('nb_pieces', '>=', $request->nb_pieces_min);
        }

        //selectionner le nombre de piece min
        if($request->budget_max !== null){
            $biens = $biens->where('prix', '<=', $request->budget_max);
        }

        //selectionner le nombre de piece min
        if($request->mot_clef !== null){
            $biens = $biens->where('titre', 'LIKE', '%'.$request->mot_clef.'%');
        }

        return view('biens', [ 'biens' => $biens->paginate(4) ]);
    }
}
