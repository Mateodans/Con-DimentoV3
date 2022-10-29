<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\recipe;
use App\Models\review;

class RecipePolicy
{
    use HandlesAuthorization;

    public function author(User $user, Recipe $recipe)
    {
        if($user->id == $recipe->user_id){
            return true;
        }else{
            return false;
        }
    }

    public function published(?User $user, Recipe $recipe)
    {
        if($recipe->status == 2){
            return true;
        }else{
            return false;
        }
    }

    public function review(User $user, Recipe $recipe)
    {
        if(review::where('user_id', $user->id)->where('recipe_id', $recipe->id)->count() == 0){
            return false;
        }else{
            return true;
        }
    }
}
