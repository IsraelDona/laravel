<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index()
    {
        $regions = Region::all();
        return view('regions.index', compact('regions'));
    }

    public function create()
    {
        return view('regions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_region' => 'required|string|max:100|unique:regions',
            'description' => 'nullable|string',
        ]);

        Region::create($request->all());

        return redirect()->route('regions.index')
                         ->with('success', 'Région créée avec succès');
    }

    public function edit(Region $region)
    {
        return view('regions.edit', compact('region'));
    }

    public function update(Request $request, Region $region)
    {
        $request->validate([
            'nom_region' => 'required|string|max:100|unique:regions,nom_region,' . $region->id,
            'description' => 'nullable|string',
        ]);

        $region->update($request->all());

        return redirect()->route('regions.index')
                         ->with('success', 'Région mise à jour');
    }

    public function destroy(Region $region)
    {
        $region->delete();

        return redirect()->route('regions.index')
                         ->with('success', 'Région supprimée');
    }

    
}
