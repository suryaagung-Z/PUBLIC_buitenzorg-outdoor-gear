<footer class="revealed">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-6">
                <h3 data-bs-target="#collapse_1">Tautan Cepat</h3>
                <div class="collapse dont-collapse-sm links" id="collapse_1">
                    <ul>
                        <li><a href="{{ route('guest.home') }}">Beranda</a></li>
                        <li><a href="{{ route('guest.about') }}">Tentang Kami</a></li>
                        <li><a href="{{ route('catalogue.index') }}">Katalog</a></li>
                        <li><a href="{{ route('guest.contact') }}">Hubungi Kami</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <h3 data-bs-target="#collapse_2">Kategori</h3>
                <div class="collapse dont-collapse-sm links" id="collapse_2">
                    <ul class="text-capitalize">
                        @foreach ($categories as $ctg)
                        <li>
                            <span>
                                <a href="{{ route('catalogue.index', ['ctg' => $ctg->id]) }}">
                                    {{ $ctg->name }}
                                </a>
                            </span>
                        </li>
                        @endforeach
                        <li>
                            <span>
                                <a href="{{ route('catalogue.index') }}">
                                    Semua
                                </a>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <h3 data-bs-target="#collapse_3">Kontak</h3>
                <div class="collapse dont-collapse-sm contacts" id="collapse_3">
                    <ul>
                        <li>
                            <i class="ti-home"></i>
                            <a href="https://maps.app.goo.gl/oZmi4X52ujL4hyZX7" target="_blank">
                                16152 Jl. R. H. Moh.Tohir<br>Kota Bogor - Indonesia
                            </a>
                        </li>
                        <li>
                            <i class="ti-headphone-alt"></i>
                            <a href="https://wa.me/62895362038774" target="_blank">+62 8953-6203-8774</a>
                        </li>
                        <li>
                            <i class="ti-email"></i>
                            <a href="https://mail.google.com/mail/?view=cm&fs=1&to=randyandikanoor9741@gmail.com&su=SUBJECT&body=BODY"
                                target="_blank">randyandikanoor9741@gmail.com</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <h3 data-bs-target="#collapse_4">Tetap Terhubung</h3>
                <div class="collapse dont-collapse-sm" id="collapse_4">
                    <div id="newsletter">
                        <div class="form-group">
                            <input type="email" name="email_newsletter" id="email_newsletter" class="form-control"
                                placeholder="Email Anda">
                            <button type="submit" id="submit-newsletter" disabled>
                                <i class="ti-angle-double-right"></i>
                            </button>
                        </div>
                    </div>
                    <div class="follow_us">
                        <h5>Ikuti Kami</h5>
                        <ul>
                            <li>
                                <a href="https://www.facebook.com/buitenzorgoutdoor" target="_blank">
                                    <i class="bi bi-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/buitenzorg_outdoor_official" target="_blank">
                                    <i class="bi bi-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://wa.me/62895362038774" target="_blank">
                                    <i class="bi bi-whatsapp"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row-->
        <hr>
        <div class="row add_bottom_25">
            <div class="col-lg-6">
                <ul class="footer-selector clearfix d-flex align-items-center">
                    {{-- <li>
                        <div class="styled-select lang-selector">
                            <select>
                                <option value="indonesia" selected>Indonesia</option>
                                <option value="inggris">Inggris</option>
                                <option value="arab">Arab</option>
                                <option value="mandarin">Mandarin</option>
                            </select>
                        </div>
                    </li> --}}
                    <li style="display: flex !important;" class="align-items-center flex-wrap gap-2 p-0">
                        <div style="background-color: #f8f8f8; padding: 1px 4px; border-radius: 4px;">
                            <img src="{{ asset('assets/img/bank/bca.svg') }}" alt="bca" width="40px">
                        </div>
                        <div style="background-color: #f8f8f8; padding: 1px 4px; border-radius: 4px;">
                            <img src="{{ asset('assets/img/bank/mandiri.svg') }}" alt="bank mandiri" width="40px">
                        </div>
                        <div style="background-color: #f8f8f8; padding: 1px 4px; border-radius: 4px;">
                            <img src="{{ asset('assets/img/bank/bri.svg') }}" alt="bri" width="40px">
                        </div>
                        <div style="background-color: #f8f8f8; padding: 1px 4px; border-radius: 4px;">
                            <img src="{{ asset('assets/img/bank/jago.svg') }}" alt="bank jago" width="40px">
                        </div>
                        <div style="background-color: #f8f8f8; padding: 1px 4px; border-radius: 4px;">
                            <img src="{{ asset('assets/img/bank/bsi.svg') }}" alt="bsi" width="40px">
                        </div>
                        <div style="background-color: #f8f8f8; padding: 1px 4px; border-radius: 4px;">
                            <img src="{{ asset('assets/img/bank/seabank.svg') }}" alt="seabank" width="40px">
                        </div>
                        <div style="background-color: #f8f8f8; padding: 1px 4px; border-radius: 4px;">
                            <img src="{{ asset('assets/img/bank/bank_dki.svg') }}" alt="bank dki" width="40px">
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6">
                <ul class="additional_links">
                    <li><a href="javascript:void(0)">Syarat dan Ketentuan</a></li>
                    <li><a href="javascript:void(0)">Privasi</a></li>
                    <li><span>© 2024 Buitenzorg Outdoor</span></li>
                </ul>
            </div>
        </div>
    </div>
</footer>