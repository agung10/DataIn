@extends('layouts.app')

@section('cssSpecific')
<link rel="stylesheet" href="{{asset('template/main/assets/vendors/simple-datatables/style.css')}}">
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Pengguna</h3>
                <p class="text-subtitle text-muted">Menampilkan Informasi Seluruh Pengguna</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('beranda')}}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Pengguna</li>
                    </ol>
                    @if(\Auth::user()->level != "User")
                    <button type="submit" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalPenggunaAdd">
                        <span class="d-none d-sm-block">Tambah Pengguna</span>
                    </button>
                    @else
                    @endif
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th class="text-center">Nomor</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Level</th>
                                    <th class="text-center">RT</th>
                                    <th class="text-center">Bergabung Sejak</th>
                                    @if(\Auth::user()->level != "User")
                                    <th class="text-center">Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $res)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $res->name }}</td>
                                    <td>{{ $res->email }}</td>
                                    @if($res->level == "Administrator")
                                    <td><span class="badge bg-light-primary"><b>{{ $res->level }}</b></span></td>
                                    @elseif($res->level == "RT")
                                    <td><span class="badge bg-light-info"><b>{{ $res->level }}</b></span></td>
                                    @elseif($res->level == "User")
                                    <td><span class="badge bg-light-secondary"><b>{{ $res->level }}</b></span></td>
                                    @endif

                                    <td>{{ $res->rt ? $res->rt->number : "-" }}</td>

                                    <td>{{ $res->created_at }}</td>
                                    @if(\Auth::user()->level == "Administrator")
                                    <td class="text-center">
                                        <button id="{{ $res->id }}" class="btn btn-sm btn-warning edit">
                                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Ubah Data Pengguna">
                                                <i class="bi bi-pencil-square align-items-center" style="display: flex;"></i>
                                            </span>
                                        </button>
                                        <button data-id="{{ $res->id }}" class="btn btn-sm btn-secondary editPW">
                                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Ubah Kata Sandi">
                                                <i class="bi bi-shield-lock-fill align-items-center" style="display: flex;"></i>
                                            </span>
                                        </button>
                                        <button class="btn btn-sm btn-danger openModalDelete" data-uri="{{ route('pengguna.destroy', $res->id) }}">
                                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Hapus Data Pengguna">
                                                <i class="bi bi-trash align-items-center" style="display: flex;"></i>
                                            </span>
                                        </button>
                                    </td>
                                    @elseif(\Auth::user()->level == "RT")
                                    @if($res->level != "Administrator" && $res->rt_id == Auth::user()->rt_id)
                                    <td class="text-center">
                                        <button id="{{ $res->id }}" class="btn btn-sm btn-warning edit">
                                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Ubah Data Pengguna">
                                                <i class="bi bi-pencil-square align-items-center" style="display: flex;"></i>
                                            </span>
                                        </button>
                                        <button data-id="{{ $res->id }}" class="btn btn-sm btn-secondary editPW">
                                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Ubah Kata Sandi">
                                                <i class="bi bi-shield-lock-fill align-items-center" style="display: flex;"></i>
                                            </span>
                                        </button>
                                        <button class="btn btn-sm btn-danger openModalDelete" data-uri="{{ route('pengguna.destroy', $res->id) }}">
                                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Hapus Data Pengguna">
                                                <i class="bi bi-trash align-items-center" style="display: flex;"></i>
                                            </span>
                                        </button>
                                    </td>
                                    @else
                                    <td class="text-center">
                                        <span class="badge bg-light-warning"><b>Tidak ada akses</b></span>
                                    </td>
                                    @endif
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Pengguna Add Modal -->
<div class="modal fade text-left" id="modalPenggunaAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <form method="POST" action="{{route('pengguna.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Tambah Pengguna</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <label class="mb-2">Nama Pengguna: </label>
                            <div class="form-group">
                                <input type="text" class="form-control @error('nameP') is-invalid @enderror" name="nameP" value="{{ old('nameP') }}" autocomplete="nameP" placeholder="Masukkan nama pengguna">

                                @error('nameP')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <label class="mb-2">Email Pengguna: </label>
                            <div class="form-group">
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Masukkan email pengguna">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-8">
                            <label class="mb-2">Level Pengguna: </label>
                            <div class="form-group">
                                <select class="form-select @error('level') is-invalid @enderror" name="level">
                                    <option value="" selected disabled>Pilih jenis level</option>
                                    <?php $level = ['Administrator', 'RT', 'User']; ?>
                                    @foreach($level as $key)
                                    <option value="{{ $key }}">{{ $key }}</option>
                                    @endforeach
                                </select>

                                @error('level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <label class="mb-2">RT: </label>
                            <div class="form-group">
                                <select class="form-select @error('rt_id') is-invalid @enderror" name="rt_id">
                                    <option value="" selected disabled>Pilih RT</option>
                                    @foreach($rt as $res)
                                    <option value="{{ $res->id }}">{{ $res->number }}</option>
                                    @endforeach
                                </select>

                                @error('rt_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="mb-2">Kata Sandi: </label>
                            <div class="form-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Masukkan kata sandi">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="mb-2">Konfirmasi Kata Sandi: </label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" autocomplete="new-password" placeholder="Konfirmasi kata sandi">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Batal</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Pengguna Edit Modal -->
<div class="modal fade text-left" id="modalPenggunaEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Ubah Pengguna</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form id="formEditPengguna" method="POST" action="" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}

                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <label class="mb-2">Nama Pengguna: </label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nameP" name="nameP" required>
                            </div>
                            <label class="mb-2">Email Pengguna: </label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="email" name="email" readonly>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="mb-2">Level Pengguna: </label>
                            <div class="form-group">
                                <select class="form-select @error('level') is-invalid @enderror" id="level" name="level" required>
                                    <option value="" selected disabled> Pilih jenis level </option>

                                    <?php $level = ['Administrator', 'RT', 'User']; ?>
                                    @foreach($level as $key)
                                    <option value="{{ $key }}"> {{ $key }} </option>
                                    @endforeach
                                </select>

                                @error('level')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <label class="mb-2">RT: </label>
                            <div class="form-group">
                                <select class="form-select @error('rt_id') is-invalid @enderror" id="rt" name="rt_id">
                                    <option value="" selected disabled> Pilih RT </option>

                                    @foreach($rt as $key)
                                    <option value="{{ $key->id }}"> {{ $key->number }} </option>
                                    @endforeach
                                </select>

                                @error('rt_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
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

<!-- Pengguna EditPassword Modal -->
<div class="modal fade text-left" id="modalPenggunaEditPW" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Ubah Password Pengguna</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form id="formEditPassword" method="POST" action="" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <label class="mb-2">Kata Sandi: </label>
                            <div class="form-group">
                                <input type="password" class="form-control @error('passwordE') is-invalid @enderror" name="passwordE" autocomplete="new-password" placeholder="Masukkan kata sandi baru">

                                @error('passwordE')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="mb-2">Konfirmasi Kata Sandi: </label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password-confirm" name="password_confirmation" autocomplete="new-password" placeholder="Konfirmasi kata sandi">

                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
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

@include('layouts.components.modalWarning')
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
    $('#penggunaLink').addClass('active')

    $(document).on('click', '.edit', function(e) {
        e.preventDefault();
        var id = $(this).attr('id');
        console.log(id)
        $.ajax({
            url: "{{ url('getDataPengguna') }}/" + id,
            dataType: "JSON",
            success: function(data) {
                if (data != "") {
                    $('#nameP').val(data.name);
                    $('#email').val(data.email);
                    $('#level').val(data.level);
                    $('#rt').val(data.rt_id);
                    $('#modalPenggunaEdit').click();
                    $('#formEditPengguna').attr("action", "{{ url('pengguna/') }}/" + id) + "/update";

                    $('#modalPenggunaEdit').modal("show")
                }
            }
        })
    })

    $(document).on('click', '.editPW', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        console.log(id)

        $('#formEditPassword').attr("action", "/pengguna/updatePW/" + id);
        $('#modalPenggunaEditPW').modal("show")
    })

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
@endsection