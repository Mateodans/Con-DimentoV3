<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recipe extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'ingredients_recipes');
    }

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
