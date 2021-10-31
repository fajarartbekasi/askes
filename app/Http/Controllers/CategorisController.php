<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategorisController extends Controller
{
    public function index()
    {
        $categorys = Category::paginate(5);

        return view('categorys.index', compact('categorys'));
    }
    public function create()
    {
        return view('categorys.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'      => 'required',
            'no_rak'    => 'required',
        ]);

        $category = Category::create([
            'name'  => $request->input('name'),
            'no_rak'  => $request->input('no_rak')
        ]);

        return redirect()->back();
    }
    public function show($id)
    {
        $categorys = Category::with('producks')->findOrFail($id);

        return view('user.category.show', compact('categorys'));
    }
}
