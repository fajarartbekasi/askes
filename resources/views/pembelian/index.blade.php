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
                    <div class="card-header border-0 bg-white shadow-sm">
                        <div class="alert alert-info">
                            <h5>
                                Laporan Penjualan
                            </h5>
                        </div>
                        <div class="mb-2">
                            <form action="{{route('laporan.periode.pembelian')}}" method="get">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Tgl Awal</label>
                                            <input type="date" name="tgl_awal" class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Tgl Akhir</label>
                                            <input type="date" name="tgl_akhir" class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="d-flex ml-3">
                                        <button class="btn btn-info mr-3">Cari Laporan periode</button>
                                        <a href="{{route('laporan.all.pembelian')}}" class="btn btn-primary">Cetak Semua</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4>Data Penjualan</h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td>Nomor Invoice</td>
                                    <td>Nama Pembeli</td>
                                    <td>Nama Produk</td>
                                    <td>Harga</td>
                                    <td>Quantity</td>
                                    <td>Tanggal</td>
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
                                        <td>{{$get->created_at->format('Y-m-d')}}</td>
                                        <td>
                                            Rp.{{ $get->sale->subtotal }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$pembeliaans->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
