<?php

namespace Database\Seeders;

use App\Models\image;
use App\Models\recipe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class imageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        image::create([
       'url'=> '/storage/recipes/_fm01642.jpg',
       'imageable_id'=> recipe::first()->id,
       'imageable_type' => recipe::class
        ]);
    }
}
