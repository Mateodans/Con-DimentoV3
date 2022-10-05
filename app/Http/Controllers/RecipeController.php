<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\recipe;

class RecipeController extends Controller
{
    public function index(){
        $recipes = recipe::where('status', 1)->latest('id')->paginate(8);

        return view('recipes.index', [
            'recipes' => $recipes
        ]);
    }
}
