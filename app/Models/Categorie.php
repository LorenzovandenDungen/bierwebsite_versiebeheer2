<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table = 'categorie';

    public function bieren()
    {
        return $this->hasMany(Bier::class);
    }
}
