<?php

namespace App\Observers;

use App\Models\Recipe;
use Illuminate\Support\Facades\Storage;

class RecipeObserver
{
    /**
     * Handle the Recipe "created" event.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return void
     */
    public function creating(Recipe $recipe)
    {
        if(! \App::runningInConsole()){
            $recipe->user_id = auth()->user()->id;
        }
    }

    /**
     * Handle the Recipe "deleted" event.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return void
     */
    public function deleting(Recipe $recipe)
    {
        if($recipe->image){
            Storage::delete($recipe->image->url);
        }
    }

}
