<?php

namespace App\Http\Controllers\Laporan;

use PDF;
use App\Produck;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProduckController extends Controller
{
    public function periode(Request $request)
    {
        if ($request->has('tgl_awal')) {
            $producks = Produck::whereBetween('created_at', [request('tgl_awal'), request('tgl_akhir')])
                                    ->get();
        }

        $pdf = PDF::loadView('laporan.producks.periode', compact('producks'))->setPaper('a4', 'landscape');

        return $pdf->stream('rekap_periode_produck.pdf');
    }
    public function all()
    {
        $producks = Produck::all();

        $pdf = PDF::loadView('laporan.producks.all', compact('producks'))->setPaper('a4', 'landscape');

        return $pdf->stream('rekap_laporan_produck.pdf');
    }
}
