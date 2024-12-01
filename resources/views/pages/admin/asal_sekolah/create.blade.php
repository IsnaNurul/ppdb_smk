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
                            <h4>Sekolah</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Menu</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Sekolah</a></li>
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
                                <h4 class="header-title">Input Data Sekolah</h4>
                                {{-- <p class="card-title-desc">Silahkan masukan data jurusan baru !!</p> --}}

                                <form action="{{ route('sekolah.store') }}" method="POST" class="needs-validation"
                                    novalidate>
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="nama_jurusan" class="form-label">Kode Sekolah</label>
                                                <input type="text" name="kode_sekolah" class="form-control"
                                                    id="nama_jurusan" placeholder="masukan kose sekolah" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid name.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="singkatan" class="form-label">Nama Sekolah</label>
                                                <input type="text" name="nama_sekolah" class="form-control" id="singkatan"
                                                    placeholder="masukan nama sekolah" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid alias.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="nama_jurusan" class="form-label">NPSN</label>
                                                <input type="text" name="npsn" class="form-control"
                                                    id="nama_jurusan" placeholder="masukan NPSN" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid name.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="singkatan" class="form-label">Index Sekolah</label>
                                                <input type="text" name="index_sekolah" class="form-control" id="singkatan"
                                                    placeholder="masukan alias index sekolah" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid alias.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <button id="submitBtn" class="btn btn-primary" style="width: 100%"
                                            type="submit">Simpan</button>
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
