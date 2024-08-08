<?php

namespace App\Http\Controllers;

use App\Http\Requests\Bienfilterrequest;
use App\Models\Bien;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class Admincontroller extends Controller
{
    public function create()
    {
        $bien = new Bien();
        $bien -> title = 'titre du bien';
        $bien -> description = 'description du bien';
        return view('create', [
            'bien' => $bien,
        ]);
    }

    public function store(Bienfilterrequest $request)
    {
        $data = $request->validated();
        Bien::create($data);
        return $data;
    }
}
