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
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <h4>Data Penjualan</h4>
                        </div>
                        <div>
                            <a href="{{route('transaksi.berlangsung')}}" class="btn btn-info">Transaksi Berlangsung</a>
                            <a href="{{route('transaksi.selesai')}}" class="btn btn-success">Transaksi Selesai</a>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Invoice</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pembeliaans as $get)
                            <tr>
                                <td>{{$get->invoice}}</td>
                                <td>{{$get->user->name}}</td>
                                <td>Rp. {{number_format($get->carts->first()->price)}}</td>
                                <td>{{$get->carts->first()->qty}}</td>
                                <td>
                                   @if($get->status == 'berlangsung')
                                        <form action="{{route('user.transaksi.selesai', $get->id)}}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-primary btn-sm">Selesaikan Transaksi</button>
                                        </form>
                                        @else
                                        <span class="badge badge-info">{{$get->status}}</span>
                                    @endif
                                </td>
                                <td>{{$get->created_at->format('Y-m-d')}}</td>
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
