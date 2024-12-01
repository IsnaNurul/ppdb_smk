@php
    use App\Models\SiswaRegister;
    use App\Models\OrtuRegister;
    use App\Models\Pembayaran;
@endphp
@if (Auth::user()->level === 'admin')
    {{-- sidebar admin-operator --}}
    <div class="vertical-menu">
        <div data-simplebar class="h-100">
            <div class="user-sidebar text-center">
                <div class="dropdown">
                    <div class="user-img">
                        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135768.png" alt="" class="rounded-circle">
                        <span class="avatar-online bg-success"></span>
                    </div>
                    <div class="user-info">
                        <h5 class="mt-3 font-size-16 text-white">{{ auth()->user()->name ?? '' }}</h5>
                        <span class="font-size-13 text-white-50">{{ auth()->user()->level ?? '' }}</span>
                    </div>
                </div>
            </div>

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title">Menu</li>

                    <li>
                        <a href="/pages/admin-operator/dashboard" class="waves-effect {{ Request::is('dashboard*') ? 'mm-active' : '' }}">
                            <i class="fas fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('/pages/admin-operator/users') }}" class="waves-effect {{ Request::is('users*') ? 'mm-active' : '' }}">
                            <i class="fas fa-user"></i>
                            <span>Data User</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect {{ Request::is('pendaftar*') ? 'mm-active' : '' }}">
                            <i class="fas fa-users"></i>
                            <span>Data Peserta</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ url('/pages/admin-operator/pendaftar') }}">Pendaftar</a></li>
                            <li><a href="{{ url('/pages/admin-operator/calon-siswa') }}">Calon Siswa</a></li>
                            <li><a href="{{ url('/pages/admin-operator/siswa') }}">Siswa</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ url('/pages/admin-operator/pembayaran') }}" class="waves-effect {{ Request::is('pembayaran*') ? 'mm-active' : '' }}">
                            <i class="fas fa-wallet"></i>
                            <span>Pembayaran</span>
                        </a>
                    </li>
                    <li class="menu-title">Master</li>

                    <li>
                        <a href="{{ url('/pages/admin-operator/tahun-ajaran') }}" class="waves-effect {{ Request::is('tahun-ajaran*') ? 'mm-active' : '' }}">
                            <i class="fas fa-calendar-day"></i>
                            <span>Tahun Ajaran</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/pages/admin-operator/jadwal') }}" class="waves-effect {{ Request::is('jadwal*') ? 'mm-active' : '' }}">
                            <i class="fas fa-calendar-day"></i>
                            <span>Jadwal</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/pages/admin-operator/gelombang') }}" class="waves-effect {{ Request::is('gelombang*') ? 'mm-active' : '' }}">
                            <i class="fas fa-toggle-off"></i>
                            <span>Gelombang</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/pages/admin-operator/sekolah') }}" class="waves-effect {{ Request::is('sekolah*') ? 'mm-active' : '' }}">
                            <i class="fas fa-school"></i>
                            <span>Sekolah</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('/pages/admin-operator/jurusan') }}" class="waves-effect {{ Request::is('jurusan*') ? 'mm-active' : '' }}">
                            <i class="fas fa-book-open"></i>
                            <span>Jurusan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/pages/admin-operator/brosur') }}" class="waves-effect {{ Request::is('brosur*') ? 'mm-active' : '' }}">
                            <i class="fas fa-file-alt"></i>
                            <span>Brosur & Informasi</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/pages/admin-operator/kontak') }}" class="waves-effect {{ Request::is('kontak*') ? 'mm-active' : '' }}">
                            <i class="fas fa-address-book"></i>
                            <span>Informasi Kontak</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endif

