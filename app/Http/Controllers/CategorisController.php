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
    public function edit($id)
    {
        $categori = Category::findOrFail($id);

        return view('categorys.edit', compact('categori'));
    }
    public function update(Request $request, Category $category)
    {

        $this->validate($request,[
            'name'      => 'required',
            'no_rak'    => 'required',
        ]);

        $category->update($request->all());

        return redirect()->back();

    }
    public function show($id)
    {
        $categorys = Category::with('producks')->findOrFail($id);

        return view('user.category.show', compact('categorys'));
    }
    public function destroy($id)
    {

        $categorys = Category::findOrFail($id);

        $categorys->delete();
        return redirect()->back();
    }
}
