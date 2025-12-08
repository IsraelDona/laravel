<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parler extends Model
{
    protected $table = 'parler';

    protected $fillable = [
        'user_id',
        'texte'
    ];
}
