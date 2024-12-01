<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/morvin/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 16:12:17 GMT -->

<head>


    <meta charset="utf-8" />
    <title>Login page admin </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets2/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets2/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets2/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets2/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />


</head>


<body class="authentication-bg">

    <div class="home-center">
        <div class="home-desc-center">

            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="px-2 py-3">

                                    <div class="text-center">
                                        <a href="index.html">
                                            <img src="{{ asset('assets2/images/logo-smk-ypc2.png') }}" height="35" alt="logo">
                                        </a>

                                        <h5 class="text-primary mb-2 mt-3">Page Login !</h5>
                                        <p class="text-muted">ADMINISTRATOR PPDB.</p>
                                    </div>

                                    <form action="{{ route('login.admin') }}" method="POST" class="form-horizontal mt-4 pt-2">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="username">Username</label>
                                            <input type="text" name="username" class="form-control" id="username"
                                                placeholder="Enter username">
                                        </div>

                                        <div class="mb-3">
                                            <label for="userpassword">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                id="userpassword" placeholder="Enter password">
                                        </div>

                                        <div>
                                            <button class="btn btn-primary mb-5 mt-3 w-100 waves-effect waves-light"
                                                type="submit">Log In</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
        <!-- End Log In page -->
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets2/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets2/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets2/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets2/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets2/libs/node-waves/waves.min.js') }}"></script>

    <script src="{{ asset('assets2/js/app.js') }}"></script>
    @include('sweetalert::alert')

</body>


<!-- Mirrored from themesdesign.in/morvin/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 16:12:17 GMT -->

</html>
