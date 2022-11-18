<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\ingredient;
use App\Http\Requests\RecipeRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Livewire\WithPagination;

class RecipeController extends Controller
{

    use WithPagination;

    public function __construct(){
        $this->middleware('can:admin.recipes.index')->only('index');
        $this->middleware('can:admin.recipes.create')->only('create', 'store');
        $this->middleware('can:admin.recipes.edit')->only('edit', 'update');
        $this->middleware('can:admin.recipes.destroy')->only('destroy');
    }

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

    public function clienteIndex()
    {
        $user = Auth::user()->id;

        $recipes = Recipe::where('user_id', '=', $user)->paginate(10);

         return view('livewire/usuario-recipe', compact('recipes'));
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

            $users = User::pluck('name', 'id');
        return view('admin.recipes.create', compact('categories', 'ingredients', 'users'));

    }

    public function clienteCreate()
    {
        $categories = Category::pluck('name', 'id');
        $ingredients = Ingredient::all();

        $users = User::where('id', auth()->user()->id)->pluck('name', 'id');
            return view('recipe-create.create', compact('categories', 'ingredients', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecipeRequest $request)
    {

        $recipe = Recipe::create([
            'title' => $request->title,
            'status' => $request->status,
            'user_id' => $request->user_id,
            'body' => $request->body,
            'steps' => $request->steps,
        ]);
        $recipe->categories()->attach($request->category_id);
        $recipe->ingredients()->attach($request->ingredients);

        if($request->file('file')){
            $url = Storage::put('public/recipes', $request->file('file'));
            $recipe->image()->create([
                'url' => $url
            ]);
        }

        Cache::flush();

            if($request->ingredient){
                $recipe->ingredients()->attach($request->ingredient);
            }
            return redirect()->route('admin.recipes.index')->with('info', 'La receta se creó con éxito');
        // return redirect()->route('admin.recipes.index', compact('recipe'))->with('info', 'La receta se creó con éxito');
    }

    public function clienteStore(RecipeRequest $request){
        $recipe = Recipe::create([
            'title' => $request->title,
            'status' => $request->status,
            'user_id' => $request->user_id,
            'body' => $request->body,
            'steps' => $request->steps,
        ]);
        $recipe->categories()->attach($request->category_id);
        $recipe->ingredients()->attach($request->ingredients);

        if($request->file('file')){
            $url = Storage::put('public/recipes', $request->file('file'));
            $recipe->image()->create([
                'url' => $url
            ]);
        }

        Cache::flush();

            if($request->ingredient){
                $recipe->ingredients()->attach($request->ingredient);
            }
        return redirect()->route('usuario.recipes.index')->with('info', 'La receta se creó con éxito');
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

    public function clienteEdit(Recipe $recipe)
    {

        $user = Auth::user()->id;
        if ($user === $recipe->user_id) {
            $categories = Category::pluck('name', 'id');
            $ingredients = Ingredient::all();
            return view('recipe-create.edit', compact('recipe', 'categories', 'ingredients'));
        }else {
            return redirect()->route('usuario.recipes.index');
        }
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

        $recipe->update($request->all([
            'title',
            'body',
            'steps',
            'status',
            'user_id'
        ]));

        if($request->category_id){
            $recipe->categories()->sync($request->category_id);
        }

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

            Cache::flush();

        }

        if($request->ingredients){
            $recipe->ingredients()->sync($request->ingredients);
        }

        return redirect()->route('admin.recipes.edit', $recipe)->with('info', 'La receta se actualizó con éxito');

    }

    public function clientUpdate(RecipeRequest $request, Recipe $recipe)
    {

        $this->authorize('author', $recipe);

        $recipe->update($request->all([
            'title',
            'body',
            'steps',
            'status',
            'user_id'
        ]));
        if($request->category_id){
            $recipe->categories()->sync($request->category_id);
        }

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

            Cache::flush();

        }

        if($request->ingredients){
            $recipe->ingredients()->sync($request->ingredients);
        }

        return redirect()->route('usuario.recipes.index', $recipe)->with('info', 'La receta se actualizó con éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function clientDestroy(Recipe $recipe)
    {

        $this->authorize('author', $recipe);

        $recipe->delete();

        Cache::flush();

        return redirect()->route('usuario.recipes.index')->with('info', 'La receta se eliminó con éxito');
    }

    public function destroy(Recipe $recipe)
    {

        $this->authorize('author', $recipe);

        $recipe->delete();

        Cache::flush();

        return redirect()->route('admin.recipes.index')->with('info', 'La receta se eliminó con éxito');
    }
}
