@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="alert alert-info">
                        <h4>Daftar transaksi yang anda lakukan</h4>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama produck</th>
                                <th>Categori</th>
                                <th>Jumlah permintaan</th>
                                <th>Harga</th>
                                <th>Tanggal Pembelian</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sales as $sale)
                                <tr>
                                    <td>{{$sale->carts->first()->produck->name}}</td>
                                    <td>{{$sale->carts->first()->produck->category->name}}</td>
                                    <td>{{$sale->carts->first()->qty}}</td>
                                    <td>{{$sale->carts->first()->price}}</td>
                                    <td>{{$sale->carts->first()->created_at->format('Y-m-d')}}</td>
                                    <td>{{$sale->subtotal}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
