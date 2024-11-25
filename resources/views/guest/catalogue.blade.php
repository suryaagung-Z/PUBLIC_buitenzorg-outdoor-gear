@extends('guest.layout.app')

@section('title', 'Katalog')

@section('css')
<link href="{{ asset('assets/css/listing.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container margin_30">
    <div class="row">
        <aside class="col-lg-3" id="sidebar_fixed">
            <form id="form-filter">
                <div class="filter_col">
                    <div class="inner_bt"><a href="#" class="open_filters"><i class="ti-close"></i></a></div>
                    <div class="filter_type version_2">
                        <h4><a href="#filter_1" data-bs-toggle="collapse" class="opened">Kategori</a></h4>
                        <div class="collapse show" id="filter_1">
                            <ul>
                                <li>
                                    <a href="" id="reset_ctg" class="text-decoration-underline">
                                        <small>Atur Ulang</small>
                                    </a>
                                </li>
                                @foreach ($categories as $ctg)
                                <li>
                                    <label class="container_check">{{ $ctg->name }}
                                        <small>{{ $ctg->products_count }}</small>
                                        <input type="checkbox" name="filter_ctg" value="{{ $ctg->id }}">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- /filter_type -->
                    </div>
                    <!-- /filter_type -->
                    <div class="filter_type version_2">
                        <h4><a href="#filter_4" data-bs-toggle="collapse" class="closed">Harga</a></h4>
                        <div class="collapse" id="filter_4">
                            <ul>
                                <li>
                                    <a href="" id="reset_price" class="text-decoration-underline">
                                        <small>Atur Ulang</small>
                                    </a>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="filter_harga"
                                            id="filterHarga1" value="0|500000">
                                        <label class="form-check-label" for="filterHarga1">
                                            Rp0 — Rp500.000
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="filter_harga"
                                            id="filterHarga2" value="500000|1000000">
                                        <label class="form-check-label" for="filterHarga2">
                                            Rp500.000 — Rp1.000.000
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="filter_harga"
                                            id="filterHarga3" value="1000000|1500000">
                                        <label class="form-check-label" for="filterHarga3">
                                            Rp1.000.000 — Rp1.500.000
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="filter_harga"
                                            id="filterHarga4" value="1500000|2000000">
                                        <label class="form-check-label" for="filterHarga4">
                                            Rp1.500.000 — Rp2.000.000
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="filter_harga"
                                            id="filterHarga5" value="2000000|2500000">
                                        <label class="form-check-label" for="filterHarga5">
                                            Rp2.000.000 — Rp2.500.000
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="filter_harga"
                                            id="filterHarga6" value="2500000|3000000">
                                        <label class="form-check-label" for="filterHarga6">
                                            Rp2.500.000 — Rp3.000.000
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="filter_harga"
                                            id="filterHarga7" value="3000000|∞">
                                        <label class="form-check-label" for="filterHarga7">
                                            Rp3.000.000 — ∞
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /filter_type -->
                    <div class="buttons">
                        <button type="submit" class="btn_1">Filter</button>
                        <a href="{{ route('catalogue.index') }}" class="btn_1 gray">Atur Ulang</a>
                    </div>
                </div>
            </form>
        </aside>
        <!-- /col -->
        <div class="col-lg-9">
            <div class="top_banner">
                <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
                    <div class="container pl-lg-5">
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="{{ route('guest.home') }}">Beranda</a></li>
                                <li><a href="{{ route('catalogue.index') }}">Katalog</a></li>
                                <li>Semua</li>
                            </ul>
                        </div>
                        <h1>Semua Produk</h1>
                    </div>
                </div>
                <img src="{{ asset('assets/img/display/shop.jpg') }}" class="img-fluid" alt="">
            </div>
            <!-- /top_banner -->
            <div id="stick_here"></div>
            <div class="toolbox elemento_stick add_bottom_30">
                <div class="container">
                    <ul class="clearfix">
                        <li>
                            <div class="sort_select">
                                <select name="sort" id="sort">
                                    <option selected disabled>--Pilih Urutan--</option>
                                    <option value="date">Urutkan berdasarkan terbaru</option>
                                    <option value="price">Urutkan dari harga terendah</option>
                                    <option value="price-desc">Urutkan dari harga tertinggi</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <a href="#0"><i class="ti-view-grid"></i></a>
                            <a href="listing-row-1-sidebar-left.html"><i class="ti-view-list"></i></a>
                        </li>
                        <li>
                            <a href="#0" class="open_filters">
                                <i class="ti-filter"></i><span>Filter</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /toolbox -->
            <div class="row small-gutters" id="product-container">
                @include('guest.partials._products', ['products' => $products])
            </div>
            <!-- Tombol Load More -->
            @if (!$hasFilters)
            <div class="text-center mt-4">
                <button id="load-more" class="btn_1" data-page="2"
                    style="{{ $products->hasMorePages() ? '' : 'display: none;' }}">Muat Lebih Banyak...</button>
            </div>
            @endif
        </div>
        <!-- /col -->
    </div>
    <!-- /row -->
