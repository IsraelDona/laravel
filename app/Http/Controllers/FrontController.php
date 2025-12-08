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
        $contenus = Contenu::latest()->get();
        return view('frontend.contenus', compact('contenus'));
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
