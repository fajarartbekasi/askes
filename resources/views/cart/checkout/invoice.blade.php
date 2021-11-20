@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <img src="{{asset('images/invoice.png')}}" height="25%" alt="" style="background-image: url('images/undraw_medicine_b1ol.png'); background-size: 100%; background-repeat: no-repeat;">
        </div>
        <div class="col-md-8">
            <div class="card border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="text-info">{{ config('app.name', 'Laravel') }}</h4>
                        <h4 class="text-secondary">Tujuan Pengiriman :</h4>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <h6>Nomor invoice : {{ $order->invoice }}</h6>
                            <h6>Diterbitkan oleh</h6>
                            <h6>Penjual : {{ config('app.name', 'Laravel') }}</h6>
                            <h6>tanggal : {{ $order->created_at }}</h6>
                        </div>
                        <div>
                            <h6>Alamat</h6>
                        </div>
                    </div>
                    <div class="pr-3">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $order->carts()->first()->produck->name }}</td>
                                    <td>{{ $order->carts()->first()->qty }}</td>
                                    <td>{{ $order->carts()->first()->price }}</td>
                                    <td>{{ number_format($order->subtotal) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-end">
                        <div>
                            <h4>Total Pembayaran Rp : {{ number_format($order->subtotal) }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection