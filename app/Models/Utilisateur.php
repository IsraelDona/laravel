<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;


class Utilisateur extends Authenticatable
{
    protected $table = 'utilisateurs';

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'statut',
        'date_naissance',
        'date_inscription',
        'mot_de_passe',
        'photo',
        'id_role',
        'id_langue',
    ];

    protected $hidden = [
        'mot_de_passe',
    ];

    /**
     * Permet à Laravel de savoir quelle colonne contient le mot de passe.
     */
    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }

    /**
     * Retourne true si l'utilisateur est admin
     */
    public function isAdmin(): bool
    {
        return (int) $this->role_id === 1;
    }

    // Relations
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'id_role', 'id');
    }

    public function langue(): BelongsTo
    {
        return $this->belongsTo(Langue::class, 'id_langue', 'id');
    }

    public function contenusAuteur(): HasMany
    {
        return $this->hasMany(Contenu::class, 'user_id');
    }

    public function commentaires(): HasMany
    {
        return $this->hasMany(Commentaire::class, 'user_id');
    }
}
