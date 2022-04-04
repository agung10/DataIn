<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataIn</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('template/main/assets/css/bootstrap.css')}}">

    @yield('cssSpecific')

    <link rel="stylesheet" href="{{asset('template/main/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('template/main/assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('template/main/assets/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('template/main/assets/vendors/toastify/toastify.css')}}">
    <!-- <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon"> -->
</head>

<body>
    <div id="app">

        @include('layouts.components.sidebar')

        <header class="mb-3">
            <nav class="navbar navbar-expand navbar-light ">
                <div class="container-fluid">
                    <a href="#" class="burger-btn d-block d-xl-none">
                        <i class="bi bi-justify fs-3"></i>
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            {{-- <li class="nav-item dropdown me-1">
                                <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="bi bi-envelope bi-sub fs-4 text-gray-600"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <h6 class="dropdown-header">Mail</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#">No new mail</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown me-3">
                                <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="bi bi-bell bi-sub fs-4 text-gray-600"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <h6 class="dropdown-header">Notifications</h6>
                                    </li>
                                    <li><a class="dropdown-item">No notification available</a></li>
                                </ul>
                            </li> --}}
                        </ul>
                        <div class="dropdown">
                            <a href="#" data-bs-toggle="dropdown" aria-expanded="false" class="">
                                <div class="user-menu d-flex">
                                    <div class="user-name text-end me-3">
                                        <h6 class="mb-0 text-gray-600">
                                            @include('__FUNCTIONS.greeting'), {{ ucfirst(Auth::user()->name) }}
                                        </h6>
                                        @if(\Auth::user()->level == "Administrator")
                                        <p class="mb-0 text-sm text-gray-600">Administrator</p>
                                        @elseif(\Auth::user()->level == "RT")
                                        <p class="mb-0 text-sm text-gray-600">Ketua RT {{Auth::user()->rt_id}}</p>
                                        @elseif(\Auth::user()->level == "User")
                                        <p class="mb-0 text-sm text-gray-600">Pengguna</p>
                                        @endif
                                    </div>
                                    <div class="user-img d-flex align-items-center">
                                        <div class="avatar avatar-md">
                                            @if(!empty(Auth::user()->profile))
                                            <img src="{{ asset('template/custom/img_upload/profile/'.Auth::user()->profile) }}"
                                                alt="" style="object-fit:cover; border: 3px solid #e9ecef;">
                                            @else
                                            <img src="{{asset('template/main/assets/images/faces/1.jpg')}}" alt=""
                                                style="object-fit:cover; border: 3px solid #e9ecef;">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                                style="min-width: 11rem;">
                                <li>
                                    <h6 class="dropdown-header">
                                        Masuk!
                                        @include('__FUNCTIONS.time-ago-id')
                                        @php
                                        if(session('logged')){
                                        $v = session('logged');
                                        echo timeAgo($v);
                                        }
                                        @endphp
                                    </h6>
                                </li>
                                <div class="dropdown-divider"></div>
                                <li>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                        data-bs-target="#logoutModal">
                                        <i class="icon-mid bi bi-box-arrow-left me-2"></i>
                                        Keluar
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <div id="main">
            @yield('content')

            @include('layouts.components.footer')
        </div>
    </div>

    @include('layouts.components.logoutModal')
    @include('layouts.components.deleteModal')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('template/main/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('template/main/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('template/main/assets/vendors/toastify/toastify.js')}}"></script>

    @yield('JsSpecific')

    <script src="{{asset('template/main/assets/js/mazer.js')}}"></script>

    @include('layouts.alerts.notif')
    @yield('JsCustom')

    <script>
        $('.openModalDelete').on('click', function(e) {
            $('#modalDelete').modal('show');
            $('#deleteConf').attr('action', $(this).attr('data-uri'));
        });

        $(window).on('load', function() {
            $('#modalDataDiri').modal('show');
        });
    </script>
</body>

</html>