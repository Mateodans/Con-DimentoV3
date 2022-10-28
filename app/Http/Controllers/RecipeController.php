<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecipeRequest;
use App\Models\Category;
use App\Models\ingredient;
use Illuminate\Http\Request;
use App\Models\recipe;
use Illuminate\Support\Facades\Cache;


class RecipeController extends Controller
{

    public function index(){

        // if (request()->page) {
        //     $key = 'recipes' . request()->page;
        // }else{
        //     $key = 'recipes';
        // }

        // if (Cache::has($key)) {
        //     $recipes = Cache::get($key);
        // } else {
            $recipes = recipe::where('status','=', '2')->latest('id')->paginate(8);
            // Cache::put($key, $recipes);
        

        return view('recipes.index', compact('recipes'));
    }

    public function show(recipe $recipe){

        if(auth()->user()){
            $similar = $recipe->categories()->wherePivot('recipe_id', '=', $recipe->id)->get();
            return view('recipes.show', [
                'recipe' => $recipe,
                'similar' => $similar
            ]);
        }
        else{
            return redirect()->route('recipes.index');
        }
            }


    public function category(Category $category){

        $recipes = $category->recipes;

        return view('recipes.category', [
            'recipes' => $recipes,
            'category' => $category
        ]);
    }

    public function ingredient(ingredient $ingredient){

        $recipes = $ingredient->recipes;

        // return $ingredient->recipes()->where()->get();
        return view('recipes.ingredient', [
            'recipes' => $recipes,
            'ingredient' => $ingredient
        ]);
    }

}
