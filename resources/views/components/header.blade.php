<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">

               <!-- LOGO -->
         <div class="navbar-brand-box">
            <a href="{{ url('/') }}" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="{{ asset('assets2/images/logo-smk-ypc.png') }}" alt="" height="40">
                </span>
                <span class="logo-lg">
                    <img src="{{ asset('assets2/images/logo-smk-ypc2.png') }}" alt="" height="35">
                </span>
            </a>

            <a href="{{ url('/') }}" class="logo logo-light">
                <span class="logo-sm">
                    <img src="{{ asset('assets2/images/logo-smk-ypc.png') }}" alt="" height="30">
                </span>
                <span class="logo-lg">
                    <img src="{{ asset('assets2/images/logo-smk-ypc2.png') }}" alt="" height="30">
                </span>
            </a>
        </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>
    
        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="https://cdn-icons-png.flaticon.com/512/3135/3135768.png"
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1">{{ auth()->user()->name ? auth()->user()->name : ''}}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    @if (auth()->user()->level !='siswa')
                    <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle-outline font-size-16 align-middle me-1"></i> Profile</a>
                    <div class="dropdown-divider"></div>
                    @endif
                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"><i class="mdi mdi-power font-size-16 align-middle me-1 text-danger"></i> Logout</a>
                </div>
            </div>
    
        </div>
    </div>
</header>
