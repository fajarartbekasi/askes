<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Category;
use App\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PembayaranController extends Controller
{
    public function create($id)
    {
        $data = [
            'pembayarans' => Sale::where('user_id', Auth::user()->id)->get(),
            'categorys'   => Category::all(),
        ];
        return view('pembayaran.create', $data);
    }
    public function store($id)
    {

        $sale  = sale::findOrFail($id);

        $pembayaran = Pembayaran::create($this->validateRequest());

        $this->storeImage($pembayaran);
        if ($pembayaran->save()) {

            $sale->update([
                'status'    => 'berlangsung'
            ]);
        }
        return redirect()->back();
    }
    private function validateRequest()
    {
        return tap(request()->validate([
            'user_id'   => 'required',
            'sale_id'   => 'required',
            'image'     => 'required|mimes:jpeg,jpg,png|max:5000',
        ]), function () {
            if (request()->hasFile('image')) {
                request()->validate([
                    'image'    => 'required|mimes:jpeg,jpg,png|max:5000',
                ]);
            }
        });
    }
    private function storeImage($pembayaran)
    {
        if (request()->has('image')) {
            $pembayaran->update([
                'image'  => request()->image->store('uploads', 'public'),
            ]);

            $image = Image::make(public_path('storage/' . $pembayaran->image))->fit(300, 300, null, 'top-left');
            $image->save();
        }
    }
}
