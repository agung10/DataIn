@extends('layouts.app')

@section('cssSpecific')
<link rel="stylesheet" href="{{asset('template/main/assets/vendors/simple-datatables/style.css')}}">
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Status</h3>
                <p class="text-subtitle text-muted">Hubungan Dalam Kartu Keluarga</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('beranda')}}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Status</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-12 col-md-4">
                <form method="POST" action="{{ route('status_kartu_keluarga.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <label class="mb-2">Status Hubungan Dalam KK: </label>
                            <div class="form-group">
                                <input type="text" class="form-control @error('relationship') is-invalid @enderror" name=" relationship" autofocus placeholder="Masukkan status">

                                @error('relationship')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="reset" class="btn btn-secondary">
                                <span class="d-none d-sm-block">Hapus</span>
                            </button>
                            <button type="submit" class="btn btn-primary ml-1">
                                <span class="d-none d-sm-block">Tambah</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th class="text-center">Nomor</th>
                                    <th class="text-center">Status Kartu Keluarga</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($family_c_statuses as $res)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $res->relationship }}</td>
                                    <td class="text-center">
                                        <button id="{{ $res->id }}" class="btn btn-sm btn-warning edit">
                                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Ubah Data Status">
                                                <i class="bi bi-pencil-square align-items-center" style="display: flex;"></i>
                                            </span>
                                        </button>
                                        <button class="btn btn-sm btn-danger openModalDelete" data-uri="{{ route('status_kartu_keluarga.destroy', $res->id) }}">
                                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Hapus Data Status">
                                                <i class="bi bi-trash align-items-center" style="display: flex;"></i>
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

    </section>
</div>

<!-- Status Edit Modal -->
<div class="modal fade text-left" id="modalStatusEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Ubah Status</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form id="formEditStatus" method="POST" action="" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="modal-body">
                    <label class="mb-2">Status Hubungan Dalam Kartu Keluarga: </label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="relationship" name="relationship" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Batal</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Ubah</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('JsSpecific')
<script src="{{asset('template/main/assets/vendors/simple-datatables/simple-datatables.js')}}"></script>
<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>
@endsection

@section('JsCustom')
<script>
    $('#statusLink').addClass('active')
    $('#submenuLink').addClass('active')
    $('#kkLink').addClass('active')

    // ModalStatusEdit
    $(document).on('click', '.edit', function(e) {
        e.preventDefault();
        var id = $(this).attr('id');
        console.log(id)
        $.ajax({
            url: "{{ url('getDataKK') }}/" + id,
            dataType: "JSON",
            success: function(data) {
                if (data != "") {
                    $('#relationship').val(data.relationship);
                    $('#modalStatusEdit').click();
                    $('#formEditStatus').attr("action", "{{ url('status_kartu_keluarga/') }}/" + id) + "/update";

                    $('#modalStatusEdit').modal("show")
                }
            }
        })
    })

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
@endsection