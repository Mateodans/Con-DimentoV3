<?php

use App\Http\Controllers\Admin\RecipeController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\UsuarioRecipe;

Route::redirect('', 'usuario/recipes');

Route::get('recipes', [RecipeController::class, 'clienteIndex'])->name('recipes.index');


Route::get('recipes/create', [RecipeController::class, 'clienteCreate'])->name('recipes.create');

Route::post('recipes', [RecipeController::class, 'clienteStore'])->name('recipes.store');


Route::get('recipes/{recipe}/edit', [RecipeController::class, 'clienteEdit'])->name('recipes.edit');
Route::delete('recipes/{recipe}', [RecipeController::class, 'clientDestroy'])->name('recipes.destroy');

Route::patch('recipes/{recipe}', [RecipeController::class, 'clientUpdate'])->name('recipes.update');


