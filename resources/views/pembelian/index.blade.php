@extends('layouts.app')

@section('content')
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Pembelian</a></li>
                <li class="breadcrumb-item active" aria-current="page">Index</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div>
                            <h4 class="fw-bold">Data Pembelian</h4>
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <td>Nomor Invoice</td>
                                    <td>Nama Pembeli</td>
                                    <td>Nama Produk</td>
                                    <td>Harga</td>
                                    <td>Quantity</td>
                                    <td>Total</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pembeliaans as $get)
                                    <tr>
                                        <td>{{$get->sale->invoice}}</td>
                                        <td>{{$get->sale->user->name}}</td>
                                        <td>{{$get->produck->name}}</td>
                                        <td>{{$get->price}}</td>
                                        <td>{{$get->qty}}</td>
                                        <td>
                                            Rp.{{ $get->sale->subtotal }}
                                        </td>
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