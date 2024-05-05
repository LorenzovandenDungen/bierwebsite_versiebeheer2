<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Bier extends Model
{
    use HasRecursiveRelationships;

    protected $table = 'bier';

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }

    public function submerken()
    {
        return $this->hasMany(Bier::class, 'valt_onder_id');
    }

    public function parent()
    {
        return $this->belongsTo(Bier::class, 'valt_onder_id');
    }

    public function children()
    {
        return $this->hasMany(Bier::class, 'valt_onder_id');
    }
}
