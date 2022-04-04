<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Diri</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('template/main/assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('template/main/assets/css/app.css')}}">
</head>
<body style="background-color: #fff !important;">
    @include('__FUNCTIONS.tanggal_indo')
    @include('__FUNCTIONS.age')

    <section class="section">
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card" style="align-items: center; display: flex; margin-top: 10%; border: 1.5px solid #607080;">
                    <div class="card-header">
                        <h5 class="text-center">DATA DIRI</b></h5>
                    </div>
                    <div class="card-body mt-3">
                        <div class="row">
                            <div class="col-md-3 text-center mb-5" style="margin-right: 100px;">
                                @if(!empty($users->profile))
                                    <img src="{{ asset('template/custom/img_upload/profile/'.$users->profile) }}" alt="" style="width: 230px; height:230px; object-fit:cover;">
                                @else
                                    <img src="{{asset('template/main/assets/images/faces/1.jpg')}}" alt="" style="width: 230px; height:230px; object-fit:cover;">
                                @endif
                            </div>
                            <div class="col-md-7">
                                <div class="table-responsive">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <div class="row">
                                                    <th class="col-md-5">NIK</th>
                                                    <th class="col-md-1" style="padding-right: 10px;">:</th>
                                                    <th>{{ $users->nik ? $users->nik : 'Belum Diisi' }}</th>
                                                </div>
                                            </tr>
                                            <tr>
                                                <div class="row">
                                                    <td class="col-md-5">Nama Lengkap</td>
                                                    <td class="col-md-1" style="padding-right: 10px;">:</td>
                                                    <td>{{ $users->fullname ? $users->fullname : 'Belum Diisi' }}</td>
                                                </div>
                                            </tr>
                                            <tr>
                                                <div class="row">
                                                    <td class="col-md-5">Tempat / Tgl Lahir</td>
                                                    <td class="col-md-1" style="padding-right: 10px;">:</td>
                                                    <td>{{ $users->place_of_birth ? $users->place_of_birth : 'Belum Diisi' }} / {{ $users->date_of_birth ? tgl_indo($users->date_of_birth) : 'Belum Diisi' }}</td>
                                                </div>
                                            </tr>
                                            <tr>
                                                <div class="row">
                                                    <td class="col-md-5">Jenis Kelamin</td>
                                                    <td class="col-md-1" style="padding-right: 10px;">:</td>
                                                    <td>{{ $users->gender ? $users->gender : 'Belum Diisi' }}</td>
                                                </div>
                                            </tr>
                                            <tr>
                                                <div class="row">
                                                    <td class="col-md-5">Agama</td>
                                                    <td class="col-md-1" style="padding-right: 10px;">:</td>
                                                    <td>{{ $users->religion ? $users->religion : 'Belum Diisi' }}</td>
                                                </div>
                                            </tr>
                                            <tr>
                                                <div class="row">
                                                    <td class="col-md-5">Status Perkawinan</td>
                                                    <td class="col-md-1" style="padding-right: 10px;">:</td>
                                                    <td>{{ $users->marital_status ? $users->marital_status->w_status : 'Belum Diisi' }}</td>
                                                </div>
                                            </tr>
                                            <tr>
                                                <div class="row">
                                                    <td class="col-md-5">Pekerjaan</td>
                                                    <td class="col-md-1" style="padding-right: 10px;">:</td>
                                                    <td>{{ $users->profession ? $users->profession : 'Belum Diisi' }}</td>
                                                </div>
                                            </tr>
                                            <tr>
                                                <div class="row">
                                                    <td class="col-md-5">Bergabung Sejak</td>
                                                    <td class="col-md-1" style="padding-right: 10px;">:</td>
                                                    <td>{{ $users->created_at ? $users->created_at : 'Belum Diisi' }}</td>
                                                </div>
                                            </tr>
                                            <tr>
                                                <div class="row">
                                                    <td class="col-md-5">Detail Alamat</td>
                                                    <td class="col-md-1" style="padding-right: 10px;">:</td>
                                                    <td>{{ $users->detail_address ? $users->detail_address : 'Belum Diisi' }}</td>
                                                </div>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        window.print();  
    </script>
</body>
</html>