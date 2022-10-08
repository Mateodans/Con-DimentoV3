<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\IngredientController;
use App\Http\Controllers\Admin\RecipeController;

route::get('', [HomeController::class, 'index'])->name('admin.home');

route::resource('categories', CategoryController::class)->names('admin.categories');

route::resource('ingredients', IngredientController::class)->names('admin.ingredients');

route::resource('recipes', RecipeController::class)->names('admin.recipes');