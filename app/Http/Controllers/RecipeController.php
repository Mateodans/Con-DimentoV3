<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\recipe;


class RecipeController extends Controller
{
    
    public function index(){
        $recipes = recipe::where('status', 1)->latest('id')->paginate(8);

        return view('recipes.index', compact('recipes'));
    }

    public function show(recipe $recipe){

        $similar = $recipe->categories()->wherePivot('recipe_id', '=', $recipe->id)->get();

        return view('recipes.show', [
            'recipe' => $recipe,
            'similar' => $similar
        ]);
    }

    public function category(Category $category){

        $recipes = $category->recipes()->wherePivot('category_id', '=', $category->id)->get();

        return view('recipes.category', [
            'recipes' => $recipes,
            'category' => $category
        ]);
    }

}
