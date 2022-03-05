<?php

namespace App\Http\Controllers;

use App\Sale;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function index()
    {
        $pembeliaans = Sale::where('status','menunggu pembayaran')->with('user')->latest()->paginate(5);
        return view('pembelian.index', compact('pembeliaans'));
    }

}
