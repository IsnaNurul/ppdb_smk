<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/morvin/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 16:12:17 GMT -->

<head>


    <meta charset="utf-8" />
    <title>Login - PPDB SMK YPC TASIKMALAYA </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link href="https://web.smk-ypc.sch.id/wp-content/uploads/2022/07/YPC-250-no-border.png" rel="icon">
    <link href="https://web.smk-ypc.sch.id/wp-content/uploads/2022/07/YPC-250-no-border.png" rel="apple-touch-icon">

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

                                        <h5 class="text-primary mb-2 mt-3">Halaman Login !</h5>
                                        <p class="text-muted">Calon Siswa Baru SMK YPC Tasikmalaya.</p>
                                    </div>

                                    <form action="{{ route('login.siswa') }}" method="POST" class="form-horizontal mt-4 pt-2">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="username">NISN</label>
                                            <input type="text" name="nisn" class="form-control" id="username"
                                                placeholder="Masukan NISN">
                                        </div>

                                        <div class="mb-3">
                                            <label for="userpassword">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                id="userpassword" placeholder="Masukan password">
                                        </div>

                                        <div>
                                            <button class="btn btn-primary mb-5 mt-3 w-100 waves-effect waves-light"
                                                type="submit">Login</button>
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

</body>


<!-- Mirrored from themesdesign.in/morvin/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 16:12:17 GMT -->

</html>
