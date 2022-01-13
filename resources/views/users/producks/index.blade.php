@extends('layouts.index')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card border-0 mb-3">
                <h4>Filter</h4>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($categorys as $category)
                            <li class="list-group-item">
                                <a class="text-info" href="{{route('producks.show-all', $category->id)}}">{{$category->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                @foreach($producks as $produck)
                    <div class="col-md-4">
                        <h3>Producks</h3>
                        <a href="{{route('producks.show', $produck->id)}}" class="btn-card lift shadow-sm">
                            <div class="card border-0" >
                                <div class="card-header border-0 bg-white">
                                    <img src="{{ url('storage/'. $produck->image) }}" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-info">{{$produck->name}}</h5>
                                    <h6 class="card-text">Rp. {{$produck->price}}</h6>
                                    <h6 class="card-text">Stock. {{$produck->stock}}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
