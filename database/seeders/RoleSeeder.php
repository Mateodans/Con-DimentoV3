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

        Permission::create(['name' => 'admin.home',
                        'description' => 'Ver el dashboard'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.users.edit',
                        'description' => 'Asignar un rol'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.users.index',
                        'description'=> 'Ver listado de usuarios'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.categories.index',
                        'description'=> 'Ver listado de categorias'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.categories.destroy',
                        'description'=> 'Eliminar categorias'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.categories.create',
                        'description'=> 'Crear categorias'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.categories.edit',
                        'description'=> 'Editar categorias'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.ingredients.index',
                        'description'=> 'Ver listado de ingredientes'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.ingredients.destroy',
                        'description'=> 'Eliminar ingredientes'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.ingredients.create',
                        'description'=> 'Crear ingrediente'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.ingredients.edit',
                        'description'=> 'Editar ingredientes'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.recipes.index',
                        'description'=> 'Ver listado de recetas'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.recipes.destroy',
                        'description'=> 'Eliminar recetas'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.recipes.create',
                        'description'=> 'Crear recetas'])->syncRoles([$admin, $verificado]);
        Permission::create(['name' => 'admin.recipes.edit',
                        'description'=> 'Editar recetas'])->syncRoles([$admin]);

    }
}
