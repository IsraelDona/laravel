<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Utilisateur;
use App\Models\Role;
use App\Models\Langue;
use Illuminate\Validation\Rule;

class UtilisateurController extends Controller
{
    public function index()
    {
        $utilisateurs = Utilisateur::with(['role','langue'])->get();
        $roles = Role::all();
        $langues = Langue::all();

        return view('utilisateurs.index', compact('utilisateurs','roles','langues'));
    }

    public function create()
    {
        $roles = Role::all();
        $langues = Langue::all();

        return view('utilisateurs.create', compact('roles','langues'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom'            => 'required|string|max:255',
            'prenom'         => 'required|string|max:255',
            'email'          => 'required|string|email|max:255|unique:utilisateurs,email',
            'mot_de_passe'   => 'required|string|min:8|confirmed',
            'statut'         => ['required', Rule::in(['actif','inactif','bloque'])],
            'date_naissance' => 'nullable|date',
            'role_id'        => 'required|exists:roles,id',
            'langue_id'      => 'required|exists:langues,id',
        ]);

        Utilisateur::create([
            'nom'            => $request->nom,
            'prenom'         => $request->prenom,
            'email'          => $request->email,
            'mot_de_passe'   => Hash::make($request->mot_de_passe),
            'statut'         => $request->statut,
            'date_naissance' => $request->date_naissance,
            'role_id'        => $request->role_id,
            'langue_id'      => $request->langue_id,
        ]);

        return redirect()->route('utilisateurs.index')->with('success','Utilisateur créé avec succès.');
    }

    /* ------------------------------------------------------
     *  🔎  AFFICHER UN UTILISATEUR (vue utilisateurs.show)
     * ------------------------------------------------------ */
    public function show($id)
    {
        $utilisateur = Utilisateur::with(['role','langue'])->findOrFail($id);

        return view('utilisateurs.show', compact('utilisateur'));
    }

    /* ------------------------------------------------------
     * ✏️  FORMULAIRE D'ÉDITION
     * ------------------------------------------------------ */
    public function edit($id)
    {
        $utilisateur = Utilisateur::findOrFail($id);
        $roles = Role::all();
        $langues = Langue::all();

        return view('utilisateurs.edit', compact('utilisateur','roles','langues'));
    }

    /* ------------------------------------------------------
     * 🔄  MISE À JOUR
     * ------------------------------------------------------ */
    public function update(Request $request, $id)
    {
        $utilisateur = Utilisateur::findOrFail($id);

        $request->validate([
            'nom'            => 'required|string|max:255',
            'prenom'         => 'required|string|max:255',
            'email'          => ['required','email', Rule::unique('utilisateurs')->ignore($utilisateur->id)],
            'statut'         => ['required', Rule::in(['actif','inactif','bloque'])],
            'date_naissance' => 'nullable|date',
            'role_id'        => 'required|exists:roles,id',
            'langue_id'      => 'required|exists:langues,id',
        ]);

        $utilisateur->update([
            'nom'            => $request->nom,
            'prenom'         => $request->prenom,
            'email'          => $request->email,
            'statut'         => $request->statut,
            'date_naissance' => $request->date_naissance,
            'role_id'        => $request->role_id,
            'langue_id'      => $request->langue_id,
        ]);

        return redirect()->route('utilisateurs.show', $id)
                         ->with('success', 'Utilisateur mis à jour avec succès.');
    }

    /* ------------------------------------------------------
     * 🗑️ SUPPRESSION
     * ------------------------------------------------------ */
    public function destroy($id)
    {
        $utilisateur = Utilisateur::findOrFail($id);
        $utilisateur->delete();

        return redirect()->route('utilisateurs.index')->with('success','Utilisateur supprimé.');
    }
}
