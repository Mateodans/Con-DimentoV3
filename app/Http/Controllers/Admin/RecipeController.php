<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\ingredient;
use App\Http\Requests\RecipeRequest;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $recipes = Recipe::latest('id')->paginate(10);

         return view('admin.recipes.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::pluck('name', 'id');
        $ingredients = Ingredient::all();

        return view('admin.recipes.create', compact('categories', 'ingredients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecipeRequest $request)
    {
        // return Storage::put('recipes', $request->file('file'));
        $recipe = Recipe::create($request->all());

        if($request->file('file')){
            $url = Storage::put('recipes', $request->file('file'));
            $recipe->image()->create([
                'url' => $url
            ]);
        }

            if($request->ingredient){
                $recipe->ingredients()->attach($request->ingredient);
            }
        return redirect()->route('admin.recipes.index')->with('info', 'La receta se creó con éxito');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        return view('admin.recipes.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {

        $this->authorize('author', $recipe);

        $categories = Category::pluck('name', 'id');
        $ingredients = Ingredient::all();


        return view('admin.recipes.edit', compact('recipe', 'categories', 'ingredients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RecipeRequest $request, Recipe $recipe)
    {

        $this->authorize('author', $recipe);

        $recipe->update($request->all());

        if($request->file('file')){
            $url = Storage::put('recipes', $request->file('file'));

            if($recipe->image){
                Storage::delete($recipe->image->url);

                $recipe->image->update([
                    'url' => $url
                ]);
            }else{
                $recipe->image()->create([
                    'url' => $url
                ]);
            }
        }

        if($request->ingredient){
            $recipe->ingredients()->sync($request->ingredient);
        }

        return redirect()->route('admin.recipes.edit', $recipe)->with('info', 'La receta se actualizó con éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {

        $this->authorize('author', $recipe);

        $recipe->delete();

        return redirect()->route('admin.recipes.index')->with('info', 'La receta se eliminó con éxito');
    }
}
