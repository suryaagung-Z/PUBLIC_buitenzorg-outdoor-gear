<header class="version_1">
    <div class="layer"></div><!-- Overlay menu untuk perangkat seluler -->
    <div class="main_header">
        <div class="container">
            <div class="row small-gutters">
                <div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
                    <div id="logo">
                        <a href="{{ route('guest.home') }}">
                            <img src="{{ asset('assets/img/logo/logo.png') }}" alt="" height="35">
                        </a>
                    </div>
                </div>
                <nav class="col-xl-6 col-lg-7">
                    <a class="open_close" href="javascript:void(0);">
                        <div class="hamburger hamburger--spin">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                    </a>
                    <!-- Tombol menu untuk perangkat seluler -->
                    <div class="main-menu">
                        <div id="header_menu">
                            <a href="{{ route('guest.home') }}">
                                <img src="{{ asset('assets/img/logo/logo.png') }}" alt="" height="35">
                            </a>
                            <a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
                        </div>
                        <ul>
                            <li>
                                <a href="{{ route('guest.home') }}">Beranda</a>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);" class="show-submenu">Katalog</a>
                                <ul class="text-capitalize">
                                    <li><b>Kategori:</b></li>
                                    @foreach ($categories as $ctg)
                                    <li>
                                        <a href="{{ route('catalogue.index', ['ctg' => $ctg->id]) }}">
                                            {{ $ctg->name }}
                                        </a>
                                    </li>
                                    @endforeach
                                    <li><a href="{{ route('catalogue.index') }}">Semua</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('guest.about') }}">Tentang Kami</a>
                            </li>
                            <li>
                                <a href="{{ route('guest.contact') }}">Hubungi Kami</a>
                            </li>
                        </ul>
                    </div>
                    <!--/main-menu -->
                </nav>
                <div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-end">
                    <a class="phone_top" href="https://wa.me/62895362038774">
                        <strong>
                            <span>Butuh Bantuan?</span>
                            +62 8953 6203 8774
                        </strong>
                    </a>
                </div>
            </div>
            <!-- /row -->
        </div>
    </div>
    <!-- /main_header -->

    <div class="main_nav Sticky">
        <div class="container">
            <div class="row small-gutters">
                <div class="col-xl-3 col-lg-3 col-md-3">
                    <nav class="categories">
                        <ul class="clearfix">
                            <li><span>
                                    <a href="#">
                                        <span class="hamburger hamburger--spin">
                                            <span class="hamburger-box">
                                                <span class="hamburger-inner"></span>
                                            </span>
                                        </span>
                                        Kategori
                                    </a>
                                </span>
                                <div id="menu">
                                    <ul class="text-capitalize">
                                        @foreach ($categories as $ctg)
                                        <li>
                                            <span>
                                                <a href="{{ route('catalogue.index', ['ctg' => $ctg->id]) }}"
                                                    class="d-block">
                                                    {{ $ctg->name }}
                                                </a>
                                            </span>
                                        </li>
                                        @endforeach
                                        <li>
                                            <span><a href="{{ route('catalogue.index') }}"
                                                    class="d-block">Semua</a></span>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
                    <div class="custom-search-input">
                        <input type="text" placeholder="Cari di lebih dari 100 produk">
                        <button type="submit"><i class="header-icon_search_custom"></i></button>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-2 col-md-3">
                    <ul class="top_tools">
                        <li>
                            <a href="{{ route('guest.cart') }}" class="cart_bt">
                                <strong id="count_cart"></strong>
                            </a>
                        </li>
                        <li class="d-block d-md-none">
                            <a href="javascript:void(0);" class="btn_search_mob"><span>Cari</span></a>
                        </li>
                        <li class="d-block d-md-none">
                            <a href="#menu" class="btn_cat_mob">
                                <div class="hamburger hamburger--spin" id="hamburger">
                                    <div class="hamburger-box">
                                        <div class="hamburger-inner"></div>
                                    </div>
                                </div>
                                Kategori
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <div class="search_mob_wp">
            <input type="text" class="form-control" placeholder="Cari di lebih dari 10.000 produk">
            <input type="submit" class="btn_1 full-width" value="Cari">
        </div>
        <!-- /search_mobile -->
    </div>
    <!-- /main_nav -->
</header>