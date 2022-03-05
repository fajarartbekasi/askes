@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @forelse ($pembayarans as $get)
            <div class="card border-0 shadow-sm mb-3">
                <div class="card-head border-0">
                    <div class="alert alert-info">
                        <h4>Hello, {{$get->user->name}}</h4>
                        Silahkan masukan bukti pembayaran anda
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('user.confirm-pembayaran', $get->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" id="" class="form-control" value="{{$get->invoice}}">
                                    <input type="hidden" name="user_id" id="" class="form-control"
                                        value="{{$get->user_id}}">
                                    <input type="hidden" name="sale_id" id="" class="form-control"
                                        value="{{$get->carts->first()->produck_id}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="file" id="" name="image" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-info">Upload pembayaran</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @empty
            <h1>Maaf form yang anda minta bukan milik anda</h1>
            @endforelse

        </div>
    </div>
</div>
@endsection
