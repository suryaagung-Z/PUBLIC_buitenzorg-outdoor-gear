@extends('guest.layout.app')

@section('title', $product->name)

@section('css')
<link href="{{ asset('assets/css/product_page.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container margin_30">
    <div class="row">
        <div class="col-md-6">
            <div class="all">
                <div class="slider">
                    <div class="owl-carousel owl-theme prod_pics main magnific-gallery">
                        @foreach ($product->productPhotos as $photo)
                        <div class="item-box">
                            <a href="/storage/{{ $photo->path }}" title="" data-effect="mfp-zoom-in">
                                <img src="/storage/{{ $photo->path }}" alt="">
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <div class="left nonl"><i class="ti-angle-left"></i></div>
                    <div class="right"><i class="ti-angle-right"></i></div>
                </div>
                <div class="slider-two">
                    <div class="owl-carousel owl-theme thumbs">
                        @foreach ($product->productPhotos as $photo)
                        <div style="background-image: url(/storage/{{ $photo->path }});"
                            class="item {{ $loop->first ? 'active' : '' }}"></div>
                        @endforeach
                    </div>
                    <div class="left-t nonl-t"></div>
                    <div class="right-t"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="{{ route('guest.home') }}">Beranda</a></li>
                    <li><a href="{{ route('catalogue.index') }}">Katalog</a></li>
                    <li>{{ $product->id }}</li>
                </ul>
            </div>
            <!-- /page_header -->
            <div class="prod_info">
                <h1>
                    {{ $product->name }}
                </h1>
                <table class="fw-bold">
                    <tr>
                        <td><small>Stok</small></td>
                        <td><small>&nbsp;:&nbsp;</small></td>
                        <td><small>{{ $product->stock }}</small></td>
                    </tr>
                    <tr>
                        <td><small>SKU</small></td>
                        <td><small>&nbsp;:&nbsp;</small></td>
                        <td><small>{{ $product->sku }}</small></td>
                    </tr>
                </table>
                <span
                    style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp:1; line-clamp: 1; -webkit-box-orient: vertical;">
                    {{ $product->description }}
                </span>
                <br>
                <form class="form-to-cart">
                    <div class="prod_options">
                        <div class="row">
                            <label class="col-xl-5 col-lg-5 col-md-6 col-6"><strong>Kuantitas</strong></label>
                            <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                                <div class="numbers-row">
                                    <input type="text" value="1" id="quantity_1" class="qty2" name="quantity"
                                        data-min="1">
                                </div>
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <input type="hidden" name="name" value="{{ $product->name }}">
                                <input type="hidden" name="price" value="{{ $product->price }}">
                                <input type="hidden" name="path-img"
                                    value="/storage/{{ $product->productPhotos[0]->path }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <div class="price_main">
                                <span class="new_price">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="btn_open_top_panel">
                                <a href="javascript:void(0)" class="submit-cart btn_1">Tambah ke Keranjang</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /prod_info -->
        </div>
    </div>
    <!-- /row -->
</div>
<!-- /container -->

<div class="tabs_product">
    <div class="container">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a id="tab-A" href="#pane-A" class="nav-link active" data-bs-toggle="tab" role="tab">Deskripsi</a>
            </li>
            <li class="nav-item">
                <a id="tab-B" href="#pane-B" class="nav-link" data-bs-toggle="tab" role="tab">Ulasan</a>
            </li>
        </ul>
    </div>
</div>
<!-- /tabs_product -->
<div class="tab_content_wrapper pb-5">
    <div class="container">
        <div class="tab-content" role="tablist">
            <div id="pane-A" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-A">
                <div class="card-header" role="tab" id="heading-A">
                    <h5 class="mb-0">
                        <a class="collapsed" data-bs-toggle="collapse" href="#collapse-A" aria-expanded="false"
                            aria-controls="collapse-A">
                            Deskripsi
                        </a>
                    </h5>
                </div>
                <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
                    <div class="card-body">
                        <div class="row justify-content-between">
                            <div class="col-lg-6">
                                <h3>Detail</h3>
                                <p>{{ $product->description }}</p>
                            </div>
                            <div class="col-lg-5">
                                <h3>Spesifikasi</h3>
                                <div class="table-responsive">
                                    <table class="table table-sm table-striped">
                                        <tbody>
                                            <tr>
                                                <td><strong>Berat</strong></td>
                                                <td>{{ $product->weight }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /table-responsive -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /TAB A -->
            <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
                <div class="card-header" role="tab" id="heading-B">
                    <h5 class="mb-0">
                        <a class="collapsed" data-bs-toggle="collapse" href="#collapse-B" aria-expanded="false"
                            aria-controls="collapse-B">
                            Ulasan
                        </a>
                    </h5>
                </div>
                <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
                    <div class="card-body">
                        <p class="text-danger fst-italic">Ulasan Tidak Tersedia</p>
                        {{-- <div class="row justify-content-between">
                            <div class="col-lg-6">
                                <div class="review_content">
                                    <div class="clearfix add_bottom_10">
                                        <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i
                                                class="icon-star"></i><i class="icon-star"></i><i
                                                class="icon-star"></i><em>5.0/5.0</em></span>
                                        <em>Dipublikasikan 54 menit yang lalu</em>
                                    </div>
                                    <h4>"Sangat puas"</h4>
                                    <p>Eos tollit ancillae ea, lorem consulatu qui ne, eu eros eirmod scaevola sea. Et
                                        nec tantas
                                        accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum
                                        laudem cum ea,
                                        ius essent fuisset ut. Viderer petentium cu his.</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="review_content">
                                    <div class="clearfix add_bottom_10">
                                        <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i
                                                class="icon-star"></i><i class="icon-star empty"></i><i
                                                class="icon-star empty"></i><em>4.0/5.0</em></span>
                                        <em>Dipublikasikan 1 hari yang lalu</em>
                                    </div>
                                    <h4>"Selalu yang terbaik"</h4>
                                    <p>Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas
                                        has ut. Rebum
                                        laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.</p>
                                </div>
                            </div>
                        </div> --}}
                        <!-- /row -->
                        {{-- <p class="text-end"><a href="leave-review.html" class="btn_1">Tinggalkan ulasan</a></p> --}}
                    </div>
                    <!-- /card-body -->
                </div>
            </div>
            <!-- /tab B -->
        </div>
        <!-- /tab-content -->
    </div>
    <!-- /container -->
</div>
<!-- /tab_content_wrapper -->
@endsection

@section('outside-main')
@include('guest.components.top_panel')
@endsection

@section('script')
<script src="{{ asset('assets/js/carousel_with_thumbs.js') }}"></script>
<script src="{{ asset('assets/js/add-cart.js') }}"></script>
@endsection
