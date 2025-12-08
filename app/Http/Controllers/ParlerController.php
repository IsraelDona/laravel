<?php

namespace App\Http\Controllers;

use App\Models\Parler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParlerController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(['texte' => 'required']);

        Parler::create([
            'texte' => $request->texte,
            'user_id' => Auth::id()
        ]);

        return back()->with('success', 'Message envoyé');
    }
}
