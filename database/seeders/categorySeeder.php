<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('categories')->insertInTo('name')([
        //     'name' => 'Vegetariano', 'Carnes', 'Pastas', 'Pescados', 'Sin TACC', 'Sin gluten', 'Postres']);

        // DB::table('categories')->insertInTo('internacionales')([
        //     'name' => 'Argentina', 'Italiana', 'Yankee', 'Española', 'Asiatica']);

        Category::create([
            'name' => 'carnes',
            'internacional' => false,
        ]);
        Category::create([
            'name' => 'Argentina',
            'internacional' => true,
        ]);

    }
}
