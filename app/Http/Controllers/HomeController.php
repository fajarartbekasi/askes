<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Category;
use App\Produck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'sales' => Sale::with('user')->where('user_id', Auth::user()->id)->count(),
            'categorys' => Category::count(),
            'producks' => Produck::count(),
            'transactions' => Sale::count(),
        ];
        return view('home', $data);
    }
}
