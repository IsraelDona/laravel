<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeContenu extends Model
{
    protected $table = 'type_contenus';

    protected $fillable = [
        'nom',
        'description',
    ];
}
