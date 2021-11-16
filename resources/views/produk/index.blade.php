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
                        <a href="{{route('produk.ambil-form')}}" class="btn btn-info">Tambah Produk</a>
                    </div>
                    <div class="card-body">
                        <div>
                            <h4 class="fw-bold">Daftar Produk</h4>
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Kategori</th>
                                    <th>Nama Produk</th>
                                    <th>Stok</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($producks as $produck)
                                    <tr>
                                        <td>{{$produck->category->name}}</td>
                                        <td>{{$produck->name}}</td>
                                        <td>{{$produck->stock}}</td>
                                        <td>
                                            <form action="{{route('produk.destroy', $produck->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{route('produk.edit', $produck->id)}}" class="btn btn-outline-info btn-sm">Edit Produck</a>
                                                <button class="btn btn-outline-danger btn-sm">Delete</button>
                                            </form>
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