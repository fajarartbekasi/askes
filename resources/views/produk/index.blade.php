@extends('layouts.app')

@section('content')
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Produk</a></li>
                <li class="breadcrumb-item active" aria-current="page">Index</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow">
                    <div class="card-header bg-white border-0 shadow-sm">
                        <div class="alert alert-info">
                            <h5>
                                Laporan Produk
                            </h5>
                        </div>
                        <div class="mb-2">
                            <form action="{{route('laporan.periode.produck')}}" method="get">
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
                                    <div class="d-flex justify-content-between">
                                        <div class="ml-3">
                                            <button class="btn btn-info mr-3">Cari Laporan periode</button>
                                            <a href="{{route('laporan.all.produck')}}" class="btn btn-primary">Cetak Semua</a>
                                        </div>
                                        <div class>
                                            <a href="{{route('produk.ambil-form')}}" class="btn btn-primary ml-3">Tambah produck</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <h4 class="fw-bold">Daftar Produk</h4>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Kategori</th>
                                    <th>Nama Produk</th>
                                    <th>Stok</th>
                                    <th>Tanggal</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($producks as $produck)
                                    <tr>
                                        <td>{{$produck->category->name}}</td>
                                        <td>{{$produck->name}}</td>
                                        <td>{{$produck->stock}}</td>
                                        <td>{{$produck->created_at->format('Y-m-d')}}</td>
                                        <td>
                                            <form action="{{route('produk.destroy', $produck->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{route('produk.edit', $produck->id)}}" class="btn btn-outline-info btn-sm">Edit Produck</a>
                                                <a href="{{route('pengajuan.edit', $produck->id)}}" class="btn btn-outline-info btn-sm">Buat Pengajuan</a>
                                                <button class="btn btn-outline-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            {{$producks->links()}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
