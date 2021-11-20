<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
}
