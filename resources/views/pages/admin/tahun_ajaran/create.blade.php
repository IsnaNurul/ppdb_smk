@extends('layouts.app')

@section('title', 'Calon Siswa')
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
                            <h4>Tahun Ajaran</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Menu</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tahun Ajaran</a></li>
                                <li class="breadcrumb-item active">Form</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="container-fluid">
            <div class="page-content-wrapper">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Input Data Tahun Ajaran</h4>
                                <p class="card-title-desc">Silahkan masukan data tahun ajaran baru !!</p>
                                <form action="{{ route('tahun-ajaran.store') }}" method="POST" class="needs-validation" novalidate>
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="awal_tahun_ajaran" class="form-label">Awal Tahun Ajaran</label>
                                                <input 
                                                    type="number" 
                                                    name="awal_tahun_ajaran" 
                                                    class="form-control" 
                                                    id="awal_tahun_ajaran" 
                                                    placeholder="Contoh: 2023" 
                                                    maxlength="4" 
                                                    pattern="\d{4}" 
                                                    required>
                                                <div class="invalid-feedback">
                                                    Masukkan tahun awal yang valid (4 digit).
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="akhir_tahun_ajaran" class="form-label">Akhir Tahun Ajaran</label>
                                                <input 
                                                    type="number" 
                                                    name="akhir_tahun_ajaran" 
                                                    class="form-control" 
                                                    id="akhir_tahun_ajaran" 
                                                    placeholder="Contoh: 2024" 
                                                    maxlength="4" 
                                                    pattern="\d{4}" 
                                                    required>
                                                <div class="invalid-feedback">
                                                    Masukkan tahun akhir yang valid (4 digit).
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button id="submitBtn" class="btn btn-primary" style="width: 100%" type="submit">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- container-fluid -->
        </div>
    </div>
@endsection
@push('scripts')
@endpush
