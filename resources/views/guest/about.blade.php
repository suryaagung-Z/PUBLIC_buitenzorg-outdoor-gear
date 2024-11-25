@extends('guest.layout.app')

@section('title', 'Tentang Kami')

@section('css')
<link href="{{ asset('assets/css/about.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="top_banner general">
    <div class="opacity-mask d-flex align-items-md-center" data-opacity-mask="rgba(0, 0, 0, 0.1)">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-8 col-md-6 text-end">
                    <h1 class="text-white">Menjadi Sahabat Anda di Alam Terbuka</h1>
                </div>
            </div>
        </div>
    </div>
    <img src="{{ asset('assets/img/display/about.jpg') }}" class="img-fluid" alt="">
</div>
<!--/top_banner-->

<div class="bg_white">
    <div class="container margin_90_0">
        <div class="row justify-content-between align-items-center flex-lg-row-reverse content_general_row">
            <div class="col-lg-5 text-center">
                <figure>
                    <img src="{{ asset('assets/img/banners_cat_placeholder.jpg') }}"
                        data-src="{{ asset('assets/img/logo/logo.png') }}" alt="" class="img-fluid lazy" width="350"
                        height="268">
                </figure>
            </div>
            <div class="col-lg-6">
                <h2>Tentang Kami</h2>
                <p class="lead">Kami adalah penyedia layanan penyewaan alat outdoor terkemuka yang berdedikasi untuk
                    memenuhi kebutuhan petualangan Anda.</p>
                <p>Kami percaya bahwa setiap orang berhak untuk menikmati keindahan alam. Oleh karena itu, kami
                    menyediakan berbagai macam peralatan outdoor berkualitas tinggi, mulai dari tenda, peralatan hiking,
                    hingga perlengkapan camping. Dengan pengalaman bertahun-tahun di industri ini, kami siap membantu
                    Anda menemukan peralatan yang tepat untuk setiap petualangan.</p>
            </div>
        </div>
        <!--/row-->
        <div class="row justify-content-between align-items-center content_general_row">
            <div class="col-lg-5 text-start">
                <figure>
                    <img src="{{ asset('assets/img/banners_cat_placeholder.jpg') }}"
                        data-src="{{ asset('assets/img/display/visimisi.jpg') }}" alt="" class="img-fluid lazy"
                        width="350" height="268">
                </figure>
            </div>
            <div class="col-lg-6">
                <h2>Visi dan Misi Kami</h2>
                <p class="lead">Menjadi pilihan utama bagi para pencinta alam dalam penyewaan alat outdoor.</p>
                <p>Visi kami adalah untuk menginspirasi orang-orang agar lebih dekat dengan alam dan menikmati
                    pengalaman outdoor yang tak terlupakan. Misi kami adalah menyediakan peralatan terbaik dengan harga
                    terjangkau dan layanan pelanggan yang luar biasa, sehingga setiap orang dapat mengeksplorasi
                    keindahan alam dengan nyaman dan aman.</p>
            </div>
        </div>
        <!--/row-->
        <div class="row justify-content-between align-items-center flex-lg-row-reverse content_general_row">
            <div class="col-lg-5 text-center">
                <figure>
                    <img src="{{ asset('assets/img/banners_cat_placeholder') }}"
                        data-src="{{ asset('assets/img/display/superiority.jpg') }}" alt="" class="img-fluid lazy"
                        width="350" height="316">
                </figure>
            </div>
            <div class="col-lg-6">
                <h2>Keunggulan Kami</h2>
                <p class="lead">Mengapa memilih kami?</p>
                <p>Kami menawarkan berbagai keunggulan untuk memastikan pengalaman penyewaan alat outdoor yang
                    memuaskan:</p>
                <ul class="list_ok">
                    <li>Peralatan berkualitas tinggi yang selalu terawat</li>
                    <li>Harga sewa yang kompetitif dan transparan</li>
                    <li>Tim ahli yang siap memberikan saran dan bantuan</li>
                </ul>
            </div>
        </div>
        <!--/row-->
    </div>
    <!--/container-->

</div>
<!--/bg_white-->
<div id="carousel-home">
    <div class="owl-carousel owl-theme">
        <div class="owl-slide cover" style="background-image: url({{ asset('assets/img/display/about_2_1.jpg') }});">
            <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                <div class="container">
                    <div class="row justify-content-center justify-content-md-start">
                        <div class="col-lg-6 static">
                            <div class="slide-text white">
                                <h2 class="owl-slide-animated owl-slide-title">"Pengalaman Menyenangkan!"</h2>
                                <p class="owl-slide-animated owl-slide-subtitle">
                                    <em>Peralatan outdoor yang disewa berkualitas tinggi, sangat membantu dalam
                                        petualangan saya. Pasti akan kembali!</em>
                                </p>
                                <div class="owl-slide-animated owl-slide-cta"><small>Rudi - Mahasiswa</small></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/owl-slide-->
        <div class="owl-slide cover" style="background-image: url({{ asset('assets/img/display/about_2_3.jpg') }});">
            <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                <div class="container">
                    <div class="row justify-content-center justify-content-md-start">
                        <div class="col-lg-6 static">
                            <div class="slide-text white">
                                <h2 class="owl-slide-animated owl-slide-title">"Dukungan Luar Biasa"</h2>
                                <p class="owl-slide-animated owl-slide-subtitle">
                                    <em>Tim sangat responsif dan membantu saya memilih peralatan yang tepat untuk
                                        hiking. Layanan terbaik!</em>
                                </p>
                                <div class="owl-slide-animated owl-slide-cta"><small>Anna - Petualang</small></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/owl-slide-->
        <div class="owl-slide cover" style="background-image: url({{ asset('assets/img/display/about_2_2.jpg') }});">
            <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(255, 255, 255, 0.5)">
                <div class="container">
                    <div class="row justify-content-center justify-content-md-start">
                        <div class="col-lg-12 static">
                            <div class="slide-text text-center black">
                                <h2 class="owl-slide-animated owl-slide-title">"Sangat Puas dengan Layanan"</h2>
                                <p class="owl-slide-animated owl-slide-subtitle">
                                    <em>Pengalaman penyewaan alat outdoor yang memuaskan, peralatan selalu dalam kondisi
                                        prima!</em>
                                </p>
                                <div class="owl-slide-animated owl-slide-cta"><small>Andi - Wisatawan</small></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/owl-slide-->
        </div>
    </div>
    <div id="icon_drag_mobile"></div>
</div>
<!--/carousel-->
@endsection

@section('script')
<script src="{{ asset('assets/js/carousel-home.min.js') }}"></script>
@endsection
