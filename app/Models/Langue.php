<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Langue extends Model
{
    // Laravel utilise 'id' comme clé primaire par défaut.

    // Le nom de la table
    protected $table='langues';

    /**
     * Les attributs qui peuvent être assignés en masse.
     *
     * @var list<string>
     */
    protected $primaryKey = 'id';
    protected $fillable = [
        'code_langue',
        'nom_langue',
        'description',
    ];
    
    /**
     * Relation vers les contenus (Contenu::class).
     * La clé étrangère dans la table 'contenus' est 'id_langue'.
     */
    public function contenus():HasMany
    {
        return $this-> hasMany(Contenu::class , 'id_langue');
    }
    
    /**
     * Relation Many-to-Many vers les régions via la table 'parler'.
     */
    public function regions(): BelongsToMany
    {
        return $this->belongsToMany(Region::class, 'parler','id_langue','id_region')
                    ->withTimestamps();
    }       
}