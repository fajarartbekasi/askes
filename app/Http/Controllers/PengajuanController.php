<?php

namespace App\Http\Controllers;

use App\Purchase;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index()
    {
        $purchases = Purchase::latest()->paginate(5);

        return view('purchase.index', compact('purchases'));
    }
}
