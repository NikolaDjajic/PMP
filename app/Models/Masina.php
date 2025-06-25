<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Masina extends Model
{

     protected $fillable = [
        'naziv',
    ];
    public function izvjestaji()
{
    return $this->hasMany(\App\Models\Izvjestaj::class);
}
}
