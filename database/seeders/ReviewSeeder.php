<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\User;
use App\Models\Recipe;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // review::create([
        //     'review_rating' => recipe::class,
        //     'review_comment' => recipe::class,
        //     'review_recipe_id' => recipe::class,
        //     'review_user_id' => recipe::class
        // ]);
        
        Review::create([
            'rating' => 5,
            'comment' => 'Esta receta es muy buena',
            'recipe_id' => 1,
            'user_id' => 3
        ]);

        // review::create([
        //     'review_rating' => 4,
        //     'review_comment' => 'This is a comment',
        //     'review_recipe_id' => recipe::first()->id,
        //     'review_user_id' => User::first()->id
        // ]);

    }
}
