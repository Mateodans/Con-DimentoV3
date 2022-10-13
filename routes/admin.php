<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\IngredientController;
use App\Http\Controllers\Admin\RecipeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;

route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('admin.users');

route::resource('roles', RoleController::class)->names('admin.roles');

route::resource('categories', CategoryController::class)->except('show')->names('admin.categories');

route::resource('ingredients', IngredientController::class)->except('show')->names('admin.ingredients');

route::resource('recipes', RecipeController::class)->except('show')->names('admin.recipes');