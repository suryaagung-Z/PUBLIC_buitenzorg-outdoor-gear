@extends('dashboard.layout.app')

@section('title', 'Home')

@section('vendor.css')
<link rel="stylesheet" href="{{ asset('dba/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
<link rel="stylesheet" href="{{ asset('dba/assets/vendor/libs/apex-charts/apex-charts.css') }}" />
@endsection

@section('page.css')
@endsection

@section('breadcrumb')
<small class="text-primary">Home</small>
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-8 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">
                                Selamat datang,
                                <small class="text-capitalize">{{ Auth::user()->name }}</small>! 🎉
                            </h5>
                            <p class="mb-4">
                                Anda memiliki <span class="fw-bold">{{ $categoryCount }}</span> kategori
                                dan <span class="fw-bold">{{ $productCount }}</span> produk.<br>
                                Mari periksa kategori dan produk Anda sekarang!
                            </p>

                            <a href="{{ route('category.index') }}" class="btn btn-sm btn-outline-primary">
                                Lihat Kategori
                            </a>
                            <a href="{{ route('product.index') }}" class="btn btn-sm btn-outline-primary">
                                Lihat Produk
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="{{ asset('dba/assets/img/illustrations/man-with-laptop-light.png') }}"
                                height="140" alt="View Badge User"
                                data-app-dark-img="{{ asset('dba/assets/img/illustrations/man-with-laptop-dark.png') }}"
                                data-app-light-img="{{ asset('dba/assets/img/illustrations/man-with-laptop-light.png') }}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

    </div>
</div>
@endsection

@section('vendor.script')
<script src="{{ asset('dba/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page.script')
<script src="{{ asset('dba/assets/js/dashboards-analytics.js') }}"></script>
@endsection