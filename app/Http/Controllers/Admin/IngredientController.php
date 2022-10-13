<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ingredient;


class IngredientController extends Controller
{

    public function __construct(){
        $this->middleware('can:admin.ingredientsrecipes.index')->only('index');
        $this->middleware('can:admin.ingredients.create')->only('create', 'store');
        $this->middleware('can:admin.ingredients.edit')->only('edit', 'update');
        $this->middleware('can:admin.ingredients.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.ingredients.index', [
            'ingredients' => Ingredient::all()
        ]);

        return view('admin.ingredients.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ingredients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $ingredient = Ingredient::create($request->all());

        return redirect()->route('admin.ingredients.index', compact('ingredient'))
            ->with('success', 'Ingredient created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ingredient $ingredient)
    {
        return view('admin.ingredients.show', compact('ingredient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingredient $ingredient)
    {
        return view('admin.ingredients.edit', compact('ingredient'))->with('success', 'Ingredient updated successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Ingredient $ingredient)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $ingredient->update($request->all());

        return redirect()->route('admin.ingredients.index', compact('ingredient'))
            ->with('success', 'Ingredient updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();

        return redirect()->route('admin.ingredients.index')
            ->with('info', 'Ingredient deleted successfully');
    }
}
