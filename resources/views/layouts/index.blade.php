<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                font-size: 3.5rem;
                }
            }
        </style>
    </head>
    <body stylesheet="padding-top: 3.5rem;" class="bg-white">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand " href="{{ url('/') }}">
                    <h4 class="fw-bold">{{ config('app.name', 'Laravel') }}</h4>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{route('home')}}" class="nav-link text-semigray fw-bold" >Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('producks')}}" class="nav-link text-semigray fw-bold " >Produk</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('cart.show')}}" class="nav-link text-semigray fw-bold " >Keranjang</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main id="app" role="main" class="mb-3">
            <div class="jumbotron" style="background-image: url('images/undraw_medicine_b1ol.png'); background-size: 100%; background-repeat: no-repeat;">
                <div class="container">
                    <p class="text-white">
                        <div class="d-flex">
                            <h1>Welcome to</h1>
                            <h1 class="ml-2 fw-bold">{{ config('app.name', 'Laravel') }}</h1>
                        </div>
                        <div>
                            <h3>Penuhi semua kebutuhan kesehatan kamu bersama kami.</h3>
                            <p class="text-secondary">Cepat mudah efisien dalam memenuhi semua yang anda</p>
                        </div>

                    </p>
                    @guest
                        <div class="d-flex">
                            <a class="btn btn-primary btn-lg lift shadow" href="{{ route('login') }}" role="button">Login</a>
                            @if (Route::has('register'))
                                <a class="btn btn-primary-soft btn-lg lift ml-2" href="{{ route('register') }}" role="button">register</a>
                            @endif
                        </div>
                    @else
                        <div>
                            <a class="btn btn-primary btn-lg lift shadow" href="#" role="button">
                                {{ Auth::user()->name }} - {{Auth::user()->roles->implode('name',',')}} <span class="caret"></span>
                            </a>
                        </div>
                    @endguest
                </div>
            </div>
            @include('flash::message')
            @include('layouts._errors')
            @yield('content')
        </main>

    </body>
</html>
