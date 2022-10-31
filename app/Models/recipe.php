<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recipe extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $fillable = ['title', 'body', 'category_id', 'ingredient_id', 'status', 'steps'];

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
        return $this->belongsToMany(Ingredient::class, 'ingredients_recipes', 'recipe_id', 'ingredient_id');
    }

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

    public function reviews()
    {
        return $this->hasMany(review::class, 'recipe_id');
    }
}
