@extends('guest.layout.app')

@section('title', 'Home')

@section('css')
<link href="{{ asset('assets/css/home_1.css') }}" rel="stylesheet">
<style>
    .img-guide {
        width: 100%;
        border-radius: 4rem 0 4rem 0;
        overflow: hidden;
    }

    .img-guide::after {
        content: "";
        display: block;
        position: absolute;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        transition: 0.3s;
    }

    .img-guide:hover::after {
        background-color: rgba(0, 0, 0, 0.2);
    }

    .img-guide:hover>img {
        transform: scale(1.1);
    }

    .img-guide img {
        width: 100%;
        height: 100%;
        transition: 0.3s;
    }

    .img-guide a.btn {
        z-index: 1;
    }

    .list-guide {
        list-style-type: none;
    }

    .list-guide li {
        display: flex;
        align-items: center;
        gap: 0.3rem;
    }

    .list-guide li i {
        font-size: 1.5rem;
        color: #198754;
    }
</style>
@endsection

@section('content')
<div id="carousel-home">
    <div class="owl-carousel owl-theme">
        <div class="owl-slide cover"
            style="background-image: url('{{ asset('assets/img/display/outdoor-gear-2.jpg') }}');">
            <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                <div class="container">
                    <div class="row justify-content-center justify-content-md-end">
                        <div class="col-lg-6 static">
                            <div class="slide-text text-end white">
                                <h2 class="owl-slide-animated owl-slide-title">Perlengkapan<br>Camping & Hiking</h2>
                                <p class="owl-slide-animated owl-slide-subtitle">
                                    Sewa alat outdoor terbaik untuk petualangan Anda
                                </p>
                                <div class="owl-slide-animated owl-slide-cta">
                                    <a class="btn_1" href="{{ route('catalogue.index') }}" role="button">Lihat
                                        Peralatan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-slide cover"
            style="background-image: url('{{ asset('assets/img/display/outdoor-gear-3.jpg') }}');">
            <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                <div class="container">
                    <div class="row justify-content-center justify-content-md-start">
                        <div class="col-lg-6 static">
                            <div class="slide-text white">
                                <h2 class="owl-slide-animated owl-slide-title">Jasa Guide Profesional</h2>
                                <p class="owl-slide-animated owl-slide-subtitle">
                                    Panduan berpengalaman untuk mendampingi Anda dalam petualangan
                                </p>
                                <div class="owl-slide-animated owl-slide-cta">
                                    <a class="btn_1" href="{{ route('guest.contact') }}" role="button">
                                        Pesan Guide
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-slide cover"
            style="background-image: url('{{ asset('assets/img/display/outdoor-gear-2.jpg') }}');">
            <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(255, 255, 255, 0.5)">
                <div class="container">
                    <div class="row justify-content-center justify-content-md-start">
                        <div class="col-lg-12 static">
                            <div class="slide-text text-center black">
                                <h2 class="owl-slide-animated owl-slide-title">Peralatan<br>Outdoor Berkualitas</h2>
                                <p class="owl-slide-animated owl-slide-subtitle">
                                    Lengkap, nyaman, dan siap menemani petualangan Anda
                                </p>
                                <div class="owl-slide-animated owl-slide-cta">
                                    <a class="btn_1" href="{{ route('catalogue.index') }}" role="button">
                                        Lihat Koleksi
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/owl-slide-->
    </div>
    <div id="icon_drag_mobile"></div>
</div>
<!--/carousel-->

<ul id="banners_grid" class="clearfix">
    <li>
        <a href="{{ route('catalogue.index', ['ctg' => $categories['Carrier/Backpack'] ?? 0]) }}" class="img_container">
            <img src="{{ asset('assets/img/banners_cat_placeholder.jpg') }}"
                data-src="{{ asset('assets/img/display/carrier.jpg') }}" alt="" class="lazy">
            <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                <h3>Carrier/Backpack</h3>
                <div><span class="btn_1">Lihat Sekarang</span></div>
            </div>
        </a>
    </li>
    <li>
        <a href="{{ route('catalogue.index', ['ctg' => $categories['Alat Tenda'] ?? 0]) }}" class="img_container">
            <img src="{{ asset('assets/img/banners_cat_placeholder.jpg') }}"
                data-src="{{ asset('assets/img/display/tent.jpg') }}" alt="" class="lazy">
            <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                <h3>Alat Tenda</h3>
                <div><span class="btn_1">Lihat Sekarang</span></div>
            </div>
        </a>
    </li>
    <li>
        <a href="{{ route('catalogue.index', ['ctg' => $categories['Sepatu'] ?? 0]) }}" class="img_container">
            <img src="{{ asset('assets/img/banners_cat_placeholder.jpg') }}"
                data-src="{{ asset('assets/img/display/shoes.jpg') }}" alt="" class="lazy">
            <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                <h3>Sepatu</h3>
                <div><span class="btn_1">Lihat Sekarang</span></div>
            </div>
        </a>
    </li>
</ul>
<!--/banners_grid -->

