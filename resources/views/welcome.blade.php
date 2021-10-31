@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 mb-3">
                <div class="card-body">
                    <h2 class="text-center">Tentang Kami</h2>
                    <div class="text-secondary">
                        <p class="text-center">
                            PT. Prima Alkesindo didirikan pada tahun 1997, dan murni adalah perusahaan keluarga. Perusahaan kami berhubungan dengan produk produk kesehatan untuk rumah sakit dan laboratorium. Saat ini kami adalah sebagai Exclusive Distributor dari dua puluhan merk di dunia yang fokus pada produk produk di bidang Penyimpanan darah, Produk Disinfektant, Produk Disposable serta peralatan rumah sakit dan laboratorium.
                        </p>
                        <p class="text-center">
                            visi kami adalah menyediakan layanan yang terbaik bagi para pelanggan agar menjadi perusahaan yang dihormati dalam industri kesehatan oleh sebab itu pemahaman mendalam dan pengetahuan ahli akan produk produk kami adalah keunggulan kompetitif utama kami. Kami menjaga hubungan profesional yang erat dengan para pelanggan dan dengan para dewan pegawai di Kementerian Kesehatan untuk menjamin kepuasan para pelanggan kami terhadap produk produk kami dan untuk memastikan bahwa kami selalu update dengan peraturan peraturan terkait di Kemterian Kesehatan
                        </p>
                    </div>
                </div>
            </div>
            <div class="card border-0 mb-3">
                <div class="card-body">
                    <h2 class="text-center mb-3">Produk</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card border-0">
                                <div class="card-body shadow">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <div class="row">
                                                    @foreach($categorys as $category)
                                                    <div class="col-md-4 pt-3 mb-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                            <label class="form-check-label" for="inlineCheckbox1">{{$category->name}}</label>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-0 ">
                                <div class="card-body">
                                    <h3 class="fw-bold">Informasi</h3>
                                    <p class="text-secondary">
                                        Kami menyediakan berbagai macam produk dengan beberapa macam yang telah kami sediakan untuk keperluan anda.
                                        silahkan anda pilih kategori disamping untuk mencari produk yang anda butuhkan
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-0 mb-3">
                <div class="card-body">
                    <div class="slider mx-auto">
                        <div class="slides">
                            <div id="slide-1">
                            1
                            </div>
                            <div id="slide-2">
                            2
                            </div>
                            <div id="slide-3">
                            3
                            </div>
                            <div id="slide-4">
                            4
                            </div>
                            <div id="slide-5">
                            5
                            </div>
                        </div>
                        <a href="#slide-1">1</a>
                        <a href="#slide-2">2</a>
                        <a href="#slide-3">3</a>
                        <a href="#slide-4">4</a>
                        <a href="#slide-5">5</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection