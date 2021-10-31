@extends('layouts.index')


@section('content')
 <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Keranjang Belanjaan Anda</li>
            </ol>
        </nav>
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="" method="post">
                                @csrf
                                @forelse ($carts as $row)
                                    <tr>
                                        <td>{{ $row['name'] }}</td>
                                        <td><h5>Rp {{ number_format($row['price']) }}</h5></td>
                                        <td>
                                            <div class="product_count">
                                                    <input type="number" name="qty[]" id="sst{{ $row['produck_id'] }}" maxlength="12" value="{{ $row['qty'] }}" title="Quantity:" class="input-text qty">
                                                    <input type="hidden" name="produck_id[]" value="{{ $row['produck_id'] }}" class="form-control">
                                            </div>
                                            </td>
                                        <td>
                                            <h5>Rp {{ number_format($row['price'] * $row['qty']) }}</h5>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">Tidak ada belanjaan</td>
                                    </tr>
                                @endforelse
                            </form>
                            <tr>
                                <td colspan="3">
                                    <h5 class="text-right">Subtotal</h5>
                                </td>
                                <td >
                                    <h5 class="">Rp {{ number_format($subtotal) }}</h5>
                                </td>
                            </tr>
                            <div class="float-right mb-2">
                                <a href="{{route('producks')}}" class="btn btn-primary">Tambah Belanjaan</a>
                                <a href="{{route('cart.checkout')}}" class="btn btn-info">Proses Belanjaan</a>
                            </div>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>


@endsection