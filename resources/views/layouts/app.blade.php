<!doctype html>
<html lang="en">
<!-- Mirrored from themesdesign.in/morvin/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 16:10:54 GMT -->
<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link href="https://web.smk-ypc.sch.id/wp-content/uploads/2022/07/YPC-250-no-border.png" rel="icon">
    <link href="https://web.smk-ypc.sch.id/wp-content/uploads/2022/07/YPC-250-no-border.png" rel="apple-touch-icon">

    <!-- plugin css -->
    <link href="{{ asset('assets2/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets2/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets2/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets2/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @stack('style')
</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">

        <!--- Header -->
        @include('components.header')

        <!-- ========== Left Sidebar Start ========== -->
        @include('components.sidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            @yield('main')
            <!-- End Page-content -->

            @include('components.footer')
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets2/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets2/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets2/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets2/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets2/libs/node-waves/waves.min.js') }}"></script>

    <!-- apexcharts -->
    <script src="{{ asset('assets2/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Plugins js-->
    <script src="{{ asset('assets2/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('assets2/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}"></script>

    <script src="{{ asset('assets2/js/pages/dashboard.init.js') }}"></script>

    <script src="{{ asset('assets2/js/app.js') }}"></script>

    @stack('scripts')
    @include('sweetalert::alert')

</body>

<!-- Mirrored from themesdesign.in/morvin/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 16:11:23 GMT -->
</html>
