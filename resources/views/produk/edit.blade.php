@extends('layouts.app')

@section('content')
<div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Produk</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Produk</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow">
                    <div class="card-header bg-white border-0 shadow-sm">
                        <h4 class="fw-bold">Tambah Produk</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('produk.update', $produck->id)}}" method="post" >
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nama Kategori</label>
                                        <select name="category_id" id="" class="form-control">
                                            <option value="">Pilih Kategori</option>
                                            @foreach($categorys as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nama produk</label>
                                        <input type="text" name="name" id="" value="{{$produck->name}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Stok</label>
                                        <input type="text" name="stock" id="" value="{{$produck->stock}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Deskripsi</label>
                                        <input type="text" name="description"value="{{$produck->description}}" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Harga</label>
                                        <input type="text" name="price" value="{{$produck->price}}" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex">
                                    <button type="submit" class="btn btn-info mr-3">Simpan kategori</button>
                                    <a href="{{route('produk')}}" type="submit" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection