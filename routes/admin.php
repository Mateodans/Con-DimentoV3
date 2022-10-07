<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;

route::get('', [HomeController::class, 'index']);