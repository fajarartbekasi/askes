<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $categorys = Category::all();
        return view('welcome', compact('categorys'));
    }
}
