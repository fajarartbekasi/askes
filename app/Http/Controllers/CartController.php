<?php

namespace App\Http\Controllers;

use DB;
use Cookie;
use Closure;
use App\Cart;
use App\Sale;
use App\Produck;
use Illuminate\Support\Str;
use App\Mail\PembelianMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    private function getCarts(){
        $carts = json_decode(request()->cookie('askes'), true);
        $carts = $carts != '' ? $carts:[];
        return $carts;
    }

    public function index()
    {
        $pembelians = Sale::with('user')
                            ->where('user_id', Auth::user()->id)
                            ->latest()->paginate(6);
        return view('cart.index', compact('pembelians'));
    }
    public function addToCart(Request $request)
    {
        $this->validate($request, [
            'produck_id' => 'required|exists:producks,id',
            'qty' => 'required|integer'
        ]);

        $carts = $this->getCarts();
        if ($carts && array_key_exists($request->produck_id, $carts)) {
            $carts[$request->produck_id]['qty'] += $request->qty;
        } else {
            $produck = Produck::find($request->produck_id);
            $carts[$request->produck_id] = [
                'qty' => $request->qty,
                'produck_id' => $produck->id,
                'name' => $produck->name,
                'price' => $produck->price,
            ];
        }

        $cookie = cookie('askes', json_encode($carts), 2880);
        flash('Belanjaan anda telah berhasil ditambah kedalam keranjang');
        return redirect()->route('cart.show')->cookie($cookie);
    }
    public function listcart()
    {
        $carts = $this->getCarts();
        $subtotal = collect($carts)->sum(function($q) {
            return $q['qty'] * $q['price'];
        });
        return view('cart.show', compact('carts', 'subtotal'));
    }
    public function checkout()
    {
        $carts = $this->getCarts();
        $subtotal = collect($carts)->sum(function($q) {
            return $q['qty'] * $q['price'];
        });
        return view('cart.checkout.create', compact('carts', 'subtotal'));
    }
    public function prosesCheckout(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $affiliate = json_encode(request()->cookie('askes'), true);

            $explodeAffiliate = explode('-', $affiliate);

            $carts = $this->getCarts();
            $subtotal = collect($carts)->sum(function($q) {
                return $q['qty'] * $q['price'];
            });

            $sale = Sale::create([
                'invoice' => Str::random(4) . '-' . time(),
                'user_id' => $request->user_id,
                'subtotal' => $subtotal,
                'status' => 'menunggu pembayaran',
            ]);

            foreach ($carts as $row) {
                $produck = Produck::find($row['produck_id'])->decrement('stock',$row['qty']);

               Cart::create([
                    'sale_id' => $sale->id,
                    'produck_id' => $row['produck_id'],
                    'price' => $row['price'],
                    'qty' => $row['qty'],
                ]);
            }

            $to = Mail::to(Auth::user()->email)->send(new PembelianMail($sale));

            DB::commit();

            $carts = [];
            $cookie = cookie('askes', json_encode($carts), 2880);
            Cookie::queue(Cookie::forget('askes'));
            flash('Terimakasih Silahkan periksa email anda untuk melakukan upload pembayaran');
            return redirect(route('cart.selesai', $sale->id))->cookie($cookie);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function checkoutSelesai($id)
    {
        $array = [
            'pembelian' => Cart::where('sale_id', '=' , $id)->get(),
            'order' => Cart::where('sale_id', '=' , $id)->firstOrFail(),
        ];

        return view('cart.checkout.invoice', $array);
    }
}
