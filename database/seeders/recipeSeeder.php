<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\recipe;

class recipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Recipe::create([
            'title'=>'Asado al estilo argentino',
            'body'=>'Esta es la mejor manera de hacer un buen asado al estilo Argento.',
            'steps'=>'1. Cortar la carne en trozos pequeños. 2. Salpimentar. 3. Cocinar en la parrilla.',
        ]);
    }
}
