<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Warga</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('template/main/assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('template/main/assets/css/app.css')}}">
</head>
<body style="background-color: #fff !important;">
    <section class="section">
        <div class="d-flex flex-column text-left">
            <div class="d-flex justify-content-center ">
                <img style="width:15%;" src="{{asset('template/custom/logo-2.png')}}" alt="{{ $area_information->name }}">
            </div>
            <div class="w-full text-center d-flex justify-content-center flex-column">
                <h2>{{ $area_information->name }}</h2>
                <p>{{ $area_information->address_details }}</p>
            </div>
            <div class="text-center mt-3 mb-2">
                <h4 style="color: #435ebe;"><b>Laporan Seluruh Data Warga</b></h4>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered mb-0 ">
                    <thead>
                        <tr class="text-center" style="background-color: #eee;">
                            <th style="width: 10px;">No</th>
                            <th>NIK</th>
                            <th>Nomor KK</th>
                            <th>Nama Lengkap</th>
                            <th>Tanggal Lahir</th>
                            <th>Agama</th>
                            <th>Jenis Kelamin</th>
                            <th>Pendidikan</th>
                            <th>Pekerjaan</th>
                            <th>RT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @include('__FUNCTIONS.tanggal_indo')
                        @foreach ($users as $res)
                        <tr class="text-center">
                            <td>{{$loop->iteration}}</td>
                            <td>{{$res->nik ? $res->nik : "Belum Diisi"}}</td>
                            <td>{{$res->no_kk ? $res->no_kk : "Belum Diisi"}}</td>
                            <td>{{$res->fullname ? $res->fullname : "Belum Diisi"}} </td>
                            <td>{{$res->date_of_birth ? tgl_indo($res->date_of_birth) : "Belum Diisi"}}</td>
                            <td>{{$res->religion ? $res->religion : "Belum Diisi"}}</td>
                            <td>{{$res->gender ? $res->gender : "Belum Diisi"}}</td>
                            <td>{{$res->education ? $res->education : "Belum Diisi"}}</td>
                            <td>{{$res->profession ? $res->profession : "Belum Diisi"}}</td>
                            <td>{{$res->rt ? $res->rt->number : "Belum Diisi"}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <script>
        window.print();  
    </script>
</body>
</html>