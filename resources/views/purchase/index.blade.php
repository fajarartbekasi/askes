@extends('layouts.app')

@section('content')
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Data Pengajuan</a></li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow">

                    <div class="card-body">
                        <div>
                            <h4 class="fw-bold">Daftar Produk</h4>
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nama Produck</th>
                                    <th>Quality</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($purchases as $produck)
                                    <tr>
                                        <td>{{$produck->name}}</td>
                                        <td>{{$produck->qty}}</td>
                                        <td>Rp.{{number_format($produck->price)}}</td>
                                        <td>Rp.{{number_format($produck->price * $produck->qty)}}</td>
                                        <td>
                                            <a href="{{route('pengajuan.show', $produck->id)}}" class="btn btn-outline-info btn-sm">Cetak Pengajuan</a>
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