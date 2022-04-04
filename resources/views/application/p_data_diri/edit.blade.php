@extends('layouts.app')

@section('cssSpecific')
<link href="{{asset('template/custom/libs/dropify/dropify.min.css')}}" rel="stylesheet" />
@endsection

@section('content')
@include('__FUNCTIONS.age')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Diri</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('beranda')}}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Diri</li>
                    </ol>
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
                    <form method="POST" action="{{ route('data_diri.update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <div class="mb-2" style="margin-top: -30px;">
                                        @if(!empty($user->profile))
                                        <input name="profile" type="file" class="dropify"
                                            data-default-file="{{ asset('template/custom/img_upload/profile/'.$user->profile) }}" />
                                        @else
                                        <input name="profile" type="file" class="dropify"
                                            data-default-file="{{asset('template/main/assets/images/faces/1.jpg')}}"
                                            alt="Foto {{$user->name}}">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label>Nomor KTP / NIK</label>
                                        @if($user->nik != null)
                                        <input type="text" name="nik" class="form-control"
                                            value="{{ $user->nik ? $user->nik : '' }}" onkeypress="return isNumber(event)"
                                            readonly>
                                        @else
                                        <input type="text" name="nik"
                                            class="form-control @error('nik') is-invalid @enderror"
                                            value="{{ $user->nik ? $user->nik : '' }}" onkeypress="return isNumber(event)">
                                        @endif

                                        @error('nik')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" name="fullname"
                                            class="form-control @error('fullname') is-invalid @enderror"
                                            value="{{ $user->fullname ? $user->fullname : '' }}">

                                        @error('fullname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-5">
                                    <div class="form-group">
                                        <label>Nomor KK</label>
                                        <input type="text" name="no_kk"
                                            class="form-control @error('no_kk') is-invalid @enderror"
                                            value="{{ $user->no_kk ? $user->no_kk : '' }}"
                                            onkeypress="return isNumber(event)">

                                        @error('no_kk')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Alamat Email</label>
                                        <input type="text" class="form-control"
                                            value="{{ $user->email ? $user->email : '' }}" readonly>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input type="text" name="place_of_birth"
                                            class="form-control @error('place_of_birth') is-invalid @enderror"
                                            value="{{ $user->place_of_birth ? $user->place_of_birth : '' }}">

                                        @error('place_of_birth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" name="date_of_birth"
                                            class="form-control @error('date_of_birth') is-invalid @enderror"
                                            value="{{ $user->date_of_birth ? $user->date_of_birth : '' }}">

                                        @error('date_of_birth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" col-12 col-md-2">
                                    <div class="form-group">
                                        <label>Usia</label>
                                        <input type="text" class="form-control"
                                            value="{{ $user->date_of_birth ? getAge($user->date_of_birth) : '-' }} Tahun"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select class="form-select @error('gender') is-invalid @enderror" name="gender">
                                            <option value="" selected disabled>Pilih jenis kelamin</option>
                                            <?php $gender = ['Laki - Laki', 'Perempuan']; ?>
                                            @foreach($gender as $key)
                                            @if($user->gender == $key)
                                            <option value="{{ $key }}" selected> {{ $key }} </option>
                                            @else
                                            <option value="{{ $key }}"> {{ $key }} </option>
                                            @endif
                                            @endforeach
                                        </select>

                                        @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-2">
                                    <div class="form-group">
                                        <label>Agama</label>
                                        <input type="text" name="religion"
                                            class="form-control @error('religion') is-invalid @enderror"
                                            value="{{ $user->religion ? $user->religion : '' }}">

                                        @error('religion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label>Detail Alamat</label>
                                        <textarea name="detail_address"
                                            class="form-control @error('detail_address') is-invalid @enderror"
                                            rows="2">{{$user->detail_address ? $user->detail_address : ''}}</textarea>

                                        @error('detail_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-2">
                                    <div class="form-group">
                                        <label>RT</label>
                                        <select class="form-select @error('rt_id') is-invalid @enderror" name="rt_id">
                                            <option value="" selected disabled>Pilih RT</option>
                                            @foreach($rt as $key)
                                            @if($user->rt_id == $key->id)
                                            <option value="{{ $key->id }}" selected>{{ $key->number }}</option>
                                            @else
                                            <option value="{{ $key->id }}">{{ $key->number }}</option>
                                            @endif
                                            @endforeach
                                        </select>

                                        @error('rt_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label>Nomor Telepon</label>
                                        <input type="text" name="phone_number"
                                            class="form-control @error('phone_number') is-invalid @enderror"
                                            value="{{ $user->phone_number ? $user->phone_number : '' }}"
                                            onkeypress="return isNumber(event)">

                                        @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label>Pekerjaan</label>
                                        <input type="text" name="profession"
                                            class="form-control @error('profession') is-invalid @enderror"
                                            value="{{ $user->profession ? $user->profession : '' }}">

                                        @error('profession')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label>Pendidikan Terakhir</label>
                                        <select class="form-select @error('education') is-invalid @enderror"
                                            name="education">
                                            <option value="" selected disabled>Pilih pendidikan terakhir</option>

                                            <?php $education = ['Tidak Sekolah', 'SD', 'SMA/SLTA Sederajat', 'SMK/MAK', 'D1-D4', 'S1-S3']; ?>
                                            @foreach($education as $key)
                                            @if($user->education == $key)
                                            <option value="{{ $key }}" selected> {{ $key }} </option>
                                            @else
                                            <option value="{{ $key }}"> {{ $key }} </option>
                                            @endif
                                            @endforeach
                                        </select>

                                        @error('education')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Status Hubungan Dalam Keluarga</label>
                                        <select class="form-select @error('family_id') is-invalid @enderror"
                                            name="family_id">
                                            <option value="" selected disabled>Pilih status hubungan dalam keluarga</option>
                                            @foreach($family_statuses as $key)
                                            @if($user->family_id == $key->id)
                                            <option value="{{ $key->id }}" selected>{{ $key->f_status }}</option>
                                            @else
                                            <option value="{{ $key->id }}">{{ $key->f_status }}</option>
                                            @endif
                                            @endforeach
                                        </select>

                                        @error('family_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Status Hubungan Dalam Kartu Keluarga</label>
                                        <select class="form-select @error('family_c_id') is-invalid @enderror"
                                            name="family_c_id">
                                            <option value="" selected disabled>Pilih status hubungan dalam kartu keluarga
                                            </option>
                                            @foreach($family_c_statuses as $key)
                                            @if($user->family_c_id == $key->id)
                                            <option value="{{ $key->id }}" selected>{{ $key->relationship }}</option>
                                            @else
                                            <option value="{{ $key->id }}">{{ $key->relationship }}</option>
                                            @endif
                                            @endforeach
                                        </select>

                                        @error('family_c_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Status Hubungan Dalam Pernikahan</label>
                                        <select class="form-select @error('marital_id') is-invalid @enderror"
                                            name="marital_id">
                                            <option value="" selected disabled>Pilih status hubungan dalam pernikahan
                                            </option>
                                            @foreach($marital_statuses as $key)
                                            @if($user->marital_id == $key->id)
                                            <option value="{{ $key->id }}" selected>{{ $key->w_status }}</option>
                                            @else
                                            <option value="{{ $key->id }}">{{ $key->w_status }}</option>
                                            @endif
                                            @endforeach
                                        </select>

                                        @error('marital_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label>Jenis Rumah</label>
                                        <select class="form-select @error('house_type') is-invalid @enderror"
                                            name="house_type">
                                            <option value="" selected disabled>Pilih jenis rumah</option>
                                            <?php $house_type = ['Milik Pribadi', 'Bukan Milik Pribadi']; ?>
                                            @foreach($house_type as $key)
                                            @if($user->house_type == $key)
                                            <option value="{{ $key }}" selected> {{ $key }} </option>
                                            @else
                                            <option value="{{ $key }}"> {{ $key }} </option>
                                            @endif
                                            @endforeach
                                        </select>

                                        @error('house_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label>Disabilitas</label>
                                        <select class="form-select @error('disabilitas') is-invalid @enderror"
                                            name="disabilitas">
                                            <option value="" selected disabled>Pilih kondisi</option>
                                            <?php $disabilitas = ['Iya', 'Tidak']; ?>
                                            @foreach($disabilitas as $key)
                                            @if($user->disabilitas == $key)
                                            <option value="{{ $key }}" selected> {{ $key }} </option>
                                            @else
                                            <option value="{{ $key }}"> {{ $key }} </option>
                                            @endif
                                            @endforeach
                                        </select>

                                        @error('disabilitas')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <button class="btn btn-primary me-1 mb-1" onclick="return confirm('Pastikan kembali data yang diisi telah sesuai, karena data isian NIK tidak dapat diubah lagi. Hubungi Ketua RT setempat untuk meminta perubahan apabila terjadi kesalahan.')">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('JsSpecific')
<!-- dropify js -->
<script src="{{asset('template/custom/libs/dropify/dropify.min.js')}}"></script>
<!-- form-upload init -->
<script src="{{asset('template/custom/libs/form-fileupload.init.js')}}"></script>
@endsection

@section('JsCustom')
<script>
    $('#dataDiriLink').addClass('active')

    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
</script>
@endsection