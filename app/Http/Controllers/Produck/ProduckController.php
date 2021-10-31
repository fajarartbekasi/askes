<?php

namespace App\Http\Controllers\Produck;

use App\Produck;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProduckController extends Controller
{
    public function index()
    {
        $categorys = Category::all();
        $producks = Produck::with('category')->paginate(5);

        return view('users.producks.index', compact('producks','categorys'));
    }
    public function show($id)
    {
        $produck = Produck::with('category')->findOrFail($id);

        return view('users.producks.show', compact('produck'));
    }
}
