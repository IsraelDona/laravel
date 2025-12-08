<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contenu extends Model
{
    protected $fillable = [
        'titre',
        'description',
        'contenu_html',
        'region_id',
        'type_contenu_id',
        'langue_id',
        'user_id',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function typeContenu()
    {
        return $this->belongsTo(TypeContenu::class);
    }

    public function langue()
    {
        return $this->belongsTo(Langue::class, 'langue_id', 'id');
    }

    public function auteur()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function medias()
    {
        return $this->hasMany(Media::class);
    }
}
