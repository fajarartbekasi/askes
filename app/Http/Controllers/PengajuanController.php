<?php

namespace App\Http\Controllers;

use PDF;
use App\Produck;
use App\Purchase;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index()
    {
        $purchases = Purchase::latest()->paginate(5);

        return view('purchase.index', compact('purchases'));
    }
    public function edit($id)
    {
       $produck = Produck::findOrFail($id);

       return view('pembelian.edit', compact('produck'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'qty'       => 'required',
            'name'      => 'required',
            'price'     => 'required',
        ]);

        $pengajuan = Purchase::create($request->all());

        flash('Terimakasih telah membuat pengajuan silahkan cetak pengajuan barang anda');

        return redirect()->back();
    }
    public function show($id)
    {
        $pengajuan = Purchase::findOrFail($id);

        $pdf = PDF::loadView('laporan.pengajuan', compact('pengajuan'))->setPaper('a4', 'landscape');

        return $pdf->stream('pengajuan.pdf');
    }
}
