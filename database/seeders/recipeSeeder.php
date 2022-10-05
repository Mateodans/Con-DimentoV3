<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\ingredient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\recipe;
use App\Models\ingredientsrecipe;
use App\Models\User;

class recipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::factory(1)->create();

        Recipe::create([
            'title'=>'Asado al estilo argentino',
            'body'=>'Esta es la mejor manera de hacer un buen asado al estilo Argento.',
            'steps'=>'1. Cortar la carne en trozos pequeños. 2. Salpimentar. 3. Cocinar en la parrilla.',
            'user_id'=>User::first()->id

        ]);
        $recipe= recipe::find(1);
        $recipe->categories()->attach($recipe->id);
        ingredient::create([
            'name'=>'sal',
            'amount'=>'20g'
        ]);

        ingredientsrecipe::create([
            'recipe_id'=> recipe::first()->id,
            'ingredient_id'=> ingredient::first()->id
        ]);


    }
}
