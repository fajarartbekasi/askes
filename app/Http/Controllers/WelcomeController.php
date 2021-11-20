<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index()
    {

        return view('welcome');
    }
}
