@extends('layouts.app')

@section('cssSpecific')
<link rel="stylesheet" href="{{asset('template/main/assets/vendors/simple-datatables/style.css')}}">
@endsection

@section('content')
@include('__FUNCTIONS.tanggal_indo')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Warga</h3>
                <p class="text-subtitle text-muted">Menampilkan Informasi Seluruh Warga</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('beranda')}}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Warga</li>
                    </ol>
                    <a href="{{ route('printDataWarga') }}" class="btn btn-sm btn-primary">
                        <span class="d-none d-sm-block">Cetak Data Warga</span>
                    </a>
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
                                    <th class="text-center">NIK</th>
                                    <th class="text-center">No KK</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Tempat/Tanggal Lahir</th>
                                    <th class="text-center">RT</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $res)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $res->nik }}</td>
                                    <td>{{ $res->no_kk }}</td>
                                    <td>{{ $res->name }}</td>
                                    <td>{{ $res->place_of_birth ? $res->place_of_birth : "Belum Diisi" }} / {{ $res->date_of_birth ? tgl_indo($res->date_of_birth) : "Belum Diisi" }}</td>
                                    <td>{{ $res->rt->number }}</td>
                                    <td class="text-center">
                                        <a href="{{route('data_warga.edit', $res->id)}}" class="btn btn-sm btn-warning">
                                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Ubah Data Warga">
                                                <i class="bi bi-pencil-square align-items-center" style="display: flex;"></i>
                                            </span>
                                        </a>
                                        <a href="{{route('data_warga.show', $res->id)}}" class="btn btn-sm btn-secondary">
                                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Detail Data Warga">
                                                <i class="bi bi-info-square align-items-center" style="display: flex;"></i>
                                            </span>
                                        </a>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete">
                                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Hapus Data Warga">
                                                <i class="bi bi-trash align-items-center" style="display: flex;"></i>
                                            </span>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Delete Modal -->
                                <div class="modal fade text-left" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel1">Konfirmasi Hapus</h5>
                                                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <p>
                                                    Apakah anda yakin ingin menghapus data ini?. Tekan/Klik button "Hapus" untuk menghapus, "Batal" untuk membatalkan.
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Batal</span>
                                                </button>

                                                <form action="{{ route('pengguna.destroy', $res->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
    $('#dataWargaLink').addClass('active')

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
@endsection