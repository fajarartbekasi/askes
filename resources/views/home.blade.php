@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @role('user')
            <div class="col-md-12">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <h5>Hello, {{Auth::user()->name}}</h5>
                        <p>Saat ini total transaksi kamu adalah</p>
                        <div class="d-flex">
                            <h5 class="mr-3 text-info">{{$sales}}</h5>
                            <p>Yu tambah lagi transaksi mu sekarang</p>
                        </div>
                    </div>
                </div>
            </div>
        @endrole
        @role('admin')
            <div class="col-md-4">
                <div class="card-pill shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="fw-bold">Categori</h5>
                                <h6 class="text-secondary">{{$categorys}}</h6>
                            </div>
                            <div>
                                <svg width="40" height="40" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 3C3.89543 3 3 3.89543 3 5V7C3 8.10457 3.89543 9 5 9H7C8.10457 9 9 8.10457 9 7V5C9 3.89543 8.10457 3 7 3H5Z" fill="#374151"/>
                                    <path d="M5 11C3.89543 11 3 11.8954 3 13V15C3 16.1046 3.89543 17 5 17H7C8.10457 17 9 16.1046 9 15V13C9 11.8954 8.10457 11 7 11H5Z" fill="#374151"/>
                                    <path d="M11 5C11 3.89543 11.8954 3 13 3H15C16.1046 3 17 3.89543 17 5V7C17 8.10457 16.1046 9 15 9H13C11.8954 9 11 8.10457 11 7V5Z" fill="#374151"/>
                                    <path d="M11 13C11 11.8954 11.8954 11 13 11H15C16.1046 11 17 11.8954 17 13V15C17 16.1046 16.1046 17 15 17H13C11.8954 17 11 16.1046 11 15V13Z" fill="#374151"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-pill shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="fw-bold">Produk</h5>
                                <h6 class="text-secondary">{{$producks}}</h6>
                            </div>
                            <div>
                                <svg width="40" height="40" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 17C11 17.3466 11.1795 17.6684 11.4743 17.8507C11.7691 18.0329 12.1372 18.0494 12.4472 17.8944L16.4472 15.8944C16.786 15.725 17 15.3788 17 15V9.23607C17 8.88949 16.8205 8.56762 16.5257 8.38542C16.2309 8.20321 15.8628 8.18665 15.5528 8.34164L11.5528 10.3416C11.214 10.511 11 10.8573 11 11.2361V17Z" fill="#374151"/>
                                    <path d="M15.2111 6.27639C15.5499 6.107 15.7639 5.76074 15.7639 5.38197C15.7639 5.00319 15.5499 4.65693 15.2111 4.48754L10.4472 2.10557C10.1657 1.96481 9.83431 1.96481 9.55279 2.10557L4.78885 4.48754C4.45007 4.65693 4.23607 5.00319 4.23607 5.38197C4.23607 5.76074 4.45007 6.107 4.78885 6.27639L9.55279 8.65836C9.83431 8.79912 10.1657 8.79912 10.4472 8.65836L15.2111 6.27639Z" fill="#374151"/>
                                    <path d="M4.44721 8.34164C4.13723 8.18665 3.76909 8.20321 3.47427 8.38542C3.17945 8.56762 3 8.88949 3 9.23607V15C3 15.3788 3.214 15.725 3.55279 15.8944L7.55279 17.8944C7.86277 18.0494 8.23091 18.0329 8.52573 17.8507C8.82055 17.6684 9 17.3466 9 17V11.2361C9 10.8573 8.786 10.511 8.44721 10.3416L4.44721 8.34164Z" fill="#374151"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-pill shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="fw-bold">Daftar transaksi</h5>
                                <h6 class="text-secondary">{{$transactions}}</h6>
                            </div>
                            <div>
                                <svg width="40" height="40" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 2C8.44772 2 8 2.44772 8 3C8 3.55228 8.44772 4 9 4H11C11.5523 4 12 3.55228 12 3C12 2.44772 11.5523 2 11 2H9Z" fill="#4A5568"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4 5C4 3.89543 4.89543 3 6 3C6 4.65685 7.34315 6 9 6H11C12.6569 6 14 4.65685 14 3C15.1046 3 16 3.89543 16 5V16C16 17.1046 15.1046 18 14 18H6C4.89543 18 4 17.1046 4 16V5ZM7 9C6.44772 9 6 9.44772 6 10C6 10.5523 6.44772 11 7 11H7.01C7.56228 11 8.01 10.5523 8.01 10C8.01 9.44772 7.56228 9 7.01 9H7ZM10 9C9.44772 9 9 9.44772 9 10C9 10.5523 9.44772 11 10 11H13C13.5523 11 14 10.5523 14 10C14 9.44772 13.5523 9 13 9H10ZM7 13C6.44772 13 6 13.4477 6 14C6 14.5523 6.44772 15 7 15H7.01C7.56228 15 8.01 14.5523 8.01 14C8.01 13.4477 7.56228 13 7.01 13H7ZM10 13C9.44772 13 9 13.4477 9 14C9 14.5523 9.44772 15 10 15H13C13.5523 15 14 14.5523 14 14C14 13.4477 13.5523 13 13 13H10Z" fill="#4A5568"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endrole
    </div>
</div>
@endsection
