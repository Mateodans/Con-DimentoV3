<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\recipe;

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

}
