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
                            <h4>Jurusan</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Menu</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Jurusan</a></li>
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
                                <h4 class="header-title">Input Data Jurusan</h4>
                                <p class="card-title-desc">Silahkan masukan data jurusan baru !!</p>

                                <form action="{{ route('jurusan.update', $jurusan->id) }}" method="POST"
                                    class="needs-validation" novalidate>
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="id_tahun_ajaran" class="form-label">Tahun Ajaran</label>
                                                <select name="id_tahun_ajaran" class="form-select" id="id_tahun_ajaran"
                                                    required>
                                                    @foreach ($tahun_ajaran as $tahun)
                                                        <option value="{{ $tahun->id }}"
                                                            {{ $tahun->id == $jurusan->id_tahun_ajaran ? 'selected' : '' }}>
                                                            {{ $tahun->awal_tahun_ajaran }}/{{ $tahun->akhir_tahun_ajaran }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback">
                                                    Silakan pilih tahun ajaran.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="nama_jurusan" class="form-label">Nama Jurusan</label>
                                                <input type="text" name="nama_jurusan" class="form-control"
                                                    id="nama_jurusan"
                                                    value="{{ old('nama_jurusan', $jurusan->nama_jurusan) }}"
                                                    placeholder="masukan nama jurusan baru" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid name.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="singkatan" class="form-label">Alias Jurusan</label>
                                                <input type="text" name="singkatan" class="form-control" id="singkatan"
                                                    value="{{ old('singkatan', $jurusan->singkatan) }}"
                                                    placeholder="masukan alias jurusan baru" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid alias.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Checkbox section for Pilihan 1 and Pilihan 2 -->
                                    <div class="row mb-3">
                                        <label for="">Harap pilih salah satu atau keduanya</label>
                                        <div class="col-md-3">
                                            <div class="form-check mb-2">
                                                <input type="checkbox" name="pilihan1" value="1"
                                                    class="form-check-input" id="pilihan1"
                                                    {{ $jurusan->pilihan1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="pilihan1">Masukkan ke Pilihan 1</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input type="checkbox" name="pilihan2" value="1"
                                                    class="form-check-input" id="pilihan2"
                                                    {{ $jurusan->pilihan2 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="pilihan2">Masukkan ke Pilihan 2</label>
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
