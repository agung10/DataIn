<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo text-center">
                    <a href="">
                        <img src="{{asset('template/custom/logo-2.png')}}" alt="Logo" style="width: 60%; height: 60%; object-fit:cover;">
                    </a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <div class="align-items-center" style="text-align: center;">
                    <div class="avatar avatar-xl">
                        @if(!empty(Auth::user()->profile))
                            <img src="{{ asset('template/custom/img_upload/profile/'.Auth::user()->profile) }}" alt="" style="object-fit:cover; border: 3px solid #e9ecef;">
                        @else
                            <img src="{{asset('template/main/assets/images/faces/1.jpg')}}" alt="" style="object-fit:cover; border: 3px solid #e9ecef;">
                        @endif
                    </div>
                </div>

                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-person-fill"></i>
                        @if(\Auth::user()->level == "Administrator")
                        <span>Administrator</span>
                        @elseif(\Auth::user()->level == "RT")
                        <span>Ketua RT {{Auth::user()->rt_id}}</span>
                        @elseif(\Auth::user()->level == "User")
                        <span>Pengguna</span>
                        @endif
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">Keluar</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-title">Halaman Utama</li>

                <li class="sidebar-item" id="berandaLink">
                    <a href="{{ route('beranda') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Beranda</span>
                    </a>
                </li>

                @if(\Auth::user()->level == "Administrator" || \Auth::user()->level == "RT")
                @if(Auth::user()->level == "Administrator")
                <li class="sidebar-title">Manajemen Administrator</li>
                @elseif(Auth::user()->level == "RT")
                <li class="sidebar-title">Manajemen Ketua RT</li>
                @endif

                <li class="sidebar-item " id="areaLink">
                    <a href="{{route('informasi_wilayah.index')}}" class='sidebar-link'>
                        <i class="bi bi-map-fill"></i>
                        <span>Informasi Wilayah</span>
                    </a>
                </li>

                @if(Auth::user()->level == "Administrator")
                <li class="sidebar-item " id="rtLink">
                    <a href="{{route('rukun_tetangga.index')}}" class='sidebar-link'>
                        <i class="bi bi-plus-square-fill"></i>
                        <span>Daftar RT</span>
                    </a>
                </li>
                @endif

                <li class="sidebar-item has-sub" id="statusLink">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-file-earmark-medical-fill"></i>
                        <span>Status</span>
                    </a>
                    <ul class="submenu" id="submenuLink">
                        <li class="submenu-item" id="keluargaLink">
                            <a href="{{ route('status_keluarga.index') }}">Hubungan Dalam Keluarga</a>
                        </li>
                        <li class="submenu-item" id="kkLink">
                            <a href="{{ route('status_kartu_keluarga.index') }}">Hubungan Dalam Kartu Keluarga</a>
                        </li>
                        <li class="submenu-item" id="pernikahanLink">
                            <a href="{{ route('status_pernikahan.index') }}">Hubungan Dalam Pernikahan</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item " id="penggunaLink">
                    <a href="{{route('pengguna.index')}}" class='sidebar-link'>
                        <i class="bi bi-people-fill"></i>
                        <span>Pengguna</span>
                    </a>
                </li>

                <li class="sidebar-item " id="dataWargaLink">
                    <a href="{{route('data_warga.index')}}" class='sidebar-link'>
                        <i class="bi bi-file-person-fill"></i>
                        <span>Data Warga</span>
                    </a>
                </li>

                <li class="sidebar-item " id="kepalaKeluargaLink">
                    <a href="{{route('cariKepalaKeluarga')}}" class='sidebar-link'>
                        <i class="bi bi-person-circle"></i>
                        <span>Kepala Keluarga</span>
                    </a>
                </li>

                <li class="sidebar-title">Laporan Data Warga</li>

                <li class="sidebar-item ">
                    <a href="{{ route('printDataWarga') }}" class='sidebar-link'>
                        <i class="bi bi-people-fill"></i>
                        <span>Seluruh Data Warga</span>
                    </a>
                </li>

                @elseif(\Auth::user()->level == "User")
                <li class="sidebar-title">Manajemen Pengguna</li>

                <li class="sidebar-item " id="penggunaLink">
                    <a href="{{route('pengguna.index')}}" class='sidebar-link'>
                        <i class="bi bi-people-fill"></i>
                        <span>Pengguna Lainnya</span>
                    </a>
                </li>

                <li class="sidebar-item " id="dataDiriLink">
                    <a href="{{route('data_diri.index')}}" class='sidebar-link'>
                        <i class="bi bi-file-person-fill"></i>
                        <span>Data Diri</span>
                    </a>
                </li>

                {{-- <li class="sidebar-item ">
                    <a href="index.html" class='sidebar-link'>
                        <i class="bi bi-plus-square-fill"></i>
                        <span>Buat Laporan</span>
                    </a>
                </li> --}}
                @endif
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>