@extends('dashboard.layout.app')

@section('title', 'Product')

@section('vendor.css')
<link rel="stylesheet" href="{{ asset('dba/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
<link rel="stylesheet" href="{{ asset('dba/assets/vendor/libs/datatables/dataTables.min.css') }}" />
<link rel="stylesheet" href="{{ asset('dba/assets/vendor/libs/datatables/dataTables.bootstrap5.css') }}" />
<link rel="stylesheet" href="{{ asset('dba/assets/vendor/libs/datatables/responsive.dataTables.css') }}" />
{{-- <link rel="stylesheet" href="{{ asset('dba/assets/vendor/libs/datatables/twitter-bootstrap.min.css') }}" /> --}}
@endsection

@section('page.css')
<style>
    table thead th {
        white-space: nowrap;
    }

    table thead th,
    table tr td.dt-type-numeric {
        text-align: center !important;
    }

    .pagination .dt-paging-button {
        padding-left: .5em !important;
        padding-right: .5em !important;
    }

    .pagination .dt-paging-button:hover {
        background: none !important;
        border-color: transparent !important;
    }
</style>
@endsection

@section('breadcrumb')
<small class="text-primary">Product</small>
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Produk</span></h4>

    <div class="row mx-0">
        <!-- Basic Bootstrap Table -->
        <div class="card col-12 col-xxl-10">
            @if (session('status'))
            <div class="alert alert-{{ session('status.type') }} mt-3">
                {{ session('status.msg') }}
            </div>
            @endif

            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger mt-3">
                {{ $error }}
            </div>
            @endforeach
            @endif
            <h5 class="card-header d-flex justify-content-between gap-3">
                <span>Daftar Produk</span>
                <button type="button" class="btn btn-primary btn-sm px-2" data-bs-toggle="modal"
                    data-bs-target="#addProductModal">
                    <i class='bx bx-plus'></i>
                </button>
            </h5>
            <div class="px-4 pb-4">
                <table id="table-product" class="table table-striped table-hover mb-2">
                    <thead class="border-top-0">
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Berat (kg)</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $p)
                        <tr>
                            <td>
                                <strong>{{ $loop->iteration }}</strong>
                            </td>
                            <td>
                                <div class="d-flex gap-3">
                                    <img src="{{ asset('storage/' . $p->productPhotos[0]->path) }}"
                                        class="img-thumbnail" alt="Image - {{ $p->name }}" width="50" height="50">
                                    {{ $p->name }}
                                </div>
                            </td>
                            <td>{{ $p->category->name }}</td>
                            <td>{{ $p->price }}</td>
                            <td>{{ $p->stock }}</td>
                            <td>{{ $p->weight }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary btn-sm" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item btn-edit-product" href="javascript:void(0);"
                                                data-edit="{{ route('product.edit', $p->id) }}"
                                                data-update="{{ route('product.update', $p->id) }}">
                                                <i class="bx bx-edit-alt me-1"></i>
                                                Edit
                                            </a>
                                        </li>
                                        <li>
                                            <form action="{{ route('product.destroy', $p->id) }}" method="POST"
                                                class="form-del-product">
                                                @method('DELETE')
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $p->id }}">
                                                <button class="dropdown-item">
                                                    <i class="bx bx-trash me-1"></i>
                                                    Delete
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
</div>

