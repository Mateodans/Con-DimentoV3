<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ingredient extends Model
{
    use HasFactory;

    public function receta()
    {
        return $this->hasMany(recetas::class);
    }
}
