<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Izvjestaj extends Model
{
    
   protected $fillable = [
        'naslov',
        'tekst',
    ];
}
