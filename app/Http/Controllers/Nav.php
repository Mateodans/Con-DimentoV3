<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;

class Nav extends Controller
{
    public function index(){
        $users = User::all();

            return view('vista', [
                    'user' => $users
            ]
        );
    }
}

