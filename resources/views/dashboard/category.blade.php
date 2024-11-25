@extends('dashboard.layout.app')

@section('title', 'Category')

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
<small class="text-primary">Product Category</small>
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Kategori Produk</span>
    </h4>

    <div class="row mx-0">
        <!-- Basic Bootstrap Table -->
        <div class="card col-12 col-md-10 col-lg-8">
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
                <span>Daftar Kategori Produk</span>
                <button type="button" class="btn btn-primary btn-sm px-2" data-bs-toggle="modal"
                    data-bs-target="#addCtgModal">
                    <i class='bx bx-plus'></i>
                </button>
            </h5>
            <div class="px-4 pb-4">
                <table id="table-ctg" class="table table-striped table-hover mb-2">
                    <thead class="border-top-0" style="text-align: center !important;">
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Jumlah Produk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $ctg)
                        <tr>
                            <td>
                                <strong>{{ $loop->iteration }}</strong>
                            </td>
                            <td>{{ $ctg->name }}</td>
                            <td>{{ $ctg->products->count() }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary btn-sm btn-action" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item btn-edit-ctg" href="javascript:void(0);"
                                                data-edit="{{ route('category.edit', $ctg->id) }}"
                                                data-update="{{ route('category.update', $ctg->id) }}">
                                                <i class="bx bx-edit-alt me-1"></i>
                                                Edit
                                            </a>
                                        </li>
                                        <li>
                                            <form action="{{ route('category.destroy', $ctg->id) }}" method="POST"
                                                class="form-del-ctg">
                                                @method('DELETE')
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $ctg->id }}">
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

<div class="modal fade" id="addCtgModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="addCtgModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addCtgModalLabel">Tambah Kategori</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="nama" class="form-label">Nama <sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control" id="nama" name="name" placeholder="Nama Kategori"
                            aria-describedby="nama kategori" required />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                <button type="button" class="btn btn-primary" id="btn-add-ctg">Simpan</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editCtgModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="editCtgModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editCtgModalLabel">Perbarui Kategori</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @method('PUT')
                    @csrf
                    <div>
                        <label for="nama" class="form-label">Nama <sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control" id="nama" name="name" placeholder="Nama Kategori"
                            aria-describedby="nama kategori" required />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                <button type="button" class="btn btn-primary" id="btn-update-ctg">Simpan</button>
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
        const tableCtg = $('#table-ctg').DataTable({
            responsive: true,
            columnDefs: [
                { responsivePriority: 1, targets: -1 },
            ],
        });

        tableCtg.on('draw.dt', function () {
            handleEditAndDel();
        });

        // Semua Form
        $('.modal form').on('submit', function () {
            $(`.modal .modal-footer button, button[data-bs-target="#addCtgModal"], #table-ctg tr .btn-action`).addClass('disabled');
        });

        // Tambah Category
        $('#addCtgModal #btn-add-ctg').on('click', function () {
            $('#addCtgModal form').submit();
        });

        $('#addCtgModal').on('hidden.bs.modal', function () {
            $(this).find('form')[0].reset();
        });

        const handleEditAndDel = () => {
            // Edit Kategori
            const editCtgModal = new bootstrap.Modal('#editCtgModal', {
                keyboard: false
            });

            $(document).off('click', '#table-ctg .btn-edit-ctg').on('click', '#table-ctg .btn-edit-ctg', function (e) {
                e.preventDefault();
                const editUrl = $(this).data('edit');
                const updateUrl = $(this).data('update');

                $.ajax({
                    url: editUrl,
                    method: 'GET',
                    dataType: 'json',
                    success: function (response) {
                        $('#editCtgModal #nama').val(response.category.name);
                        $('#editCtgModal form').attr('action', updateUrl);
                        editCtgModal.show();
                    },
                    error: function (xhr, status, error) {
                        if (xhr.status === 404) {
                            alert('Kategori tidak ditemukan. Data mungkin telah dihapus atau ID tidak valid.');
                        } else {
                            alert('Terjadi kesalahan saat mengambil data. Silakan coba lagi.');
                        }
                    }
                });
            });

            $(document).off('click', '#editCtgModal #btn-update-ctg').on('click', '#editCtgModal #btn-update-ctg', function () {
                $('#editCtgModal form').submit();
            });

            $('#editCtgModal').off('hidden.bs.modal').on('hidden.bs.modal', function () {
                $(this).find('form')[0].reset();
            });

            // Hapus Kategori
            $(document).off('click', 'form.form-del-ctg button').on('click', 'form.form-del-ctg button', function (e) {
                e.preventDefault();
                const form = $(this).closest('form');

                sa2confirm({
                    title: "Apakah Anda yakin ingin menghapusnya?",
                    html: "Kategori tidak akan bisa dikembalikan",
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
