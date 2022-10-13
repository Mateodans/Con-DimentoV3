<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\Admin\HomeController;

Route::get('/', [RecipeController::class, 'index'])->name('recipes.index');


Route::get('recipes/{recipe}', [RecipeController::class, 'show'])->name('recipes.show');

Route::get('category/{category}', [RecipeController::class, 'category'])->name('recipes.category');

Route::get('ingredient/{ingredient}', [RecipeController::class, 'ingredient'])->name('recipes.ingredient');

Route::get('/admin', [HomeController::class, 'index'])->name('admin.index');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
