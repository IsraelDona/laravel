<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'prenom',
        'email',
        'password',
        'role',          // 'admin' ou 'user'
        'statut',
        'date_naissance',
        'date_inscription',
        'photo',
        'role_id',
        'langue_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Vérifie si l'utilisateur est admin
     */
    public function isAdmin()
    {
        return isset($this->role) && $this->role === 'admin';
    }

    /**
     * Vérifie si l'utilisateur est un utilisateur simple
     */
    public function isSimpleUser()
    {
        return !isset($this->role) || $this->role === 'user' || $this->role === null;
    } 

    /**
     * Accessor pour le nom complet
     */
    public function getNomAttribute()
    {
        return $this->attributes['name'] ?? '';
    }

    /**
     * Mutateur pour le nom
     */
    public function setNomAttribute($value)
    {
        $this->attributes['name'] = $value;
    }
}