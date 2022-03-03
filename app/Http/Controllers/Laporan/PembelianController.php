<?php

namespace App\Http\Controllers\Laporan;

use PDF;
use App\Sale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PembelianController extends Controller
{
    public function periode(Request $request)
    {
        if ($request->has('tgl_awal')) {
            $sales = Sale::whereBetween('created_at', [request('tgl_awal'), request('tgl_akhir')])->get();
        }

        $pdf = PDF::loadView('laporan.pembelian.periode', compact('sales'))->setPaper('a4', 'landscape');

        return $pdf->stream('rekap_periode_sales.pdf');
    }
    public function all()
    {
        $sales = Sale::all();

        $pdf = PDF::loadView('laporan.pembelian.all', compact('sales'))->setPaper('a4', 'landscape');

        return $pdf->stream('rekap_periode_sales.pdf');
    }
}
