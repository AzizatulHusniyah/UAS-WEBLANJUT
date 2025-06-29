<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Berita')</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.min.css') }}">

    <!-- Overlay Scrollbars -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    @stack('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<body class="hold-transition sidebar-mini">

<div class="wrapper">

<div class="content-wrapper">

    {{-- Welcome banner (hanya di halaman dashboard) --}}
    @if (Request::is('dashboard'))
    <div class="alert alert-primary shadow-sm rounded-0 mb-0" role="alert">
        <div class="container position-relative">
            <div class="text-center">
                <h5 class="mb-1">Selamat Datang di <strong>Portal Berita Digital</strong></h5>
                <p class="mb-0">Temukan informasi terkini dan terpercaya melalui platform berita kami yang komprehensif.</p>
            </div>
        </div>
    </div>
    @endif


    <!-- Navbar -->
    @include('layouts.navbar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content pt-3">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

    <!-- Footer -->
    @include('layouts.footer')

</div>
<!-- ./wrapper -->

<!-- Scripts -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('adminlte/js/adminlte.min.js') }}"></script>
@stack('scripts')
</body>
</html>
