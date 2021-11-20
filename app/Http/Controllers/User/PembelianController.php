<?php

namespace App\Http\Controllers\User;

use App\Role;
use App\Sale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PembelianController extends Controller
{
    public function index()
    {
        $sales = Sale::with('user','carts')
                       ->where('user_id', Auth::user()->id)
                       ->latest()->paginate(5);
        return view('users.pembelian.index', compact('sales'));
    }
}
