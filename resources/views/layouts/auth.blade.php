<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataIn | Aplikasi Pendataan Warga</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('template/main/assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('template/main/assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('template/main/assets/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('template/main/assets/css/pages/auth.css')}}">
    <link rel="stylesheet" href="{{asset('template/main/assets/vendors/toastify/toastify.css')}}">
</head>

<body>
    <div id="auth">
        <div class="row h-100">
            @yield('content')
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

<script src="{{asset('template/main/assets/vendors/toastify/toastify.js')}}"></script>
@include('layouts.alerts.notif')

</html>