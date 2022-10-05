<?php

namespace Database\Seeders;

use App\Models\image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\recipe;

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
       'url'=> 'public/storage',
       'imageable_id'=> recipe::first()->id,
       'imageable_type' => recipe::class
        ]);
    }
}
