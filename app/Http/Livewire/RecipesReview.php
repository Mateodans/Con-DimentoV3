<?php

namespace App\Http\Livewire;

use App\Models\recipe;
use Illuminate\Http\Request;
use Livewire\Component;

class RecipesReview extends Component
{
    public $recipe_id, $comment;

    public $rating = 5;

    public function mount(recipe $recipe)
    {
        $this->recipe_id = $recipe->id;
    }

    public function render()
    {

        $recipe = recipe::find($this->recipe_id);

        return view('livewire.recipes-review', compact('recipe'));
    }

    public function store(){

        $recipe = recipe::find($this->recipe_id);

        $recipe->reviews()->create([
            'comment' => $this->comment,
            'rating' => $this->rating,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('recipes.show', $recipe);

    }
}
