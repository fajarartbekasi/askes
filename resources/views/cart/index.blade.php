@extends('layouts.app')

@section('content')

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Cart</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-header border-bottom bg-white">
                    <h6 class="fw-bold">Keranjang Belanjaan anda</h6>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>Pembeli</td>
                                <td>Nama Produk</td>
                                <td>Harga</td>
                                <td>Quantity</td>
                                <td>Total</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pembelians as $get)
                                <tr>
                                    <td>{{$get->sale->user->name}}</td>
                                    <td>{{$get->produck->name}}</td>
                                    <td>{{$get->harga}}</td>
                                    <td>{{$get->qty}}</td>
                                    <td>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer bg-white border-top">
                    <div class="d-flex justify-content-between">
                        <div>
                            <a href="{{route('producks')}}" class="btn btn-outline-secondary mr-3">Tambah belanjaan</a>
                            <button class="btn btn-outline-info">Proses Belanjaan</button>
                        </div>
                        <div>
                            <h5>Sub Total : 0</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection