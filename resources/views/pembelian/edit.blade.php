@extends('layouts.app')

@section('content')

<div class="container offset-md-3">
    <div class="row">
        <div class="col-md-6 ">
            <div class="card border-0 sahdow-sm">
                <div class="card-body">
                    <div class="alert alert-info">
                        <h6>Form Pengajuan Barang</h6>
                    </div>

                    <div>
                        <form action="{{route('pengajuan.store')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Nama Barang</label>
                                        <input type="text" name="name" id="" value="{{$produck->name}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">jumlah Permintaan</label>
                                        <input type="text" name="qty" id="" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Harga</label>
                                        <input type="text" name="price" id="" value="{{$produck->price}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-info">
                                    Buat pengajuan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection