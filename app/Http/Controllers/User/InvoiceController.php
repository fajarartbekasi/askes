<?php

namespace App\Http\Controllers\User;

use App\Role;
use App\User;
use App\Sale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Sale::with('user','carts')
                       ->where('user_id', Auth::user()->id)
                       ->latest()->paginate(5);

        return view('users.invoice.index', compact('invoices'));
    }
    public function show($id)
    {
        $invoice = Sale::findOrFail($id);

        return view('users.invoice.show', compact('invoice'));
    }
}
