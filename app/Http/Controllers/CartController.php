<?php

namespace App\Http\Controllers;

use Cookie;
use Closure;
use DB;
use App\Produck;
use App\Cart;
use App\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CartController extends Controller
{
    private function getCarts(){
        $carts = json_decode(request()->cookie('askes'), true);
        $carts = $carts != '' ? $carts:[];
        return $carts;
    }

    public function index()
    {
        return view('cart.index');
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
        return redirect()->back()->cookie($cookie);
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

            $order = Sale::create([
                'invoice' => Str::random(4) . '-' . time(),
                'user_id' => $request->user_id,
                'subtotal' => $subtotal,
            ]);

            foreach ($carts as $row) {
                $produck = Produck::find($row['produck_id'])->decrement('stock',$row['qty']);

               Cart::create([
                    'sale_id' => $order->id,
                    'produck_id' => $row['produck_id'],
                    'price' => $row['price'],
                    'qty' => $row['qty'],
                ]);
            }

            DB::commit();

            $carts = [];
            $cookie = cookie('askes', json_encode($carts), 2880);
            Cookie::queue(Cookie::forget('askes'));

            return redirect(route('cart.selesai', $order->invoice))->cookie($cookie);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function checkoutSelesai($invoice)
    {
        $order = Sale::where('invoice', $invoice)->first();
        return view('cart.checkout.invoice', compact('order'));
    }
}