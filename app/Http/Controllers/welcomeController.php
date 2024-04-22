<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class welcomeController extends Controller
{
    public function welcome(){
       return Inertia::render('Index');
    }
}
