@extends('layouts.app')

@section('content')
@include('__FUNCTIONS.tanggal_indo')
@include('__FUNCTIONS.age')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Detail Data Warga</h3>
                <p class="text-subtitle text-muted">Menampilkan Informasi detail dari data warga yang dipilih</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('beranda')}}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Warga</li>
                        <li class="breadcrumb-item active" aria-current="page">Detail</li>
                    </ol>
                    <a href="{{ route('printDataWargaDetail', $users->id) }}" class="btn btn-sm btn-primary">
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
                        <h5>Data Diri - <b>{{ strtoupper($users->name) }}</b></h5>
                        <hr>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-2">
                                <div class="mb-3">
                                    @if(!empty($users->profile))
                                    <img src="{{ asset('template/custom/img_upload/profile/'.$users->profile) }}" alt="" style="width: 140px; height:140px; object-fit:cover; border: 1px solid #e9ecef;">
                                    @else
                                    <img src="{{asset('template/main/assets/images/faces/1.jpg')}}" alt="" style="width: 140px; height:140px; object-fit:cover; border: 1px solid #e9ecef;">
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="form-group">
                                    <label>Nomor KTP / NIK</label>
                                    <input type="text" class="form-control" value="{{ $users->nik ? $users->nik : 'Belum Diisi' }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" value="{{ $users->fullname ? $users->fullname : 'Belum Diisi' }}" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="form-group">
                                    <label>Nomor KK</label>
                                    <input type="text" class="form-control" value="{{ $users->no_kk ? $users->no_kk : 'Belum Diisi' }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Alamat Email</label>
                                    <input type="text" class="form-control" value="{{ $users->email }}" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="form-group">
                                    <label>Tempat / Tanggal Lahir</label>
                                    <input type="text" class="form-control" value="{{ $users->place_of_birth ? $users->place_of_birth : 'Belum Diisi' }} / {{ $users->date_of_birth ? tgl_indo($users->date_of_birth) : 'Belum Diisi' }}" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="form-group">
                                    <label>Usia</label>
                                    <input type="text" class="form-control" value="{{ $users->date_of_birth ? getAge($users->date_of_birth) : '-' }} Tahun" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <input type="text" class="form-control" value="{{ $users->gender ? $users->gender : 'Belum Diisi' }}" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="form-group">
                                    <label>Agama</label>
                                    <input type="text" class="form-control" value="{{ $users->religion ? $users->religion : 'Belum Diisi' }}" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <label>Detail Alamat</label>
                                    <textarea class="form-control" rows="2" readonly>{{ $users->detail_address ? $users->detail_address : "Belum Diisi" }}</textarea>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="form-group">
                                    <label>RT</label>
                                    <input type="text" class="form-control" value="{{ $users->rt ? $users->rt->number : 'Belum Diisi' }}" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label>Nomor Telepon</label>
                                    <input type="text" class="form-control" value="{{ $users->phone_number ? $users->phone_number : 'Belum Diisi' }}" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label>Pekerjaan</label>
                                    <input type="text" class="form-control" value="{{ $users->profession ? $users->profession : 'Belum Diisi' }}" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label>Pendidikan Terakhir</label>
                                    <input type="text" class="form-control" value="{{ $users->education ? $users->education : 'Belum Diisi' }}" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Status Hubungan Dalam Keluarga</label>
                                    <input type="text" class="form-control" value="{{ $users->family_status ? $users->family_status->f_status : 'Belum Diisi' }}" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Status Hubungan Dalam Kartu Keluarga</label>
                                    <input type="text" class="form-control" value="{{ $users->family_c_status ? $users->family_c_status->relationship : 'Belum Diisi' }}" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Status Hubungan Dalam Pernikahan</label>
                                    <input type="text" class="form-control" value="{{ $users->marital_status ? $users->marital_status->w_status : 'Belum Diisi' }}" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label>Jenis Rumah</label>
                                    <input type="text" class="form-control" value="{{ $users->house_type ? $users->house_type : 'Belum Diisi' }}" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label>Disabilitas</label>
                                    <input type="text" class="form-control" value="{{ $users->disabilitas ? $users->disabilitas : 'Belum Diisi' }}" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="form-group">
                                    <label>Level</label>
                                    <input type="text" class="form-control" value="{{ $users->level }}" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="form-group">
                                    <label>Bergabung Sejak</label>
                                    <input type="text" class="form-control" value="{{ $users->created_at }}" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="form-group">
                                    <label>Terakhir Kali Diperbarui</label>
                                    <input type="text" class="form-control" value="{{ $users->updated_at }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('JsCustom')
<script>
    $('#dataWargaLink').addClass('active')
</script>
@endsection