<?php

namespace App\Http\Controllers;

use App\Models\Contenu;
use App\Models\Region;
use App\Models\Langue;
use App\Models\TypeContenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContenuController extends Controller
{
    public function index()
    {
        $contenus = Contenu::with(['region', 'typeContenu', 'langue'])->get();
        return view('contenus.index', compact('contenus'));
    }

    public function create()
    {
        return view('contenus.create', [
            'regions' => Region::all(),
            'types'   => TypeContenu::all(),
            'langues' => Langue::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'description' => 'nullable',
            'contenu_html' => 'nullable',
            'region_id' => 'required|exists:regions,id',
            'type_contenu_id' => 'required|exists:type_contenus,id',
            'langue_id' => 'required|exists:langues,id_langue'
        ]);

        Contenu::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'contenu_html' => $request->contenu_html,
            'region_id' => $request->region_id,
            'type_contenu_id' => $request->type_contenu_id,
            'langue_id' => $request->langue_id,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('contenus.index')->with('success', 'Contenu créé');
    }


    public function show(Contenu $contenu)
{
    return view('contenus.show', compact('contenu'));
}

public function edit(Contenu $contenu)
{
    return view('contenus.edit', [
        'contenu' => $contenu,
        'regions' => Region::all(),
        'types' => TypeContenu::all(),
        'langues' => Langue::all()
    ]);
}

public function update(Request $request, Contenu $contenu)
{
    $request->validate([
        'titre' => 'required',
        'description' => 'nullable',
        'contenu_html' => 'nullable',
        'region_id' => 'required|exists:regions,id',
        'type_contenu_id' => 'required|exists:type_contenus,id',
        'langue_id' => 'required|exists:langues,id'
    ]);

    $contenu->update([
        'titre' => $request->titre,
        'description' => $request->description,
        'contenu_html' => $request->contenu_html,
        'region_id' => $request->region_id,
        'type_contenu_id' => $request->type_contenu_id,
        'langue_id' => $request->langue_id,
    ]);

    return redirect()->route('contenus.index')->with('success', 'Contenu mis à jour avec succès');
}

public function destroy(Contenu $contenu)
{
    $contenu->delete();
    return redirect()->route('contenus.index')->with('success', 'Contenu supprimé avec succès');
}

}
