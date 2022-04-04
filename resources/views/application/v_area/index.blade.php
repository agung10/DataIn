@extends('layouts.app')

@section('cssSpecific')
<link href="{{asset('template/custom/libs/dropify/dropify.min.css')}}" rel="stylesheet" />
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Informasi Wilayah</h3>
                <p class="text-subtitle text-muted">Informasi mengenai wilayah dari penerapan aplikasi.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('beranda')}}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Informasi Wilayah</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
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
                            <input name="picture" type="file" class="dropify" data-default-file="{{ asset('template/custom/img_upload/area/'.$area_information->picture) }}" disabled />
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
                                <label for="disabledInput">Nama Wilayah</label>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control" id="readonlyInput" readonly="readonly" value="{{$area_information->name}}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-person"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-5">
                                <label for="disabledInput">Nomor Telepon</label>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control" id="readonlyInput" readonly="readonly" value="{{$area_information->phone}}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-phone"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-9">
                                <label for="disabledInput">Detail Alamat</label>
                                <div class="form-group position-relative has-icon-left">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" spellcheck="false" id="readonlyInput" readonly="readonly">{{$area_information->address_details}}</textarea>
                                    <div class="form-control-icon">
                                        <i class="bi bi-map"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <label for="disabledInput">Kode Pos</label>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control" id="readonlyInput" readonly="readonly" value="{{$area_information->postal_code}}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-code"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <label for="disabledInput">Keterangan</label>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control" id="readonlyInput" readonly="readonly" value="{{$area_information->description}}">
                                    <div class="form-control-icon">
                                        <i class="bi bi-fonts"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            @if($area_information != null)
                            <a href="{{ route('informasi_wilayah.edit', $area_information->id) }}" class="btn btn-primary me-1 mb-1">Ubah Informasi Wilayah</a>
                            @endif
                        </div>
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
    $('#areaLink').addClass('active');
</script>
@endsection()