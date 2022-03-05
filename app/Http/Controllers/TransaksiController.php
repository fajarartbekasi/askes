<?php

namespace App\Http\Controllers;

use App\Sale;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function berlangsung()
    {
        $pembeliaans = Sale::where('status', 'berlangsung')->with('user')->latest()->paginate(5);

        return view('transaksi.berlangsung', compact('pembeliaans'));
    }
    public function selesai()
    {
        $pembeliaans = Sale::where('status', 'selesai')->with('user')->latest()->paginate(5);

        return view('transaksi.selesai', compact('pembeliaans'));
    }
    public function store(Request $request, $id)
    {
        $order = Sale::findOrFail($id);

        $order->update([
            'status'    => 'selesai'
        ]);

        flash('Terimakasih transaki telah selesai');

        return redirect()->back();
    }
}
