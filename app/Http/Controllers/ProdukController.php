<?php

namespace App\Http\Controllers;

use App\Category;
use App\Produck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProdukController extends Controller
{
    public function index()
    {
        $producks = Produck::paginate(5);

       return view('produk.index', compact('producks'));
    }
    public function create()
    {
        $categorys = Category::all();

        return view('produk.create', compact('categorys'));
    }
    public function store()
    {
        $produck = Produck::create($this->validateRequest());

       $this->storeImage($produck);

        return redirect()->back();
    }
    public function edit($id)
    {
        $produck = Produck::findOrFail($id);

        $categorys = Category::all();

        return view('produk.edit', compact('produck','categorys'));
    }
    public function update(Request $request, Produck $produck)
    {
        $this->validate($request, [
            'category_id'   => 'required',
            'name'          => 'required',
            'description'   => 'required',
            'stock'         => 'required',
            'price'         => 'required',
        ]);

        $this->storeImage($produck);

        return redirect()->back();
    }
     private function validateRequest(){
        return tap(request()->validate([
            'category_id'   => 'required',
            'name'          => 'required',
            'description'   => 'required',
            'stock'         => 'required',
            'price'         => 'required',
            'image'         => 'required|mimes:jpeg,jpg,png|max:5000',
        ]), function(){
            if(request()->hasFile('image')){
                request()->validate([
                    'image'    => 'required|mimes:jpeg,jpg,png|max:5000',
                ]);
            }
        });
    }

    private function storeImage($barang){
        if(request()->has('image')){
            $barang->update([
                'image'  => request()->image->store('uploads','public'),
            ]);

            $image = Image::make(public_path('storage/'. $barang->image))->fit(300,300, null, 'top-left');
            $image->save();
        }
    }
}
