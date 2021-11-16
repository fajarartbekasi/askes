@extends('layouts.app')

@section('content')
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Categori</a></li>
                <li class="breadcrumb-item active" aria-current="page">Index</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow">
                    <div class="card-header bg-white border-0 shadow-sm">
                        <a href="{{route('categori.ambil-form')}}" class="btn btn-info">Tambah Categori</a>
                    </div>
                    <div class="card-body">
                        <div>
                            <h4 class="fw-bold">Daftar Categori</h4>
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Nomor Rak</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categorys as $category)
                                    <tr>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->no_rak}}</td>
                                        <td>
                                            <form action="{{route('categori.destroy', $category->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{route('categori.edit', $category->id)}}" class="btn btn-outline-info btn-sm">Edit Category</a>
                                                <button type="submit" class="btn btn-outline-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$categorys->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection