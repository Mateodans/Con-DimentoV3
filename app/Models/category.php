<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\recipe;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'internacional',
    ];


    public function recipes()
    {
        return $this->belongsToMany(Recipe::class);
    }
}
