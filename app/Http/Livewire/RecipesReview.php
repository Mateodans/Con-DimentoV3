<?php

namespace App\Http\Livewire;

use App\Models\recipe;
use Livewire\Component;

class RecipesReview extends Component
{
    public $rating = 5;

    public $recipe_id, $comment;

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
            'rating' => $this->rating,
            'comment' => $this->comment,

        ]);
    }
}
