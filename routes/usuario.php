<?php

use App\Http\Controllers\Admin\RecipeController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\UsuarioRecipe;

Route::redirect('', 'usuario/recipes');

Route::get('recipes', [RecipeController::class, 'clienteIndex'])->name('recipes.index');

Route::get('recipes/create', [RecipeController::class, 'clienteCreate'])->name('recipes.create');

Route::get('recipes/edit', [RecipeController::class, 'clienteEdit'])->name('recipes.edit');