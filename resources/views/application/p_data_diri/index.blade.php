@extends('layouts.app')

@section('content')
@include('__FUNCTIONS.tanggal_indo')
@include('__FUNCTIONS.age')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Diri</h3>
                <p class="text-subtitle text-muted">Menampilkan informasi seluruh data diri.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('beranda')}}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Diri</li>
                    </ol>
                    <a href="{{ route('printDataDiri') }}" class="btn btn-sm btn-primary">
                        <span class="d-none d-sm-block">Cetak Data Diri</span>
                    </a>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Diri - <b>{{ strtoupper($user->name) }}</b></h5>
                        <hr>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-2">
                                <div class="mb-3">
                                    @if(!empty($user->profile))
                                    <img src="{{ asset('template/custom/img_upload/profile/'.$user->profile) }}" alt="" style="width: 140px; height:140px; object-fit:cover; border: 1px solid #e9ecef;">
                                    @else
                                    <img src="{{asset('template/main/assets/images/faces/1.jpg')}}" alt="" style="width: 140px; height:140px; object-fit:cover; border: 1px solid #e9ecef;">
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="form-group">
                                    <label>Nomor KTP / NIK</label>
                                    <input type="text" class="form-control" value="{{ $user->nik ? $user->nik : 'Belum Diisi' }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" value="{{ $user->fullname ? $user->fullname : 'Belum Diisi' }}" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="form-group">
                                    <label>Nomor KK</label>
                                    <input type="text" class="form-control" value="{{ $user->no_kk ? $user->no_kk : 'Belum Diisi' }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Alamat Email</label>
                                    <input type="text" class="form-control" value="{{ $user->email }}" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="form-group">
                                    <label for="name">Tempat / Tanggal Lahir</label>
                                    <input type="text" class="form-control" value="{{ $user->place_of_birth ? $user->place_of_birth : 'Belum Diisi' }} / {{ $user->date_of_birth ? tgl_indo($user->date_of_birth) : 'Belum Diisi' }}" readonly>
                                </div>
                            </div>
                            <div class=" col-12 col-md-2">
                                <div class="form-group">
                                    <label for="name">Usia</label>
                                    <input type="text" class="form-control" value="{{ $user->date_of_birth ? getAge($user->date_of_birth) : '-' }} Tahun" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="name">Jenis Kelamin</label>
                                    <input type="text" class="form-control" value="{{ $user->gender ? $user->gender : 'Belum Diisi' }}" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="form-group">
                                    <label for="name">Agama</label>
                                    <input type="text" class="form-control" value="{{ $user->religion ? $user->religion : 'Belum Diisi' }}" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <label for="name">Detail Alamat</label>
                                    <textarea class="form-control" rows="2" readonly>{{ $user->detail_address ? $user->detail_address : "Belum Diisi" }}</textarea>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="form-group">
                                    <label>RT</label>
                                    <input type="text" class="form-control" value="{{ $user->rt ? $user->rt->number : 'Belum Diisi' }}" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label>Nomor Telepon</label>
                                    <input type="text" class="form-control" value="{{ $user->phone_number ? $user->phone_number : 'Belum Diisi' }}" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="name">Pekerjaan</label>
                                    <input type="text" class="form-control" value="{{ $user->profession ? $user->profession : 'Belum Diisi' }}" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="name">Pendidikan Terakhir</label>
                                    <input type="text" class="form-control" value="{{ $user->education ? $user->education : 'Belum Diisi' }}" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">Status Hubungan Dalam Keluarga</label>
                                    <input type="text" class="form-control" value="{{ $user->family_status ? $user->family_status->f_status : 'Belum Diisi' }}" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">Status Hubungan Dalam Kartu Keluarga</label>
                                    <input type="text" class="form-control" value="{{ $user->family_c_status ? $user->family_c_status->relationship : 'Belum Diisi' }}" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">Status Hubungan Dalam Pernikahan</label>
                                    <input type="text" class="form-control" value="{{ $user->marital_status ? $user->marital_status->w_status : 'Belum Diisi' }}" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="name">Jenis Rumah</label>
                                    <input type="text" class="form-control" value="{{ $user->house_type ? $user->house_type : 'Belum Diisi' }}" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="name">Disabilitas</label>
                                    <input type="text" class="form-control" value="{{ $user->disabilitas ? $user->disabilitas : 'Belum Diisi' }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <a href="{{ route('data_diri.edit', $user->id) }}" class="btn btn-primary me-1 mb-1">Ubah Data Diri</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('layouts.components.modalWarning')
@endsection

@section('JsCustom')
<script>
    $('#dataDiriLink').addClass('active')
</script>
@endsection