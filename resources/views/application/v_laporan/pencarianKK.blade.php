@extends('layouts.app')

@section('cssSpecific')
<link rel="stylesheet" href="{{asset('template/main/assets/vendors/simple-datatables/style.css')}}">
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Kepala Keluarga</h3>
                <p class="text-subtitle text-muted">Data Kepala Keluarga</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('beranda')}}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Kepala Keluarga</li>
                    </ol>
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
                                    <th class="text-center">Nomor Kartu Keluarga</th>
                                    <th class="text-center">Nama Kepala Keluarga</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $res)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $res->nik }}</td>
                                    <td>{{ $res->no_kk }}</td>
                                    <td><b>{{ $res->fullname }}</b></td>
                                    <td class="text-center">
                                        <a href="{{route('data_warga.show', $res->id)}}" class="btn btn-sm btn-secondary">
                                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Detail Kepala Keluarga">
                                                <i class="bi bi-info-square align-items-center" style="display: flex;"></i>
                                            </span>
                                        </a>
                                    </td>
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
    $('#kepalaKeluargaLink').addClass('active')
</script>
@endsection