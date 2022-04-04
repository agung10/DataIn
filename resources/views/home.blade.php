@extends('layouts.app')

@section('cssSpecific')
<link rel="stylesheet" href="{{asset('template/custom/style.css')}}">
<link rel="stylesheet" href="{{asset('template/main/assets/vendors/iconly/bold.css')}}">
@endsection

@section('content')
@include('__FUNCTIONS.age')

<div class="page-heading">
    <h3>Beranda</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                @if(Auth::user()->level != "Administrator")
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldUser1"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Jumlah Warga RT {{ Auth::user()->rt_id }}</h6>
                                    <h6 class="font-extrabold mb-0">{{ $jumlah_warga }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldPaper"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Jumlah Keluarga (Nomor KK)</h6>
                                    <h6 class="font-extrabold mb-0">{{ $jumlah_keluarga->count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-5 col-md-6">
                    <div class="card align-items-center text-white" style="background: linear-gradient(90deg, #4365cd, #435ebe);">
                        <div class="card-body" style="padding: 1.2rem;">
                            <div class="row">
                                <div class="mt-3">
                                    <p class="d-flex align-items-center fw-bold fs-3">
                                        <span id="date" style="margin-right: 5px;"></span>
                                        <span id="time"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldDocument"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Jumlah RT</h6>
                                    <h6 class="font-extrabold mb-0">{{ $jumlah_rt }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldUser1"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Jumlah Warga</h6>
                                    <h6 class="font-extrabold mb-0">{{ $jumlah_warga }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-5 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldPaper"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Jumlah Keluarga (Nomor KK)</h6>
                                    <h6 class="font-extrabold mb-0">{{ $jumlah_keluarga->count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-12 col-md-12">
                <div class="card card-purple">
                    <div class="card-body">
                        <div class="text-center">
                            <h3 class="text-white">{{$jumlah_kepala_keluarga}}</h3>
                            <h3 class="text-white">KEPALA KELUARGA</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Jumlah Data Warga Berdasarkan RT</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-profile-visit"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Kategori Usia</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered table-striped">
                                    <tr class="text-center">
                                        <th class="text-white" style="background-color: #435ebe;">Jenis Kelamin</th>
                                        <td>Laki-Laki</td>
                                        <td>Perempuan</td>
                                        <td class="text-white" style="background-color: #435ebe;">Jumlah</td>
                                    </tr>
                                    <tr class="text-center">
                                        <th class="text-white" style="background-color: #435ebe;">Warga</th>
                                        <td>
                                            <strong>
                                                {{ $genders->where("gender", "Laki - Laki")->count() }}
                                            </strong>
                                        </td>
                                        <td>
                                            <strong>
                                                {{ $genders->where("gender", "Perempuan")->count() }}
                                            </strong>
                                        </td>
                                        <td class="text-white" style="background-color: #435ebe;">
                                            <strong>
                                                {{ $genders->count() }}
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <span>Balita</span>
                                                </div>
                                                <div class="col-md-2">
                                                    <span class="badge alert-primary">0 Tahun</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="text-center">
                                            @php
                                                $balitaLaki = 0;
                                            @endphp
                                            @foreach($users as $res)
                                                @if(getAge($res->date_of_birth) < 5) 
                                                    @if($res->gender == "Laki - Laki")
                                                    @php
                                                        $balitaLaki++;
                                                    @endphp
                                                    @endif
                                                @endif
                                            @endforeach
                                            {{ $balitaLaki }}
                                        </td>
                                        <td class="text-center">
                                            @php
                                                $balitaPerempuan = 0;
                                            @endphp
                                            @foreach($users as $res)
                                                @if(getAge($res->date_of_birth) < 5) 
                                                    @if($res->gender == "Perempuan")
                                                        @php
                                                            $balitaPerempuan++;
                                                        @endphp
                                                    @endif
                                                @endif
                                            @endforeach
                                            {{ $balitaPerempuan }}
                                        </td>
                                        <td class="text-center text-white" style="background-color: #435ebe;">
                                            <b>{{ $balitaLaki + $balitaPerempuan }}</b>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <span>Anak</span>
                                                </div>
                                                <div class="col-md-2">
                                                    <span class="badge alert-primary">(5-11 Tahun)</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="text-center">
                                            @php
                                                $anakLaki = 0;
                                            @endphp
                                            @foreach($users as $res)
                                                @if(getAge($res->date_of_birth) >= 5 && getAge($res->date_of_birth) <= 11)
                                                    @if($res->gender == "Laki - Laki")
                                                    @php
                                                        $anakLaki++;
                                                    @endphp
                                                    @endif
                                                @endif
                                            @endforeach
                                            {{ $anakLaki }}
                                        </td>
                                        <td class="text-center">
                                            @php
                                                $anakPerempuan = 0;
                                            @endphp
                                            @foreach($users as $res)
                                                @if(getAge($res->date_of_birth) >= 5 && getAge($res->date_of_birth) <= 11)
                                                    @if($res->gender == "Perempuan")
                                                        @php
                                                            $anakPerempuan++;
                                                        @endphp
                                                    @endif
                                                @endif
                                            @endforeach
                                            {{ $anakPerempuan }}
                                        </td>
                                        <td class="text-center text-white" style="background-color: #435ebe;">
                                            <b>{{ $anakLaki + $anakPerempuan }}</b>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <span>Remaja</span>
                                                </div>
                                                <div class="col-md-2">
                                                    <span class="badge alert-primary">Awal-Akhir (12-25 Tahun)</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="text-center">
                                            @php
                                                $remajaLaki = 0;
                                            @endphp
                                            @foreach($users as $res)
                                                @if(getAge($res->date_of_birth) >= 12 && getAge($res->date_of_birth) <= 25) 
                                                    @if($res->gender == "Laki - Laki")
                                                        @php
                                                            $remajaLaki++;
                                                        @endphp
                                                    @endif
                                                @endif
                                            @endforeach
                                            {{ $remajaLaki }}
                                        </td>
                                        <td class="text-center">
                                            @php
                                                $remajaPerempuan = 0;
                                            @endphp
                                            @foreach($users as $res)
                                                @if(getAge($res->date_of_birth) >= 12 && getAge($res->date_of_birth) <= 25) 
                                                    @if($res->gender == "Perempuan")
                                                        @php
                                                            $remajaPerempuan++;
                                                        @endphp
                                                    @endif
                                                @endif
                                            @endforeach
                                            {{ $remajaPerempuan }}
                                        </td>
                                        <td class="text-center text-white" style="background-color: #435ebe;">
                                            <b>{{ $remajaLaki + $remajaPerempuan }}</b>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <span>Dewasa</span>
                                                </div>
                                                <div class="col-md-2">
                                                    <span class="badge alert-primary">Awal-Akhir (26-45 Tahun)</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="text-center">
                                            @php
                                                $dewasaLaki = 0;
                                            @endphp
                                            @foreach($users as $res)
                                                @if(getAge($res->date_of_birth) >= 26 && getAge($res->date_of_birth) <=45) 
                                                    @if($res->gender == "Laki - Laki")
                                                        @php
                                                            $dewasaLaki++;
                                                        @endphp
                                                        @endif
                                                    @endif
                                            @endforeach
                                            {{ $dewasaLaki }}
                                        </td>
                                        <td class="text-center">
                                            @php
                                                $dewasaPerempuan = 0;
                                            @endphp
                                            @foreach($users as $res)
                                                @if(getAge($res->date_of_birth) >= 26 && getAge($res->date_of_birth) <= 45) 
                                                    @if($res->gender == "Perempuan")
                                                        @php
                                                            $dewasaPerempuan++;
                                                        @endphp
                                                    @endif
                                                @endif
                                            @endforeach
                                            {{ $dewasaPerempuan }}
                                        </td>
                                        <td class="text-center text-white" style="background-color: #435ebe;">
                                            <b>{{ $dewasaLaki + $dewasaPerempuan }}</b>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <span>Lansia</span>
                                                </div>
                                                <div class="col-md-2">
                                                    <span class="badge alert-primary"> Awal-Akhir (46-65 Tahun)</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="text-center">
                                            @php
                                                $lansiaLaki = 0;
                                            @endphp
                                            @foreach($users as $res)
                                                @if(getAge($res->date_of_birth) >= 46 && getAge($res->date_of_birth) <=65) 
                                                    @if($res->gender == "Laki - Laki")
                                                        @php
                                                            $lansiaLaki++;
                                                        @endphp
                                                    @endif
                                                @endif
                                            @endforeach
                                            {{ $lansiaLaki }}
                                        </td>
                                        <td class="text-center">
                                            @php
                                                $lansiaPerempuan = 0;
                                            @endphp
                                            @foreach($users as $res)
                                                @if(getAge($res->date_of_birth) >= 46 && getAge($res->date_of_birth) <=65) 
                                                    @if($res->gender == "Perempuan")
                                                        @php
                                                            $lansiaPerempuan++;
                                                        @endphp
                                                    @endif
                                                @endif
                                            @endforeach
                                            {{ $lansiaPerempuan }}
                                        </td>
                                        <td class="text-center text-white" style="background-color: #435ebe;">
                                            <b>{{ $lansiaLaki + $lansiaPerempuan }}</b>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Pendidikan Warga</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered">
                                    <tbody>
                                        <tr class="text-center">
                                            <th class="text-white" style="background-color: #435ebe;">Jenjang Pendidikan</th>
                                            <th class="text-white" style="background-color: #435ebe;" colspan="2">Jumlah</th>
                                        </tr>
                                        <tr>
                                            <th>Tidak Sekolah</th>
                                            <td class="text-center text-white" style="background-color: #435ebe;"><b>{{ $educations->where("education", "Tidak Sekolah")->count() }}</b></td>
                                        </tr>
                                        <tr>
                                            <th>SD</th>
                                            <td class="text-center text-white" style="background-color: #435ebe;"><b>{{ $educations->where("education", "SD")->count() }}</b></td>
                                        </tr>
                                        <tr>
                                            <th>SMA/SLTA Sederajat</th>
                                            <td class="text-center text-white" style="background-color: #435ebe;"><b>{{ $educations->where("education", "SMA/SLTA Sederajat")->count() }}</b></td>
                                        </tr>
                                        <tr>
                                            <th>SMK/MAK</th>
                                            <td class="text-center text-white" style="background-color: #435ebe;"><b>{{ $educations->where("education", "SMK/MAK")->count() }}</b></td>
                                        </tr>
                                        <tr>
                                            <th>D1-D4</th>
                                            <td class="text-center text-white" style="background-color: #435ebe;"><b>{{ $educations->where("education", "D1-D4")->count()}}</b></td>
                                        </tr>
                                        <tr>
                                            <th>S1-S3</th>
                                            <td class="text-center text-white" style="background-color: #435ebe;"><b>{{ $educations->where("education", "S1-S3")->count()}}</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <div class="alert alert-primary">
                        <div class="alert-body">
                            <p class="text-white text-center">
                                Catatan : Hasil perhitungan ini dipengaruhi oleh kelengkapan data yang ada terutama
                                Tanggal lahir, Jenis kelamin, dan Pendidikan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('layouts.components.modalWarning')
@endsection

@section('JsSpecific')
<script src="{{asset('template/main/assets/vendors/apexcharts/apexcharts.js')}}"></script>
<script src="{{asset('template/main/assets/js/pages/dashboard.js')}}"></script>
@endsection

@section('JsCustom')
<script>
    $('#berandaLink').addClass('active');

    // Chart
    let warga = JSON.parse('{!! $warga !!}')
    let rt = JSON.parse('{!! $rt !!}')

    var optionsProfileVisit = {
        annotations: {
            position: 'back'
        },
        dataLabels: {
            enabled:false
        },
        chart: {
            type: 'bar',
            height: 300
        },
        fill: {
            opacity:1
        },
        plotOptions: {
        },
        series: [{
            name: 'Warga',
            data: warga
        }],
        colors: '#435ebe',
        xaxis: {
            categories: rt,
        },
        yaxis: [{
            labels: {
                formatter: function(val) {
                    return val.toFixed(0);
                }
            }
        }]
    }

    var chartProfileVisit = new ApexCharts(document.querySelector("#chart-profile-visit"), optionsProfileVisit);
    chartProfileVisit.render();
    // EndChart

    // Time
    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    var date = new Date();
    var day = date.getDate();
    var month = date.getMonth();
    var year = date.getFullYear();

    document.getElementById("date").innerHTML =" " + day + " " + months[month] + " " + year + ",";
    // EndDate

    // Time
    function showTime() {
        var a_p = "";
        var today = new Date();
        var curr_hour = today.getHours();
        var curr_minute = today.getMinutes();
        var curr_second = today.getSeconds();
        if (curr_hour < 12) {
            a_p = "AM";
        } else {
            a_p = "PM";
        }
        if (curr_hour == 0) {
            curr_hour = 24;
        }
        if (curr_hour > 24) {
            curr_hour = curr_hour - 24;
        }
        curr_hour = checkTime(curr_hour);
        curr_minute = checkTime(curr_minute);
        curr_second = checkTime(curr_second);
        document.getElementById('time').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
    }
    
    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }
    setInterval(showTime, 500);	
</script>
@endsection