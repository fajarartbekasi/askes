@extends('layouts.app')

@section('content')
<div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Categori</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Category</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow">
                    <div class="card-header bg-white border-0 shadow-sm">
                        <h4 class="fw-bold">Tambah category</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('categori.update', $categori->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nama Kategori</label>
                                        <input type="text" name="name" id=""  value="{{$categori->name}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nomor rak</label>
                                        <input type="text" name="no_rak" id="" value="{{$categori->no_rak}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex">
                                    <button type="submit" class="btn btn-info mr-3">Simpan kategori</button>
                                    <a href="{{route('categori')}}" type="submit" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection