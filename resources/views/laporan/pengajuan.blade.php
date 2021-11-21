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
            <h4>Pengajuan Permintaan barang</h4>
        </div>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama Produck</th>
                    <th>Quality</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$pengajuan->name}}</td>
                    <td>{{$pengajuan->qty}}</td>
                    <td>{{$pengajuan->price}}</td>
                    <td>{{$pengajuan->price * $pengajuan->qty}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection