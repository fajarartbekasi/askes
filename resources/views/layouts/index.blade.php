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
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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

                <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-semigray fw-bold" >Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-semigray fw-bold" >Tentang Kami</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-semigray fw-bold " >Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-semigray fw-bold " >Principals</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-semigray fw-bold " >Kontak</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main role="main" class="mb-3">
            <div class="jumbotron" >
                <div class="container">
                    <p class="text-white">
                        <div class="d-flex">
                            <h1>Welcome to</h1>
                            <h1 class="ml-2 fw-bold">{{ config('app.name', 'Laravel') }}.</h1>
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
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                        </div>
                    @endguest
                </div>
            </div>
            @yield('content')
        </main>
        <footer class="py-8 py-md-11 bg-gray-200">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-3">

                        <!-- Brand -->
                        <h3 class="fw-bold">{{ config('app.name', 'Laravel') }}</h3>

                        <!-- Text -->
                        <p class="text-gray-700 mb-2">
                        A better way to build.
                        </p>

                        <!-- Social -->
                        <ul class="list-unstyled list-inline list-social mb-6 mb-md-0">
                            <li class="list-inline-item list-social-item me-3">
                                <a href="#!" class="text-decoration-none">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2 3C2 2.44772 2.44772 2 3 2H5.15287C5.64171 2 6.0589 2.35341 6.13927 2.8356L6.87858 7.27147C6.95075 7.70451 6.73206 8.13397 6.3394 8.3303L4.79126 9.10437C5.90756 11.8783 8.12168 14.0924 10.8956 15.2087L11.6697 13.6606C11.866 13.2679 12.2955 13.0492 12.7285 13.1214L17.1644 13.8607C17.6466 13.9411 18 14.3583 18 14.8471V17C18 17.5523 17.5523 18 17 18H15C7.8203 18 2 12.1797 2 5V3Z" fill="#4A5568"/>
                                    </svg>
                                </a>
                            </li>
                            <li class="list-inline-item list-social-item me-3">
                                <a href="#!" class="text-decoration-none">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5 4V7H4C2.89543 7 2 7.89543 2 9V12C2 13.1046 2.89543 14 4 14H5V16C5 17.1046 5.89543 18 7 18H13C14.1046 18 15 17.1046 15 16V14H16C17.1046 14 18 13.1046 18 12V9C18 7.89543 17.1046 7 16 7H15V4C15 2.89543 14.1046 2 13 2H7C5.89543 2 5 2.89543 5 4ZM13 4H7V7H13V4ZM13 12H7V16H13V12Z" fill="#4A5568"/>
                                    </svg>

                                </a>
                            </li>
                            <li class="list-inline-item list-social-item me-3">
                                <a href="#!" class="text-decoration-none">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.00333 5.88355L9.99995 9.88186L17.9967 5.8835C17.9363 4.83315 17.0655 4 16 4H4C2.93452 4 2.06363 4.83318 2.00333 5.88355Z" fill="#4A5568"/>
                                        <path d="M18 8.1179L9.99995 12.1179L2 8.11796V14C2 15.1046 2.89543 16 4 16H16C17.1046 16 18 15.1046 18 14V8.1179Z" fill="#4A5568"/>
                                    </svg>
                                </a>
                            </li>
                        </ul>

                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <h6 class="fw-bold text-uppercase text-gray-700">
                            Products
                        </h6>
                        <ul class="list-unstyled text-muted mb-6 mb-md-8 mb-lg-0">
                            <li class="mb-3">
                                <a href="#!" class="text-reset">
                                Page Builder
                                </a>
                            </li>
                            <li class="mb-3">
                                <a href="#!" class="text-reset">
                                UI Kit
                                </a>
                            </li>
                            <li class="mb-3">
                                <a href="#!" class="text-reset">
                                Styleguide
                                </a>
                            </li>
                            <li class="mb-3">
                                <a href="#!" class="text-reset">
                                Documentation
                                </a>
                            </li>
                            <li>
                                <a href="#!" class="text-reset">
                                Changelog
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
       </footer>
    </body>
</html>
