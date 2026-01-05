<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    // Table roles
    protected $table = 'roles';

    // Clé primaire = id (par défaut)
    protected $primaryKey = 'id';

    // Timestamps présents, donc pas besoin de les désactiver
    public $timestamps = true;

    protected $fillable = [
        'nom_role',
    ];

    /**
     * Relation : un rôle possède plusieurs utilisateurs
     */
    public function utilisateurs()
    {
        return $this->hasMany(Utilisateur::class, 'role_id', 'id');
    }
}
