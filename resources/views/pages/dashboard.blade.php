@extends('layouts.app')

@section('title', 'Admin')
@push('style')

@endpush
@section('main')
<div class="page-content">
    <!-- start page title -->
    <div class="page-title-box">
        <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title">
                    <h4>Dashboard</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Menu</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                </div>
            </div>
        </div>
        </div>
    </div>
     <!-- end page title -->
    <div class="container-fluid">
        <div class="page-content-wrapper">
                <div class="col">
                    <div class="row">
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <p class="font-size-16">Jumlah Pendaftar</p>
                                        <div class="mini-stat-icon mx-auto mb-3 mt-3">
                                            <span class="avatar-title rounded-circle bg-soft-success">
                                                    <i class="mdi mdi-account-outline text-success font-size-20"></i>
                                                </span>
                                        </div>
                                        <h5 class="font-size-22">{{ $pendaftar }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <p class="font-size-16">Jumlah Calon Siswa</p>
                                        <div class="mini-stat-icon mx-auto mb-3 mt-3">
                                            <span class="avatar-title rounded-circle bg-soft-danger">
                                                    <i class="mdi mdi-account-outline text-danger font-size-20"></i>
                                                </span>
                                        </div>
                                        <h5 class="font-size-22">{{ $calon_siswa }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <p class="text-muted">Rekayasa Perangkat Lunak dan Gim</p>

                                        <div class="mini-stat-icon mx-auto mb-3 mt-3">
                                            <span class="avatar-title rounded-circle bg-soft-secondary">
                                                    <i class="mdi mdi-account-outline text-secondary font-size-20"></i>
                                                </span>
                                        </div>
                                        <h5 class="font-size-22">1. {{ $pplg1 }}</h5>
                                        <h5 class="font-size-22">2. {{ $pplg2 }}</h5>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">

                                        <p class="text-muted">Teknik Jaringan Komputer dan Telekomunikasi</p>
                                        <div class="mini-stat-icon mx-auto mb-3 mt-3">
                                            <span class="avatar-title rounded-circle bg-soft-primary">
                                                    <i class="mdi mdi-account-outline text-primary font-size-20"></i>
                                                </span>
                                        </div>
                                        <h5 class="font-size-22">1. {{ $tkjt1 }}</h5>
                                        <h5 class="font-size-22">2. {{ $tkjt2 }}</h5>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <p class="text-muted">Design Komunikasi Visual</p>

                                        <div class="mini-stat-icon mx-auto mb-3 mt-3">
                                            <span class="avatar-title rounded-circle bg-soft-warning">
                                                    <i class="mdi mdi-account-outline text-warning font-size-20"></i>
                                                </span>
                                        </div>
                                        <h5 class="font-size-22">1. {{$dkv1}}</h5>
                                        <h5 class="font-size-22">2. {{$dkv2}}</h5>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">

                                        <p class="text-muted">Teknik Kendaraan Ringan</p>
                                        <div class="mini-stat-icon mx-auto mb-3 mt-3">
                                            <span class="avatar-title rounded-circle bg-soft-secondary">
                                                    <i class="mdi mdi-account-outline text-secondary font-size-20"></i>
                                                </span>
                                        </div>
                                        <h5 class="font-size-22">1. {{$tkr1}}</h5>
                                        <h5 class="font-size-22">2. {{$tkr2}}</h5>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <p class="text-muted">Teknik Sepeda Motor</p>

                                        <div class="mini-stat-icon mx-auto mb-3 mt-3">
                                            <span class="avatar-title rounded-circle bg-soft-success">
                                                    <i class="mdi mdi-account-outline text-success font-size-20"></i>
                                                </span>
                                        </div>
                                        <h5 class="font-size-22">1. {{$tsm1}}</h5>
                                        <h5 class="font-size-22">2. {{$tsm2}}</h5>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <p class="text-muted">Design Pemodelan dan Informasi Bangunan</p>

                                        <div class="mini-stat-icon mx-auto mb-3 mt-3">
                                            <span class="avatar-title rounded-circle bg-soft-warning">
                                                    <i class="mdi mdi-account-outline text-warning font-size-20"></i>
                                                </span>
                                        </div>
                                        <h5 class="font-size-22">1. {{$dpib1}}</h5>
                                        <h5 class="font-size-22">2. {{$dpib2}}</h5>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">

                                        <p class="text-muted">Teknik Elektronika Industri</p>
                                        <div class="mini-stat-icon mx-auto mb-3 mt-3">
                                            <span class="avatar-title rounded-circle bg-soft-success">
                                                    <i class="mdi mdi-account-outline text-success font-size-20"></i>
                                                </span>
                                        </div>
                                        <h5 class="font-size-22">1. {{$te1}}</h5>
                                        <h5 class="font-size-22">2. {{$te2}}</h5>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">

                                        <p class="text-muted">Samsung Tech Institue</p>
                                        <div class="mini-stat-icon mx-auto mb-3 mt-3">
                                            <span class="avatar-title rounded-circle bg-soft-primary">
                                                    <i class="mdi mdi-account-outline text-primary font-size-20"></i>
                                                </span>
                                        </div>
                                        <h5 class="font-size-22">1. {{$sti1}}</h5>
                                        <h5 class="font-size-22">2. {{$sti2}}</h5>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <p class="text-muted">TELKOM - TKJT</p>

                                        <div class="mini-stat-icon mx-auto mb-3 mt-3">
                                            <span class="avatar-title rounded-circle bg-soft-danger">
                                                    <i class="mdi mdi-account-outline text-danger font-size-20"></i>
                                                </span>
                                        </div>
                                        <h5 class="font-size-22">1. {{$telkom_tkjt1}}</h5>
                                        <h5 class="font-size-22">2. {{$telkom_tkjt2}}</h5>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <p class="text-muted">TELKOM - PPLG</p>

                                        <div class="mini-stat-icon mx-auto mb-3 mt-3">
                                            <span class="avatar-title rounded-circle bg-soft-dark">
                                                    <i class="mdi mdi-account-outline text-dark font-size-20"></i>
                                                </span>
                                        </div>
                                        <h5 class="font-size-22">1. {{$telkom_pplg1}}</h5>
                                        <h5 class="font-size-22">2. {{$telkom_pplg2}}</h5>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div>
@endsection
@push('scripts')

@endpush
