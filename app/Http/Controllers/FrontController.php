<?php

namespace App\Http\Controllers;

use App\Models\Contenu;
use App\Models\Region;

class FrontController extends Controller
{
    public function accueil() // <-- C'est ici que le nom doit correspondre
    {
        // Logique pour récupérer les données, etc.

        return view('frontend.accueil');
    }

    public function contenus()
    {
        $contenus = Contenu::with('medias')->orderBy('created_at', 'desc')->take(5)->get();
        return view('frontend.contenus', compact('contenus'));
    }

    public function contenuPayForm($id)
    {
        $contenu = Contenu::with('medias')->findOrFail($id);
        return view('frontend.paiement', compact('contenu'));
    }

    public function contenuPayProcess($id)
    {
        // Simulation de paiement : en vrai, intégrer une API paiement
        return redirect()->route('front.contenu.show', ['id' => $id, 'paid' => 1]);
    }

    public function contenuShow($id)
    {
        $contenu = Contenu::with('medias')->findOrFail($id);

        // Vérification simple que l'utilisateur vient d'avoir payé (paramètre GET 'paid')
        if (request()->get('paid') != 1) {
            return redirect()->route('front.contenu.pay', $id)->with('info', 'Veuillez payer pour accéder au contenu complet.');
        }

        return view('frontend.contenu_show', compact('contenu'));
    }

    public function regions()
    {
        $regions = Region::all();
        return view('frontend.regions', compact('regions'));
    }

     public function contacts()
    {
        $regions = Region::all();
        return view('frontend.contact', compact('contact'));
    }
   
}
