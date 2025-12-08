<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'medias';

    protected $fillable = [
        'contenu_id',
        'type_media_id',
        'chemin',
    ];
   
    public function typeMedia()
    {
        return $this->belongsTo(TypeMedia::class, 'type_media_id');
    }

    public function contenu()
    {
        return $this->belongsTo(Contenu::class, 'contenu_id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }
}
