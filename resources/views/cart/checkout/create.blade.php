@extends('layouts.index')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Konfirmasi Belanjaan</li>
        </ol>
    </nav>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <form action="{{route('cart.proses')}}" method="post" novalidate="novalidate">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Informasi Customer</h3>
                                <div class="form-group">
                                    <label for="">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="first" value="{{Auth::user()->name}}" required>
                                    <input type="hidden" name="user_id" class="form-control"value="{{Auth::user()->id}}" required>
                                    <p class="text-danger">{{ $errors->first('customer_name') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input type="text" name="address" id="" value="{{Auth::user()->address}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">phone</label>
                                    <input type="text" name="phone" id="" value="{{Auth::user()->phone}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h2>Ringkasan Pesanan</h2>
                                <ul class="list-group">
                                    @foreach ($carts as $cart)
                                    <li class="list-group-item border-0">
                                        <a href="#" class="text-dark">{{$cart['name']}}
                                            <div class="d-flex justify-content-between">
                                                <span class="middle text-muted">x {{ $cart['qty'] }}</span>
                                                <span class="last text-muted">Rp {{ number_format($cart['price']) }}</span>
                                            </div>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                <ul class="list-group">
                                    <li class="list-group-item border-0">
                                        <a href="#">
                                            <div class="d-flex justify-content-between text-muted">
                                                <span>Subtotal</span>
                                                <span>Rp {{ number_format($subtotal) }}</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-group-item border-0 bg-info">
                                        <a href="#" class="text-white">
                                            <div class="d-flex justify-content-between text-white">
                                                <span>Total</span>
                                                <span id="total" class="">Rp {{ number_format($subtotal) }}</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <button type="submit" class="btn btn-outline-primary mt-2">Bayar Pesanan</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection