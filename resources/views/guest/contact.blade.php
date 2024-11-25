@extends('guest.layout.app')

@section('title', 'Kontak')

@section('css')
<link href="{{ asset('assets/css/contact.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container margin_60">
    <div class="main_title">
        <h2>Kontak Kami</h2>
        <p>Hubungi kami untuk informasi lebih lanjut atau bantuan. Kami siap membantu Anda.</p>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="box_contacts">
                <i class="ti-support"></i>
                <h2>Pusat Bantuan</h2>
                <a href="https://wa.me/62895362038774" target="_blank"
                    class="text-primary text-decoration-underline">+62
                    8953-6203-8774</a>
                <br>
                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=randyandikanoor9741@gmail.com&su=SUBJECT&body=BODY"
                    class="text-primary text-decoration-underline" target="_blank">randyandikanoor9741@gmail.com</a>
                <small>Senin - Minggu 10 pagi - 10 malam</small>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="box_contacts">
                <i class="ti-map-alt"></i>
                <h2>Lokasi Toko</h2>
                <div>
                    <a href="https://maps.app.goo.gl/oZmi4X52ujL4hyZX7" target="_blank"
                        class="text-primary text-decoration-underline">16152 Jl. R. H. Moh.Tohir, Kota
                        Bogor - Indonesia</a>
                </div>
                <small>Senin - Minggu 10 pagi - 10 malam</small>
            </div>
        </div>
    </div>
    <!-- /row -->
</div>
<!-- /container -->
<div class="bg_white">
    <div class="container margin_60_35">
        <h4 class="pb-3">Kirimkan Pesan kepada Kami</h4>
        <div class="row">
            <div class="col-lg-4 col-md-6 add_bottom_25">
                @if (session('status'))
                <div class="alert alert-{{ session('status.type') }} mt-3">
                    {{ session('status.message') }}
                </div>
                @endif

                @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger mt-3">
                    {{ $error }}
                </div>
                @endforeach
                @endif
                <form action="{{ route('guest.sendEmail') }}" method="POST" id="form-send-email">
                    @csrf
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Nama *" name="name" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" placeholder="Email *" name="email" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" style="height: 150px;" placeholder="Pesan *" name="message"
                            required></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn_1 full-width" type="submit">Kirim</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-8 col-md-6 add_bottom_25">
                <iframe class="map_contact"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.4668328142234!2d106.8561143!3d-6.4623878999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c1d633bc8abf%3A0xf935f6d191ac3277!2sBuitenzorg%20outdoor%20cibinong!5e0!3m2!1sen!2sid!4v1730639894655!5m2!1sen!2sid"
                    style="border: 0" allowfullscreen></iframe>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /bg_white -->
@endsection

@section('script')
<script>
    (function(){
        $(document).ready(function(){
            $('form#form-send-email').on('submit', function(e){
                let $button = $('form#form-send-email button');
                $button.prop('disabled', true);
                $button.text('Mengirim...');
            });

            @if($errors->any())
                $('form#form-send-email button').prop('disabled', false)
            @endif
        });
    })();
</script>
@endsection