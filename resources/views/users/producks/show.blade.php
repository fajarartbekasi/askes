@extends('layouts.index')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <img src="{{ url('storage/'. $produck->image) }}" alt="" >
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h3 class="fw-bold text-info">{{$produck->name}}</h3>
                    <h3 class="fw-bold">Rp. {{$produck->price}}</h3>
                    <p>{{$produck->description}}</p>
                </div>
                <div class="card-footer">
                    @auth
                        <form action="{{route('cart.add-item')}}" method="post">
                            @csrf
                            <div class="form-group mx-sm-3 mb-2">
                                <input type="number" name="qty" id="sst" maxlength="12" title="Quantity:" class="form-control" placeholder="Jumlah Barang">
                                <input type="hidden" name="produck_id" value="{{ $produck->id }}" class="form-control">
                                <p class="text-danger">Jumlah stock tersisa. {{$produck->stock}}</p>
                            </div>
                            <div class="ml-3">
                                <button type="submit" class="btn btn-primary mb-2">Tambah Ke keranjang</button>
                            </div>
                        </form>
                    @else
                        <div class="ml-3">
                            <a href="{{route('login')}}" class="btn btn-info btn-block">Login</a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>

@endsection