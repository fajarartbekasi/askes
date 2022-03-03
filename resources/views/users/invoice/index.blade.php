@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h4>Daftar Invoice</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nomor Invoice</th>
                                <th>Nama Produk</th>
                                <th>Nama Kategori</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($invoices as $invoice)
                                <tr>
                                    <td>{{$invoice->invoice}}</td>
                                    <td>{{$invoice->carts->first()->produck->name}}</td>
                                    <td>{{$invoice->carts->first()->produck->category->name}}</td>
                                    <td>
                                        <a href="{{route('user.show.invoice', $invoice->id)}}" class="btn btn-info btn-sm">cek invoice</a>
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