<div class="container margin_60_35">
    <div class="main_title">
        <h2>Produk Terbaru</h2>
        <span>Latest Product</span>
        <p>Dapatkan perlengkapan outdoor terbaru untuk petualangan Anda</p>
    </div>
    <div class="row small-gutters">
        @foreach ($latestProduct as $product)
        <div class="col-6 col-md-4 col-xl-3">
            <div class="grid_item">
                <span class="ribbon new">New</span>
                <figure>
                    <a href="{{ route('catalogue.show', $product->id) }}">
                        @if ($product->productPhotos->isNotEmpty())
                        <img class="img-fluid lazy" src="/storage/{{ $product->productPhotos[0]->path }}"
                            data-src="/storage/{{ $product->productPhotos[0]->path }}" alt="{{ $product->name }}">
                        @else
                        <img class="img-fluid lazy"
                            src="{{ asset('assets/img/products/product_placeholder_square_medium.jpg') }}"
                            data-src="{{ asset('assets/img/products/product_placeholder_square_medium.jpg') }}"
                            alt="Default Image">
                        @endif
                    </a>
                </figure>
                <a href="{{ route('catalogue.show', $product->id) }}">
                    <h3
                        style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp:1; line-clamp: 1; -webkit-box-orient: vertical;">
                        {{ $product->name }}
                    </h3>
                </a>
                <div class="price_box">
                    <span class="new_price">
                        Rp{{ number_format($product->price, 0, ',', '.') }}
                    </span>
                </div>
                <ul>
                    <li>
                        <a href="{{ route('catalogue.show', $product->id) }}" class="tooltip-1" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="Lihat Detail">
                            <i class="ti-eye"></i><span>Lihat Detail</span>
                        </a>
                    </li>
                    <li>
                        <form class="form-to-cart">
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="hidden" name="quantity" value="1">
                            <input type="hidden" name="name" value="{{ $product->name }}">
                            <input type="hidden" name="price" value="{{ $product->price }}">
                            <input type="hidden" name="path-img"
                                value="/storage/{{ $product->productPhotos[0]->path }}">
                            <a href="javascript:void(0)" class="submit-cart tooltip-1 btn_open_top_panel"
                                data-bs-toggle="tooltip" data-bs-placement="left" title="Tambah ke keranjang">
                                <i class="ti-shopping-cart"></i><span>Tambah ke keranjang</span>
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
            <!-- /grid_item -->
        </div>
        @endforeach
    </div>
    <!-- /row -->
</div>
<!-- /container -->

<div class="featured lazy" data-bg="url('{{ asset('assets/img/display/outdoor-gear-1.jpg') }}')">
    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
        <div class="container margin_60">
            <div class="row justify-content-center justify-content-md-start">
                <div class="col-lg-6 wow" data-wow-offset="150">
                    <h3>Menjual Alat Outdoor</h3>
                    <p>Selain sewa, kami juga menjual berbagai peralatan camping dan hiking.</p>
                    <div class="feat_text_block">
                        <div class="price_box">
                            <span class="new_price">Harga Mulai dari Rp10.000</span>
                            {{-- <span class="old_price">Rp100.000</span> --}}
                        </div>
                        <a class="btn_1" href="https://maps.app.goo.gl/oZmi4X52ujL4hyZX7" role="button"
                            target="_blank">Kunjungi Toko</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /featured -->

<div class="container margin_60_35">
    <div class="main_title">
        <h2>Jasa Guide Profesional</h2>
        <span>Professional Guide</span>
        <p>Jelajahi alam dengan aman dan nyaman bersama guide berpengalaman kami</p>
    </div>
    <div class="row gap-row-3">
        <div class="col-md-7">
            <div class="img-guide position-relative d-flex justify-content-center align-items-center">
                <img src="{{ asset('assets/img/display/guide.jpg') }}" alt="guide" class="d-block">
                <a class="btn btn_1 position-absolute" href="{{ route('guest.contact') }}">Pesan Sekarang</a>
            </div>
        </div>
        <div class="col-md-5">
            <ul class="list-guide p-0">
                <li>
                    <i class='bx bx-check'></i>
                    <span>Panduan jalur pendakian dan pengenalan area sekitar</span>
                </li>
                <li>
                    <i class='bx bx-check'></i>
                    <span>Termasuk: tenda, alat memasak, dan supply makanan</span>
                </li>
                <li>
                    <i class='bx bx-check'></i>
                    <span>Informasi tentang keamanan, cuaca, dan kondisi medan terkini</span>
                </li>
                <li>
                    <i class='bx bx-check'></i>
                    <span>Pendampingan dalam menjaga kelestarian alam dan kebersihan</span>
                </li>
                <li>
                    <i class='bx bx-check'></i>
                    <span>Pertolongan pertama untuk situasi darurat selama perjalanan</span>
                </li>
                <li>
                    <i class='bx bx-check'></i>
                    <span>Bimbingan dalam teknik navigasi dan survival dasar</span>
                </li>
                <li>
                    <i class='bx bx-check'></i>
                    <span>Rute alternatif sesuai kemampuan dan kondisi peserta</span>
                </li>
                <li>
                    <i class='bx bx-check'></i>
                    <span>Transportasi menuju lokasi awal pendakian</span>
                </li>
                <li>
                    <i class='bx bx-check'></i>
                    <span>Foto dokumentasi perjalanan</span>
                </li>
                <li>
                    <i class='bx bx-check'></i>
                    <span>Rekomendasi spot-spot terbaik untuk berfoto di jalur pendakian</span>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection

@section('outside-main')
@include('guest.components.top_panel')
@endsection

@section('script')
<script src="{{ asset('assets/js/carousel-home.min.js') }}"></script>
<script src="{{ asset('assets/js/add-cart.js') }}"></script>
@endsection
