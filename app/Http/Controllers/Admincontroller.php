<?php

namespace App\Http\Controllers;

use App\Http\Requests\Bienfilterrequest;
use App\Models\Bien;
use App\Models\photo;
use App\Models\specificite;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class Admincontroller extends Controller
{
    public function create()
    {
        $bien = new Bien();
        $bien -> title = 'titre du bien';
        $bien -> description = 'description du bien';

        $specificite = specificite::all();
        
        return view('create', [
            'bien' => $bien,
            'specificites' => $specificite,
        ]);
    }

    public function store(Bienfilterrequest $request)
    {
        $data = $request->validated();
        $bien = Bien::create(Arr::except($data, ['photos']));

        $bien->specificites()->sync($data['specificites']);

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

        return to_route('show', ['slug' => $data['slug']])->with('success', 'bien crée avec succes!'); 
    }

    public function edit(String $slug)
    {
        $bien = Bien::all()->where('slug', '=', $slug)->first();
        $specificite = specificite::all();

        return view('create', [
            'specificites' => $specificite,
            'bien' => $bien,
        ]);
    }

    public function update(Bienfilterrequest $request, String $slug)
    {
        $data = $request->validated();
        $bien = Bien::all()->where('slug', '=', $slug)->first();
        $bien->update($data);
        $bien->specificites()->sync($data['specificites']);
        $slug = $request->slug;
        return to_route('show', ['slug' => $slug])->with('success', 'bien modifié avec succes!');
    }

    public function delete_bien(String $slug)
    {
        $bien = Bien::all()->where('slug', '=', $slug)->first();
        $photos = photo::all()->where('bien_id', '=', $bien->id);
        foreach ($photos as $item) {
            $path = "photos/".$item->liens;
            Storage::disk('public')->delete( $path );
            $item->delete(); 
        }
        $bien->delete();
        return to_route('biens')->with('success', 'bien supprimé avec succes!');
    }
    public function delete_photo(Request $request)
    {
        $path = "photos/".$request->liens;
        Storage::disk('public')->delete( $path );
        photo::Where('liens', '=' ,$request->liens)->delete();
        return back()->with('success', 'la photo a été avec succes!');
    }

    public function add_photo(Request $request)
    {
        $files = [];
        foreach($request->file('photos') as $file) {
            // Generate a unique name for the file
            $file_name = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
              
            // Move the file to the desired location
            $file->storeAs('photos', $file_name, 'public');
  
            $files[] = ['name' => $file_name];
        }

        $id = $request->id;
        foreach ($files as $fileData) {
            photo::create([
                "liens" => $fileData['name'],
                "bien_id" => $id,
            ]);
        }

        return back()->with('success', 'photo(s) ajoutée(s) avec succes!'); 
    }

}
