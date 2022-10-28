<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ingredient extends Model
{

    protected $fillable = ['name'];

    use HasFactory;

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class, 'ingredients_recipes', 'ingredient_id', 'recipe_id');
    }
}
