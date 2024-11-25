@extends('guest.layout.app')

@section('title', 'Keranjang')

@section('css')
<link href="{{ asset('assets/css/cart.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container margin_30">
    <div class="page_header">
        <div class="breadcrumbs">
            <ul>
                <li><a href="#">Beranda</a></li>
                <li>Keranjang</li>
            </ul>
        </div>
        <h1>Halaman Keranjang</h1>
    </div>
    <!-- /page_header -->
    <table class="table table-striped cart-list">
        <thead>
            <tr>
                <th>
                    Produk
                </th>
                <th>
                    Harga
                </th>
                <th>
                    Jumlah
                </th>
                <th>
                    Subtotal
                </th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            {{-- <tr>
                <td>
                    <div class="thumb_cart">
                        <img src="" data-src="" class="prd-img lazy" alt="Gambar Produk">
                    </div>
                    <span class="prd-name item_cart"></span>
                </td>
                <td>
                    <strong class="prd-price"></strong>
                </td>
                <td>
                    <div class="numbers-row">
                        <input type="text" value="1" id="quantity_1" class="prd-qty qty2" name="quantity" data-min="1">
                    </div>
                </td>
                <td>
                    <strong class="prd-subtotal"></strong>
                </td>
                <td class="options">
                    <a href="#"><i class="ti-trash"></i></a>
                </td>
            </tr> --}}
        </tbody>
    </table>
</div>
<!-- /container -->

<div class="box_cart">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-xl-4 col-lg-4 col-md-6">
                <table class="w-100 fs-6">
                    <tr>
                        <td class="text-start text-danger">Subtotal</td>
                        <td class="result-subtotal text-end"></td>
                    </tr>
                    <tr>
                        <td class="text-start text-danger">Total</td>
                        <td class="result-total text-end"></td>
                    </tr>
                </table>
                <button class="btn btn-primary w-100 rounded-0 full-width cart" id="btn-pesan">Lanjutkan
                    Pemesanan</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('outside-main')
<div class="modal fade" id="modalIdentity" tabindex="-1" aria-labelledby="modalIdentityLabel" aria-hidden="true"
    style="z-index: 99999;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalIdentityLabel">Data Identitas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formIdentity">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" placeholder="Nama anda"
                            aria-describedby="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_telp" class="form-label">No.HP</label>
                        <input type="number" class="form-control" id="no_telp" placeholder="No.Telp"
                            aria-describedby="no telp" required>
                    </div>
                    <div class="mb-3">
                        <label for="date-time" class="form-label">Kapan anda mengambil barang?</label>
                        <input type="datetime-local" class="form-control" id="date-time" name="dateTime"
                            aria-describedby="date & time" required>
                        <small id="error-message" style="color: red; display: none;">Waktu antara jam 07:00 -
                            20:00</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    id="btn-batalkan">Batalkan</button>
                <button type="button" class="btn btn-primary" id="btn-lanjut">Lanjut</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    (function(){
        $(document).ready(function() {
            const today = new Date();
            const nextWeek = new Date(today);
            nextWeek.setDate(today.getDate() + 7);

            const minDateTime = new Date(today.setHours(7, 0, 0, 0)).toISOString().slice(0, 16);
            const maxDateTime = new Date(nextWeek.setHours(20, 0, 0, 0)).toISOString().slice(0, 16);

            $("#date-time").attr("min", minDateTime);
            $("#date-time").attr("max", maxDateTime);

            $("#date-time").on("change", function() {
                const selectedDate = new Date($(this).val());
                const selectedHour = selectedDate.getHours();

                if (selectedHour < 7 || selectedHour >= 20) {
                    $("#error-message").show();
                    $(this).val("");
                } else {
                    $("#error-message").hide();
                }
            });
        });
    })();
</script>
<script src="{{ asset('assets/js/cart.js') }}"></script>
@endsection