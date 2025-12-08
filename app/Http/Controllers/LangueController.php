<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Langue;

class LangueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $langues = Langue::all();
        return view('langues.index', compact('langues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('langues.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Correction : Remplacement de 'sring' par 'string'
        $validation = $request->validate([
            'code_langue' => 'required|string|max:5|unique:langues,code_langue',
            'nom_langue' => 'required|string|max:20', 
            'description' => 'nullable|string|max:255'
        ]);
        
        try {
            Langue::create($validation); 

            // Correction : Redirection vers 'langues.index'
            return redirect()->route('langues.index')->with('success', 'Langue créée avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Erreur lors de la création: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
   

    /**
     * Show the form for editing the specified resource.
     */
   

    /**
     * Update the specified resource in storage.
     */
   

    /**
     * Remove the specified resource from storage.
     */
   


    public function show(Langue $langue)
{
    return view('langues.show', compact('langue'));
}

public function edit(Langue $langue)
{
    return view('langues.edit', compact('langue'));
}

public function update(Request $request, Langue $langue)
{
    $request->validate([
        'code_langue' => 'required|string|max:5|unique:langues,code_langue,' . $langue->id,
        'nom_langue' => 'required|string|max:20',
        'description' => 'nullable|string|max:255'
    ]);

    $langue->update($request->all());

    return redirect()->route('langues.index')->with('success', 'Langue mise à jour avec succès');
}

public function destroy(Langue $langue)
{
    $langue->delete();
    return redirect()->route('langues.index')->with('success', 'Langue supprimée avec succès');
}

}