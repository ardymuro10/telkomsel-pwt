<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Dashboard' }} - {{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <livewire:styles />

    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @livewireStyles

</head>

<body class="sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom-0 d-flex align-items-center pt-md-3">
            <ul class="navbar-nav">
                <li class="nav-item d-block d-md-none">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-flex align-items-center">
                    <p class="h5 mb-0">Telkomsel Purwokerto Regional 4</p>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-light-primary">
            <div class="sidebar mt-0 d-flex flex-column">
                <div class="user-panel mt-3 pb-2 d-flex">
                    <div class="image">
                        <img src="https://ui-avatars.com/api/?background=EBF4FF&color=7F9CF4&name={{ auth()->user()->name }}" class="img-circle" alt="{{ auth()->user()->name }}">
                    </div>
                    <div class="info">
                        <a class="d-block font-weight-bold mb-2">{{ auth()->user()->name }}</a>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link {{ Route::is('home') ? 'active' : null }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item {{ Route::is('mail-monitoring.cover-letter') || Route::is('mail-monitoring.certificate') || Route::is('mail-monitoring.different-data') || Route::is('mail-monitoring.business-info') || Route::is('mail-monitoring.mail-poor') ? 'menu-open' : null }}">
                            <a href="#" class="nav-link {{ Route::is('mail-monitoring.cover-letter') || Route::is('mail-monitoring.certificate') || Route::is('mail-monitoring.different-data') || Route::is('mail-monitoring.business-info') || Route::is('mail-monitoring.mail-poor') ? 'active' : null }}">
                                <i class="nav-icon fas fa-envelope"></i>
                                <p>Monitoring Surat<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('mail-monitoring.cover-letter') }}" class="nav-link {{ Route::is('mail-monitoring.cover-letter') ? 'active' : null }}">
                                        <i class="far fa-circle nav-icon text-primary"></i>
                                        <p>Surat Pengantar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('mail-monitoring.certificate') }}" class="nav-link {{ Route::is('mail-monitoring.certificate') ? 'active' : null }}">
                                        <i class="far fa-circle nav-icon text-primary"></i>
                                        <p>Surat Keterangan Domisili</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('mail-monitoring.different-data') }}" class="nav-link {{ Route::is('mail-monitoring.different-data') ? 'active' : null }}">
                                        <i class="far fa-circle nav-icon text-primary"></i>
                                        <p>Surat Beda Data</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('mail-monitoring.business-info') }}" class="nav-link {{ Route::is('mail-monitoring.business-info') ? 'active' : null }}">
                                        <i class="far fa-circle nav-icon text-primary"></i>
                                        <p>Surat Keterangan Usaha</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('mail-monitoring.mail-poor') }}" class="nav-link {{ Route::is('mail-monitoring.mail-poor') ? 'active' : null }}">
                                        <i class="far fa-circle nav-icon text-primary"></i>
                                        <p>Surat Keterangan Miskin</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('death-person') }}" class="nav-link {{ Route::is('death-person') ? 'active' : null }}">
                                <i class="nav-icon fas fa-archway"></i>
                                <p>Data Orang Meninggal</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('public-complaints') }}" class="nav-link {{ Route::is('public-complaints') ? 'active' : null }}">
                                <i class="nav-icon fas fa-file-signature"></i>
                                <p>Pengaduan Masyarakat</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user-list') }}" class="nav-link {{ Route::is('user-list') ? 'active' : null }}">
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p>Daftar Pengguna</p>
                            </a>
                        </li> --}}
                        <li class="nav-item {{ Route::is('data.monitoring') || Route::is('data.data1') || Route::is('data.data2') || Route::is('data.eqp') || Route::is('data.tower') || Route::is('data.review') || Route::is('data.demografi') || Route::is('data.sales') ? 'menu-open' : null }}">
                            <a href="#" class="nav-link {{ Route::is('data.monitoring') || Route::is('data.data1') || Route::is('data.data2') || Route::is('data.eqp') || Route::is('data.tower') || Route::is('data.review') || Route::is('data.demografi') || Route::is('data.sales') ? 'active' : null }}">
                                <i class="nav-icon fas fa-folder"></i>
                                <p>Data<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                {{-- <li class="nav-item">
                                    <a href="{{ route('data.data1') }}" class="nav-link {{ Route::is('data.data1') ? 'active' : null }}">
                                        <i class="far fa-circle nav-icon text-primary"></i>
                                        <p>Data1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('data.data2') }}" class="nav-link {{ Route::is('data.data2') ? 'active' : null }}">
                                        <i class="far fa-circle nav-icon text-primary"></i>
                                        <p>Data2</p>
                                    </a>
                                </li> --}}
                                <li class="nav-item">
                                    <a href="{{ route('data.eqp') }}" class="nav-link {{ Route::is('data.eqp') ? 'active' : null }}">
                                        <i class="far fa-circle nav-icon text-primary"></i>
                                        <p>EQP</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('data.tower') }}" class="nav-link {{ Route::is('data.tower') ? 'active' : null }}">
                                        <i class="far fa-circle nav-icon text-primary"></i>
                                        <p>Tower</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('data.review') }}" class="nav-link {{ Route::is('data.review') ? 'active' : null }}">
                                        <i class="far fa-circle nav-icon text-primary"></i>
                                        <p>Review</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('data.demografi') }}" class="nav-link {{ Route::is('data.demografi') ? 'active' : null }}">
                                        <i class="far fa-circle nav-icon text-primary"></i>
                                        <p>Demografi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('data.sales') }}" class="nav-link {{ Route::is('data.sales') ? 'active' : null }}">
                                        <i class="far fa-circle nav-icon text-primary"></i>
                                        <p>Sales</p>
                                    </a>
                                </li>
                            </ul>
                            <li class="nav-item">
                                <a href="{{ route('monitoring') }}" class="nav-link {{ Route::is('monitoring') ? 'active' : null }}">
                                    <i class="nav-icon fas fa-pen-square"></i>
                                    <p>Monitoring</p>
                                </a>
                            </li>
                        </li>
                    </ul>
                </nav>
                <nav class="mt-auto">
                    <ul class="nav nav-pills nav-sidebar">
                        <li class="nav-item bg-danger rounded">
                            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Keluar</p>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <h1 class="m-0">{{ $title }}</h1>
                </div>
            </div>

            <div class="content">
                <div class="container-fluid">
                    {{ $slot }}
                </div>
            </div>
        </div>

        <footer class="main-footer text-sm">
            {{-- <div class="float-right d-none d-sm-inline">
                Pemerintah Desa Gumelem Wetan
            </div> --}}
            <strong>Copyright &copy; {{ date('Y') }} made with by <a class="text-primary font-weight-bold" href="https://t.me/Misa_Reamo" target="_blank">Ghozy</a>
                & <a class="text-primary font-weight-bold" href="https://t.me/adiknyahokage" target="_blank">Muro</a>.</strong> All rights
            reserved.
        </footer>
    </div>

    <livewire:scripts />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        window.addEventListener('modal-hide', event => {
            var target = event.detail.modal
            $('#'+target).modal('hide');
        })
        window.addEventListener('modal-show', event => {
            var target = event.detail.modal
            $('#'+target).modal('show');
        })
        window.addEventListener('show-notification', event => {
            var message = event.detail.message
            toastr.success(message)
        })
    </script>
    @livewireScripts

</body>

</html>
