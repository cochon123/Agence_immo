<?php

namespace App\Http\Controllers;

use App\Models\specificite;
use Illuminate\Http\Request;

class SpecificiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specificites = specificite::all();
        return view('specificite', [ "specificite" => $specificites] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('specificiteCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required',
        ]);
        specificite::create($validated);
        return to_route('specificite.index')->with('success', 'spécificité crée avec success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $specificite = specificite::find($id);
        return view("specificiteEdit", [ "specificite" => $specificite]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $specificite = specificite::find($id);
        $specificite->update([
            'titre' => $request->titre,
        ]);
        return to_route('specificite.index')->with('success', 'spécificité modifié avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $specificite = specificite::find($id);

        $specificite->delete();

        return to_route('specificite.index')->with('success', 'spécificité supprimé avec success');
    }
}