@if (Auth::user()->level === 'operator')
    {{-- sidebar admin-operator --}}
    <div class="vertical-menu">
        <div data-simplebar class="h-100">
            <div class="user-sidebar text-center">
                <div class="dropdown">
                    <div class="user-img">
                        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135768.png" alt="" class="rounded-circle">
                        <span class="avatar-online bg-success"></span>
                    </div>
                    <div class="user-info">
                        <h5 class="mt-3 font-size-16 text-white">{{ auth()->user()->name ?? '' }}</h5>
                        <span class="font-size-13 text-white-50">{{ auth()->user()->level ?? '' }}</span>
                    </div>
                </div>
            </div>

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title">Menu</li>

                    <li>
                        <a href="/pages/admin-operator/dashboard" class="waves-effect {{ Request::is('dashboard*') ? 'mm-active' : '' }}">
                            <i class="fas fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('/pages/admin-operator/users') }}" class="waves-effect {{ Request::is('users*') ? 'mm-active' : '' }}">
                            <i class="fas fa-user"></i>
                            <span>Data User</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect {{ Request::is('pendaftar*') ? 'mm-active' : '' }}">
                            <i class="fas fa-users"></i>
                            <span>Data Peserta</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ url('/pages/admin-operator/pendaftar') }}">Pendaftar</a></li>
                            <li><a href="{{ url('/pages/admin-operator/calon-siswa') }}">Calon Siswa</a></li>
                            <li><a href="{{ url('/pages/admin-operator/siswa') }}">Siswa</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ url('/pages/admin-operator/pembayaran') }}" class="waves-effect {{ Request::is('pembayaran*') ? 'mm-active' : '' }}">
                            <i class="fas fa-wallet"></i>
                            <span>Pembayaran</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endif

@if (Auth::user()->level === 'siswa')
@php
    $siswa = SiswaRegister::where('id_user',Auth::user()->id)->first();
    if ($siswa){
        $ortu = OrtuRegister::where('id_register',$siswa->id)->first();
        $pembayaran = Pembayaran::where('id_register',$siswa->id)->first();
    }
@endphp
    {{-- sidebar peserta --}}
    <div class="vertical-menu">
        <div data-simplebar class="h-100">
            <div class="user-sidebar text-center">
                <div class="dropdown">
                    <div class="user-img">
                        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135768.png" alt="" class="rounded-circle">
                        <span class="avatar-online bg-success"></span>
                    </div>
                    <div class="user-info">
                        <h5 class="mt-3 font-size-16 text-white">{{ auth()->user()->name ?? '' }}</h5>
                        <span class="font-size-13 text-white-50">{{ auth()->user()->level ?? '' }}</span>
                    </div>
                </div>
            </div>

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title">Menu</li>
                    
                    <li>
                        <a href="{{ url('/pages/peserta/data-siswa') }}" class="waves-effect {{ Request::is('/pages/peserta/data-siswa*') ? 'mm-active' : '' }}">
                            <i class="fas fa-user-graduate"></i>
                            <span>Data Calon Siswa</span>
                        </a>
                    </li>

            
                    @if ($siswa && $siswa->jurusan1 != null)
                    <li>
                        <a href="{{ url('/pages/peserta/data-ortu') }}" class="waves-effect {{ Request::is('/pages/peserta/data-ortu*') ? 'mm-active' : '' }}">
                            <i class="fas fa-users"></i>
                            <span>Data Orang Tua</span>
                        </a>
                    </li>
                    @endif
                   
                    @if ($ortu)
                    <li>
                        <a href="{{ url('/pages/peserta/data-file') }}" class="waves-effect {{ Request::is('/pages/peserta/data-file*') ? 'mm-active' : '' }}">
                            <i class="fas fa-file-alt"></i>
                            <span>Data File</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/pages/peserta/konfirmasi-pembayaran') }}" class="waves-effect {{ Request::is('/pages/peserta/konfirmasi-pembayaran*') ? 'mm-active' : '' }}">
                            <i class="fas fa-wallet"></i>
                            <span>Pembayaran</span>
                        </a>
                    </li>
                    @endif
                

                    @if ($pembayaran && $pembayaran->status == 1)
                    <li>
                        <a href="{{ url('/pages/peserta/cetak-kartu') }}" class="waves-effect {{ Request::is('/pages/peserta/cetak-kartu*') ? 'mm-active' : '' }}">
                            <i class="fas fa-print"></i>
                            <span>Cetak Kartu Peserta</span>
                        </a>
                    </li>
                    @endif
                    
                </ul>
            </div>
        </div>
    </div>
@endif
