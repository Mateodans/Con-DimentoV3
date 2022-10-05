<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\recipe;

class RecipeController extends Controller
{
    public function index(){
        $recipes = recipe::where('status', 2)->latest('id')->paginate(8);

        return view('recipes.index', compact('recipes'));
    }

    public function show(recipe $recipe){

        $similar = recipe::where('category_id', $recipe->category_id)
                            ->where('status', 1)
                            ->latest('id')
                            ->take(4)
                            ->get();

        return view('recipes.index', [
            'recipes => $recipes'
        ]);
    }
}
