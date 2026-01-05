<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Contenu;
use App\Models\TypeMedia;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index()
    {
        $medias = Media::with('typeMedia')->get();
        return view('medias.index', compact('medias'));
    }

    public function create()
    {
        return view('medias.create', [
            'contenus' => Contenu::all(),
            'types' => TypeMedia::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'contenu_id' => 'required',
            'type_media_id' => 'required',
            'fichier' => 'required'
        ]);

        Media::create($request->all());

        return redirect()->route('medias.index')->with('success', 'Media ajouté');
    }

    public function show(Media $media)
    {
        return view('medias.show', compact('media'));
    }

    public function edit(Media $media)
    {
        return view('medias.edit', [
            'media' => $media,
            'contenus' => Contenu::all(),
            'types' => TypeMedia::all()
        ]);
    }

    public function update(Request $request, Media $media)
    {
        $request->validate([
            'contenu_id' => 'required|exists:contenus,id',
            'type_media_id' => 'required|exists:type_medias,id',
            'fichier' => 'required'
        ]);

        $media->update($request->all());

        return redirect()->route('medias.index')->with('success', 'Média mis à jour avec succès');
    }

    public function destroy(Media $media)
    {
        $media->delete();
        return redirect()->route('medias.index')->with('success', 'Média supprimé avec succès');
    }
}
