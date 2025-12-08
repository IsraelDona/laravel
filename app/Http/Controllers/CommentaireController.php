<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Contenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaireController extends Controller
{
    public function store(Request $request, $contenu_id)
    {
        $request->validate([
            'texte' => 'required|string'
        ]);

        Commentaire::create([
            'contenu_id' => $contenu_id,
            'user_id' => Auth::id(),
            'texte' => $request->texte
        ]);

        return back()->with('success', 'Commentaire ajouté');
    }
}
