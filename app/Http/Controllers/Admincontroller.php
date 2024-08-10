<?php

namespace App\Http\Controllers;

use App\Http\Requests\Bienfilterrequest;
use App\Models\Bien;
use App\Models\photo;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

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
        Bien::create(Arr::except($data, ['photos']));

        $files = [];
        foreach($request->file('photos') as $file) {
            // Generate a unique name for the file
            $file_name = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
              
            // Move the file to the desired location
            $file->storeAs('photos', $file_name, 'public');
  
            $files[] = ['name' => $file_name];
        }

        $id = Bien::where('titre', $data['titre'])->first()->id;
        foreach ($files as $fileData) {
            photo::create([
                "liens" => $fileData['name'],
                "bien_id" => $id,
            ]);
        }

        return back()->with('success', 'bien crée avec succes!'); 
    }
}
