@extends('layouts.cetak')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="text-center">
            <P>
                <b>
                    <h3>PT. {{ config('app.name', 'Laravel') }}
                        <br>
                        Jl.Bukti Gading Raya Block C No. 12-15 Kelapa Gading Permai
                        <br>
                        Jakarta, 14240, INDONESIA
                    </h3>
                    <hr>
                </P>
        </div>
        <div class="">
            <h4>Laporan Data Pembelian</h4>
        </div>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Invoice</th>
                    <th>Nama Pembeli</th>
                    <th>Kategori</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>stock</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sales as $get)
                    <tr>
                        <td>{{$get->invoice}}</td>
                        <td>{{$get->user->invoice}}</td>
                        <td>{{$get->carts->first()->produck->category->name}}</td>
                        <td>{{$get->carts->first()->produck->name}}</td>
                        <td>{{$get->price}}</td>
                        <td>{{$get->qty}}</td>
                        <td>
                            Rp.{{ $get->subtotal }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection