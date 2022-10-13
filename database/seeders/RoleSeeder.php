<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = Role::create(['name' => 'admin']);
        $verificado = Role::create(['name' => 'verificado']);
        $sinverificar = Role::create(['name' => 'sinVerificar']);

        Permission::create(['name' => 'admin.home'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.users.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.users.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.users.update'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.categories.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.categories.destroy'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.categories.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.categories.edit'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.ingredients.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.ingredients.destroy'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.ingredients.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.ingredients.edit'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.recipes.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.recipes.destroy'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.recipes.create'])->syncRoles([$admin, $verificado]);
        Permission::create(['name' => 'admin.recipes.edit'])->syncRoles([$admin]);

    }
}