<div class="modal fade" id="addProductModal" data-bs-backdrop="static" tabindex="-1"
    aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addProductModalLabel">Tambah Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama <sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control" id="nama" name="name" placeholder="Nama Produk"
                            aria-describedby="nama produk" required />
                    </div>
                    <div class="mb-3">
                        <label for="categories" class="form-label">Kategori <sup class="text-danger">*</sup></label>
                        <select class="form-select" id="categories" aria-label="category select" name="category"
                            required>
                            <option selected disabled>--pilih kategori--</option>
                            @foreach ($categories as $ctg)
                            <option value="{{ $ctg->id }}">{{ $ctg->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <div class="mb-3">
                                <label for="sku" class="form-label">SKU</label>
                                <input type="text" class="form-control" id="sku" name="sku" placeholder="SKU"
                                    aria-describedby="SKU" required />
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="mb-3">
                                <label for="price" class="form-label">Harga <sup class="text-danger">*</sup></label>
                                <input type="number" class="form-control" id="price" name="price" placeholder="Harga"
                                    aria-describedby="harga" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="stock" class="form-label">Stok <sup class="text-danger">*</sup></label>
                                <input type="number" class="form-control" id="stock" name="stock" placeholder="Stok"
                                    aria-describedby="Stok" required />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="weight" class="form-label">Berat (KG) <sup
                                        class="text-danger">*</sup></label>
                                <input type="number" class="form-control" id="weight" name="weight" placeholder="Berat"
                                    aria-describedby="Berat" required />
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi <sup class="text-danger">*</sup></label>
                        <textarea class="form-control" name="description" id="description" rows="6"
                            placeholder="Deskripsi produk" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            <span>Foto</span>
                            <sup class="text-danger">*</sup>
                        </label>
                        <input class="form-control" name="photos[]" type="file" id="photos" accept=".jpg,.png,.jpeg"
                            multiple required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                <button type="button" class="btn btn-primary" id="btn-add-product">Simpan</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editProductModal" data-bs-backdrop="static" tabindex="-1"
    aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editProductModalLabel">Perbarui Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama <sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control" id="nama" name="name" placeholder="Nama Produk"
                            aria-describedby="nama produk" required />
                    </div>
                    <div class="mb-3">
                        <label for="categories" class="form-label">Kategori <sup class="text-danger">*</sup></label>
                        <select class="form-select" id="categories" aria-label="category select" name="category"
                            required>
                            <option selected disabled>--pilih kategori--</option>
                            @foreach ($categories as $ctg)
                            <option value="{{ $ctg->id }}">{{ $ctg->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <div class="mb-3">
                                <label for="sku" class="form-label">SKU</label>
                                <input type="text" class="form-control" id="sku" name="sku" placeholder="SKU"
                                    aria-describedby="SKU" required />
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="mb-3">
                                <label for="price" class="form-label">Harga <sup class="text-danger">*</sup></label>
                                <input type="number" class="form-control" id="price" name="price" placeholder="Harga"
                                    aria-describedby="harga" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="stock" class="form-label">Stok <sup class="text-danger">*</sup></label>
                                <input type="number" class="form-control" id="stock" name="stock" placeholder="Stok"
                                    aria-describedby="Stok" required />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="weight" class="form-label">Berat (KG) <sup
                                        class="text-danger">*</sup></label>
                                <input type="number" class="form-control" id="weight" name="weight" placeholder="Berat"
                                    aria-describedby="Berat" required />
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi <sup class="text-danger">*</sup></label>
                        <textarea class="form-control" name="description" id="description" rows="6"
                            placeholder="Deskripsi produk" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="photos" class="form-label">Foto <sup class="text-danger">*</sup></label>
                        <div class="photos-group mb-3 d-flex gap-3 flex-wrap"></div>
                        <input class="form-control" name="photos[]" type="file" id="photos" accept=".jpg,.png,.jpeg"
                            multiple>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                <button type="button" class="btn btn-primary" id="btn-update-product">Simpan</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('vendor.script')
@endsection

@section('page.script')
<script src="{{ asset('dba/assets/vendor/libs/datatables/dataTables.min.js') }}"></script>
<script src="{{ asset('dba/assets/vendor/libs/datatables/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('dba/assets/vendor/libs/datatables/dataTables.responsive.js') }}"></script>
<script src="{{ asset('dba/assets/vendor/libs/datatables/responsive.dataTables.js') }}"></script>
{{-- <script src="{{ asset('dba/assets/vendor/libs/datatables/twitter-bootstrap.bundle.min.js') }}"></script> --}}
<script>
    $(document).ready(function () {
        const tableProduct = $('#table-product').DataTable({
            responsive: true,
            columnDefs: [
                { responsivePriority: 1, targets: -1 }
            ],
        });

        tableProduct.on('draw.dt', function () {
            handleEditAndDel();
        });

        // Semua Form
        $('.modal form').on('submit', function () {
            $(`
                .modal .modal-footer button,
                button[data-bs-target="#addProductModal"],
                #table-product tr .btn-action
            `).addClass('disabled');
        });

        // Tambah Produk
        $('#addProductModal #btn-add-product').on('click', function () {
            $('#addProductModal form').submit();
        });

        $('#addProductModal').on('hidden.bs.modal', function () {
            $(this).find('form')[0].reset();
        });

        const handleEditAndDel = () => {
            // Edit Produk
            const editProductModal = new bootstrap.Modal('#editProductModal', {
                keyboard: false
            });

            $(document).off('click', '#table-product .btn-edit-product').on('click', '#table-product .btn-edit-product', function (e) {
                e.preventDefault();
                let urlEdit = $(this).data('edit');
                let urlUpdate = $(this).data('update');

                $.ajax({
                    url: urlEdit,
                    method: 'GET',
                    success: function (response) {
                        const product = response.product;

                        $('#editProductModal form #nama').val(product.name);
                        $('#editProductModal form #categories').val(product.category.id);
                        $('#editProductModal form #sku').val(product.sku);
                        $('#editProductModal form #price').val(product.price);
                        $('#editProductModal form #stock').val(product.stock);
                        $('#editProductModal form #weight').val(product.weight);
                        $('#editProductModal form #description').val(product.description);

                        if (product.photos.length > 0) {
                            let photoPreview = '';
                            product.photos.forEach(photo => {
                                photoPreview += `
                                    <div class="position-relative photos-item">
                                        <button class="btn-del-photos-item btn btn-danger text-white px-1 py-0 rounded-0 position-absolute top-0 end-0" style="z-index: 1;">
                                            <i class='bx bx-x'></i>
                                        </button>
                                        <input type="hidden" name="photo_old[]" value="${photo.id}" />
                                        <img src="/storage/${photo.path}" class="img-thumbnail" alt="Foto Produk" style="width: 80px; height: 90px; object-position: center; object-fit: cover;">
                                    </div>
                                `;
                            });
                            $('#editProductModal .photos-group').html(photoPreview);

                            $('#editProductModal .photos-group').on('click', '.btn-del-photos-item', function (e) {
                                e.preventDefault();

                                sa2confirm({
                                    title: "Apakah Anda yakin ingin menghapus foto ini?",
                                    confirmButtonText: "Hapus",
                                    cancelButtonText: "Batalkan"
                                }, () => {
                                    $(this).closest('.photos-item').remove();
                                });
                            });
                        } else {
                            $('#editProductModal .photos-group').html('<p class="text-muted">Tidak ada foto tersedia</p>');
                        }

                        $('#editProductModal form').attr('action', urlUpdate);
                        editProductModal.show();
                    },
                    error: function (xhr) {
                        if (xhr.status === 404) {
                            alert('Produk tidak ditemukan!');
                        } else {
                            console.error('Terjadi kesalahan:', xhr.responseText);
                        }
                    }
                });
            });

            $(document).off('click', '#editProductModal #btn-update-product').on('click', '#editProductModal #btn-update-product', function () {
                $('#editProductModal form').submit();
            });

            $('#editProductModal').off('hidden.bs.modal').on('hidden.bs.modal', function () {
                $(this).find('form')[0].reset();
                $('#editProductModal .photos-group').html('');
            });

            // Hapus Produk
            $(document).off('click', 'form.form-del-product button').on('click', 'form.form-del-product button', function (e) {
                e.preventDefault();
                const form = $(this).closest('form');

                sa2confirm({
                    title: "Apakah Anda yakin ingin menghapusnya?",
                    html: 'Produk tidak akan bisa dikembalikan',
                    confirmButtonText: "Hapus",
                    cancelButtonText: "Batalkan"
                }, () => {
                    form.submit();
                });
            });
        };

        handleEditAndDel();
    });
</script>
@endsection
