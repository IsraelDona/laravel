<?php

namespace App\Http\Controllers;

use App\Models\TypeContenu;
use Illuminate\Http\Request;

class TypeContenuController extends Controller
{
    public function index()
    {
        $types = TypeContenu::all();
        return view('type_contenu.index', compact('types'));
    }

    public function create()
    {
        return view('type_contenu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255|unique:type_contenus',
            'description' => 'nullable|string'
        ]);

        TypeContenu::create($request->all());

        return redirect()->route('type_contenus.index')
                         ->with('success', 'Type de contenu créé avec succès!');
    }

    public function edit(TypeContenu $typeContenu)
    {
        return view('type_contenu.edit', compact('typeContenu'));
    }

   

    public function destroy(TypeContenu $typeContenu)
    {
        $typeContenu->delete();
        return redirect()->route('type_contenu.index')
                         ->with('success', 'Suppression réussie!');
    }

    public function show(TypeContenu $typeContenu)
{
    return view('type_contenu.show', compact('typeContenu'));
}

public function update(Request $request, TypeContenu $typeContenu)
{
    $request->validate([
        'nom' => 'required|string|max:255|unique:type_contenus,nom,' . $typeContenu->id,
        'description' => 'nullable|string'
    ]);

    $typeContenu->update($request->all());

    return redirect()->route('type_contenus.index')->with('success', 'Type de contenu mis à jour avec succès!');
}

}
