<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('APP_TITLE','LARAVEL APP') }}</title>
    <link rel="shortcut icon" type="image/jpg" href="{{asset(env('APP_FAVICON'))}}"/>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('adminlte3/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte3/dist/css/adminlte.min.css') }}">
    <!-- Sweetalert 2 -->
    <link rel="stylesheet" href="{{ asset('adminlte3/plugins/sweetalert2/sweetalert2.min.css') }}">

    @stack('css')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ env('APP_URL','') }}" class="brand-link">
            <img src="{{ asset(env('APP_LOGO')) }}" alt="{{ env('APP_TITLE','Laravel') }} Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">{{ env('APP_TITLE','Laravel') }}</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('adminlte3/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Alexander Pierce</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{env('APP_URL')}}" class="nav-link">
                            <i class="nav-icon fas fa-home"></i> Dashboard
                        </a>
                    </li>
                    @php
                        $menu = MenuHelper::treeMenu();
                    @endphp
                    @foreach($menu as $m1)
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon {{ $m1->icon_menu }}"></i>
                                <p>
                                    {{ $m1->nama_menu }}
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @foreach($m1->children as $ch)
                                <li class="nav-item">
                                    <a href="{{url($ch->link_menu)}}" class="nav-link">
                                        <i class="{{ $ch->icon_menu }} nav-icon"></i>
                                        <p>{{ $ch->nama_menu }}</p>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('judul')</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6"></div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            @yield('content')
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark bg-info">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Preferensi</h5>
            <div class="custom-control custom-switch">
                <input type="checkbox" class="theme-switch custom-control-input" id="theme-switcher">
                <label class="custom-control-label" for="theme-switcher">Mode Gelap</label>
            </div>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">

        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2021-2022
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('adminlte3/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Sweetalert 2 -->
<script src="{{ asset('adminlte3/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte3/dist/js/adminlte.min.js') }}"></script>

<!-- Dark Mode Switch -->
<script>
    var toggleSwitch = document.querySelector('.theme-switch');
    var currentTheme = localStorage.getItem('theme');
    var mainHeader = document.querySelector('.main-header');
    var sideBar = document.querySelector('.main-sidebar');

    if (currentTheme) {
        if (currentTheme === 'dark') {
            if (!document.body.classList.contains('dark-mode')) {
                document.body.classList.add("dark-mode");
            }

            if (sideBar.classList.contains('sidebar-light-primary')) {
                sideBar.classList.add("sidebar-dark-primary");
                sideBar.classList.remove("sidebar-light-primary");
            }

            if (mainHeader.classList.contains('navbar-light')) {
                mainHeader.classList.add('navbar-dark');
                mainHeader.classList.remove('navbar-light');
            }
            toggleSwitch.checked = true;
        }
    }

    function switchTheme(e) {
        if (e.target.checked) {
            if (!document.body.classList.contains('dark-mode')) {
                document.body.classList.add("dark-mode");
            }

            if (sideBar.classList.contains('sidebar-light-primary')) {
                sideBar.classList.add("sidebar-dark-primary");
                sideBar.classList.remove("sidebar-light-primary");
            }

            if (mainHeader.classList.contains('navbar-light')) {
                mainHeader.classList.add('navbar-dark');
                mainHeader.classList.remove('navbar-light');
            }
            localStorage.setItem('theme', 'dark');
        } else {
            if (document.body.classList.contains('dark-mode')) {
                document.body.classList.remove("dark-mode");
            }

            if (sideBar.classList.contains('sidebar-dark-primary')) {
                sideBar.classList.add("sidebar-light-primary");
                sideBar.classList.remove("sidebar-dark-primary");
            }

            if (mainHeader.classList.contains('navbar-dark')) {
                mainHeader.classList.add('navbar-light');
                mainHeader.classList.remove('navbar-dark');
            }
            localStorage.setItem('theme', 'light');
        }
    }

    toggleSwitch.addEventListener('change', switchTheme, false);
</script>

<!-- Notification -->
<script>
    function success_alert(message)
    {
        Swal.fire(
            'Sukses',
            message,
            'success'
        );
    }

    function error_alert(message)
    {
        Swal.fire(
            'Gagal',
            message,
            'warning'
        );
    }

    function confirm_delete(url)
    {
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Apakah Anda Yakin akan menghapus data ini?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus Data ini',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url : url,
                    type : 'DELETE',
                    dataType : 'json'
                }).done(function(response){
                    if(response){
                        Swal.fire(
                            'Sukses',
                            'Berhasil Hapus Data',
                            'success'
                        ).then(function(){
                            window.location.reload();
                        });
                    }
                });
            }
        });
    }

</script>

<!-- Setup Ajax -->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@stack('javascript')
</body>
</html>
