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
            <h4>Laporan Data Produk</h4>
        </div>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Kategori</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Stock</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($producks as $produck)
                    <tr>
                        <td>{{$produck->category->name}}</td>
                        <td>{{$produck->name}}</td>
                        <td>{{$produck->price}}</td>
                        <td>{{$produck->stock}}</td>
                        <td>{{$produck->created_at->format('Y-m-d')}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