</div>
@endsection

@section('outside-main')
@include('guest.components.top_panel')
@endsection

@section('script')
<script src="{{ asset('assets/js/sticky_sidebar.min.js') }}"></script>
<script src="{{ asset('assets/js/specific_listing.js') }}"></script>
<script src="{{ asset('assets/js/add-cart.js') }}"></script>
<script>
    (function(){
        $(document).ready(function () {
            function getUrlParameter(name) {
                let urlParams = new URLSearchParams(window.location.search);
                return urlParams.get(name);
            }

            let ctgParam = getUrlParameter('ctg');
            let priceParam = getUrlParameter('price');
            let sortParam = getUrlParameter('sort');
            let srcParam = getUrlParameter('src');

            if (ctgParam) {
                let selectedCategories = ctgParam.split('|');
                selectedCategories.forEach(id => {
                    $(`input[name="filter_ctg"][value="${id}"]`).prop('checked', true);
                });
            }

            if (priceParam) {
                $(`input[name="filter_harga"][value="${priceParam}"]`).prop('checked', true);
            }

            if (sortParam) {
                $('select#sort').val(sortParam);
            }

            $('select#sort').on('change', function () {
                const currentURL = `{{ route('catalogue.index') }}`;
                let sortValue = $(this).val();

                let selectedCategories = [];
                let priceValue = '';

                $('input[name="filter_ctg"]:checked').each(function() {
                    selectedCategories.push($(this).val());
                });

                priceValue = $('input[name="filter_harga"]:checked').val();

                let ctgParam = selectedCategories.join('|');
                let newURL = currentURL;

                if (srcParam) {
                    newURL = currentURL;
                }

                if (ctgParam) {
                    newURL += `?ctg=${ctgParam}`;
                }
                if (priceValue) {
                    newURL += (newURL.includes('?') ? '&' : '?') + `price=${priceValue}`;
                }
                if (sortValue) {
                    newURL += (newURL.includes('?') ? '&' : '?') + `sort=${sortValue}`;
                }

                window.location.href = newURL;
            });

            $('#form-filter').on('submit', function (e) {
                e.preventDefault();

                const currentURL = `{{ route('catalogue.index') }}`;

                let formData = $(this).serializeArray();

                let selectedCategories = [];
                let priceParam = '';
                let sortParam = $('#sort').val();

                formData.forEach(param => {
                    if (param.name === 'filter_ctg') {
                        selectedCategories.push(param.value);
                    } else if (param.name === 'filter_harga') {
                        priceParam = param.value;
                    }
                });

                let ctgParam = selectedCategories.join('|');
                let newURL = currentURL;

                if (srcParam) {
                    newURL = currentURL;
                }

                if (ctgParam) {
                    newURL += `?ctg=${ctgParam}`;
                }
                if (priceParam) {
                    newURL += (newURL.includes('?') ? '&' : '?') + `price=${priceParam}`;
                }
                if (sortParam) {
                    newURL += (newURL.includes('?') ? '&' : '?') + `sort=${sortParam}`;
                }

                window.location.href = newURL;
            });

            $('a#reset_ctg').on('click', function(e){
                e.preventDefault();

                $(`input[name="filter_ctg"]`).prop('checked', false);
            });

            $('a#reset_price').on('click', function(e){
                e.preventDefault();

                $(`input[name="filter_harga"]`).prop('checked', false);
            });
        });
    })();
</script>
<script>
    $(document).ready(function () {
        $('#load-more').on('click', function () {
            let page = $(this).data('page');
            let url = "{{ route('catalogue.index') }}?page=" + page;

            $(this).prop('disabled', true).text('Loading...');

            $.ajax({
                url: url,
                type: 'GET',
                success: function (response) {
                    $('#product-container').append(response.html);

                    if (!response.hasMorePages) {
                        $('#load-more').hide();
                    } else {
                        $('#load-more').data('page', page + 1);
                    }
                },
                error: function () {
                    alert('Terjadi kesalahan. Silakan coba lagi.');
                },
                complete: function(){
                    $('#load-more').prop('disabled', false).text('Muat Lebih Banyak...');
                }
            });
        });
    });
</script>
@endsection