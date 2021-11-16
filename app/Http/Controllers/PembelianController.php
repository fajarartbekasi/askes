<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function index()
    {
        $pembeliaans = Cart::with('produck','sale')->latest()->paginate(5);
        return view('pembelian.index', compact('pembeliaans'));
    }

}
