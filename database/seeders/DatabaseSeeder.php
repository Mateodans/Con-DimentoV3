<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(categorySeeder::class);
        $this->call(recipeSeeder::class);
        $this->call(imageSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
    }
}
