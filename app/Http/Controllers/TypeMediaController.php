<?php

namespace App\Http\Controllers;

use App\Models\TypeMedia;
use Illuminate\Http\Request;

class TypeMediaController extends Controller
{
    public function index()
    {
        $types = TypeMedia::all();
        return view('type_media.index', compact('types'));
    }

    public function create()
    {
        return view('type_media.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|unique:type_medias',
            'extension' => 'required',
        ]);

        TypeMedia::create($request->all());

        return redirect()->route('type_media.index')
                         ->with('success', 'Type Media créé');
    }

    public function edit(TypeMedia $typeMedia)
    {
        return view('type_media.edit', compact('typeMedia'));
    }

    
    public function destroy(TypeMedia $typeMedia)
    {
        $typeMedia->delete();
        return redirect()->route('type_media.index')->with('success', 'Supprimé');
    }


    public function show(TypeMedia $typeMedia)
{
    return view('type_media.show', compact('typeMedia'));
}

public function update(Request $request, TypeMedia $typeMedia)
{
    $request->validate([
        'nom' => 'required|unique:type_medias,nom,' . $typeMedia->id,
        'extension' => 'required',
    ]);

    $typeMedia->update($request->all());

    return redirect()->route('type_media.index')->with('success', 'Type de média mis à jour avec succès!');
}

}
