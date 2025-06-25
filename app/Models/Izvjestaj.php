<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Izvjestaj extends Model
{
    
   protected $fillable = [
        'opis',
        'fajl',
        'masina_id',
        'user_id'
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}
public function masina()
{
    return $this->belongsTo(\App\Models\Masina::class);
}
}
