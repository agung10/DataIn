<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>DataIn | Aplikasi Pendataan Warga</title>

    <!-- Stylesheets -->
    <link href="{{asset('template/landing/assets/css/theme.css')}}" rel="stylesheet" />
    <link href="{{asset('template/custom/style.css')}}" rel="stylesheet" />

    <style>
        .nav-item .nav-link {
            color: #525a61 !important;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <!-- Main Content -->
    <main class="main" id="top">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" data-navbar-on-scroll="data-navbar-on-scroll">
            <div class="container">
                <a href="" class="d-flex align-items-center">
                    <img src="{{asset('template/custom/logo.png')}}" alt="Logo" style="width: 13%; object-fit:cover;">
                </a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto pt-2 pt-lg-0">
                        @if (Route::has('login'))
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('beranda') }}">Halaman Utama</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Masuk</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Daftar</a>
                        </li>
                        @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Section Body -->
        <section class="py-0" id="sec_body">
            <div class="bg-holder"></div>

            <div class="container position-relative">
                <div class="row align-items-center py-8">
                    <div class="col-md-5 col-lg-6 order-md-1 text-center text-md-end">
                        <img class="img-fluid" src="{{asset('template/landing/assets/img/welcome.png')}}" width="470" alt="Gambar Warga" />
                    </div>
                    <div class="col-md-7 col-lg-6 text-center text-md-start">
                        <span class="badge bg-light rounded-pill text-dark align-items-center d-flex flex-row-reverse justify-content-end mx-auto mx-md-0 ps-0 w-75 w-sm-50 w-md-75 w-xl-50 mb-3">
                            #Aplikasi Pendataan Warga
                            <img class="img-fluid float-start me-3" src="{{asset('template/landing/assets/img/illustrations/arrow-right.png')}}" alt="" />
                        </span>
                        <h1 class="mb-4 display-4 fw-bold lh-sm">
                            Aplikasi Terbaik
                            <br class="d-block d-lg-none d-xl-block" />
                            Untuk Warga Lebih Baik
                        </h1>
                        <p class="mt-3 mb-4 fs-1">
                            Tingkatkan produktivitas dengan aplikasi DataIn. 
                            <br class="d-none d-lg-block" />
                            Aplikasi untuk mengelola data warga sekitar.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Script -->
    <script src="{{asset('template/landing/assets/vendors/@popperjs/popper.min.js')}}"></script>
    <script src="{{asset('template/landing/assets/vendors/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{asset('template/landing/assets/vendors/is/is.min.js')}}"></script>
    <script src="{{asset('template/landing/assets/js/theme.js')}}"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400&amp;display=swap" rel="stylesheet">
</body>

</html>