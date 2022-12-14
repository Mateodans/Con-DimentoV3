<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Mateo Dans',
            'email' => 'Mateodand@gmail.com',
            'password' => bcrypt('1122')
        ])->assignRole('admin');
        User::create([
            'name' => 'Joaquin Alberto',
            'email' => 'joaquinalbertogz@hotmail.com',
            'password' => bcrypt('1122')
        ])->assignRole('admin');
        User::create([
            'name' => 'Lucas Nuñez',
            'email' => 'lucasnu1232@hotmail.com',
            'password' => bcrypt('1122')
        ])->assignRole('admin');
    }
}
