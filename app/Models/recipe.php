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
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function pasos()
    {
        return $this->hasMany(Pasos::class);
    }

    public function ingredientes()
    {
        return $this->hasMany(Ingredientes::class);
    }
}
