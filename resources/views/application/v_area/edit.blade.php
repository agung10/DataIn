@extends('layouts.app')

@section('cssSpecific')
<link href="{{asset('template/custom/libs/dropify/dropify.min.css')}}" rel="stylesheet" />
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Ubah Informasi Wilayah</h3>
                <p class="text-subtitle text-muted">Informasi mengenai wilayah dari penerapan aplikasi.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('beranda')}}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Informasi Wilayah</li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <form method="POST" action="{{ route('informasi_wilayah.update', $area_information->id) }}" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="text-center">Foto {{$area_information->name}}</h5>
                            <hr>
                        </div>
                        <div class="card-body">
                            <div class="fallback" style="margin-top: -20px;">
                                @if(!empty($area_information->picture))
                                <input name="picture" type="file" class="dropify" data-default-file="{{ asset('template/custom/img_upload/area/'.$area_information->picture) }}" />
                                @else
                                <input name="picture" type="file" class="dropify" data-default-file="https://fashionsista.co/wallpaper/wallpaper/20201002/koleksi-gambar-wallpaper-hd-keren-terbaru-galeri-foto-preview.jpg" alt="Foto {{$area_information->name}}">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-7">
                                    <label>Nama Wilayah</label>
                                    <div class="form-group position-relative has-icon-left">
                                        <div class="form-control-icon">
                                            <i class="bi bi-house"></i>
                                        </div>
                                        <input type="text" class="form-control" name="name" value="{{$area_information->name}}" required placeholder="Masukkan nama wilayah">
                                    </div>
                                </div>
                                <div class="col-12 col-md-5">
                                    <label>Nomor Telepon</label>
                                    <div class="form-group position-relative has-icon-left">
                                        <input type="text" class="form-control" name="phone" value="{{$area_information->phone}}" required placeholder="Masukkan nomor telepon" onkeypress="return isNumber(event)">
                                        <div class="form-control-icon">
                                            <i class="bi bi-phone"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-9">
                                    <label>Detail Alamat</label>
                                    <div class="form-group position-relative has-icon-left">
                                        <textarea class="form-control" name="address_details" rows="1" spellcheck="false" id="readonlyInput" required placeholder="Masukkan detail alamat">{{$area_information->address_details}}</textarea>
                                        <div class="form-control-icon">
                                            <i class="bi bi-map"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <label>Kode Pos</label>
                                    <div class="form-group position-relative has-icon-left">
                                        <input type="text" class="form-control" name="postal_code" value="{{$area_information->postal_code}}" required placeholder="Masukkan kode pos" onkeypress="return isNumber(event)">
                                        <div class="form-control-icon">
                                            <i class="bi bi-code"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <label>Keterangan</label>
                                    <div class="form-group position-relative has-icon-left">
                                        <input type="text" class="form-control" name="description" value="{{$area_information->description}}" required placeholder="Masukkan keterangan (Tidak Wajib Diisi)">
                                        <div class="form-control-icon">
                                            <i class="bi bi-fonts"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Simpan Informasi Wilayah</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
    $('#areaLink').addClass('active');

    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
</script>
@endsection()