@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6>{{ config('app.name', 'Laravel') }}</h6>
                    <h6>Informasi pembeli</h6>
                    <div class="pt-2 mb-2">
                        <div class="mb-2">
                            <h5>Nama : {{$invoice->user->name}}</h5>
                            <h5>Alamat : {{$invoice->user->address}}</h5>
                            <h5>Phone : {{$invoice->user->phone}}</h5>
                            <h5>Email : {{$invoice->user->email}}</h5>
                        </div>
                        <div class="pt-2">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nomor Invoice</th>
                                        <th>Nama Produk</th>
                                        <th>Nama Kategori</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$invoice->invoice}}</td>
                                        <td>{{$invoice->carts->first()->produck->name}}</td>
                                        <td>{{$invoice->carts->first()->produck->category->name}}</td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection