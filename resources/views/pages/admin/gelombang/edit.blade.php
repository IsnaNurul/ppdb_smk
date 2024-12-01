@extends('layouts.app')

@section('title', 'Edit Gelombang')
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
                            <h4>Edit Gelombang</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Menu</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Gelombang</a></li>
                                <li class="breadcrumb-item active">Edit Gelombang</li>
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
                                <h4 class="header-title">Edit Gelombang</h4>
                                <p class="card-title-desc">Perbarui data berikut untuk mengedit gelombang.</p>

                                <form action="{{ route('gelombang.update', $gelombang->id) }}" method="POST"
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
                                                            {{ $tahun->id == $gelombang->id_tahun_ajaran ? 'selected' : '' }}>
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
                                                <label for="tgl_awal_pendaftaran" class="form-label">Tanggal Awal
                                                    Pendaftaran</label>
                                                <input type="date" name="tgl_awal_pendaftaran" class="form-control"
                                                    id="tgl_awal_pendaftaran" value="{{ $gelombang->tgl_awal_pendaftaran }}"
                                                    required>
                                                <div class="invalid-feedback">
                                                    Silakan masukkan tanggal awal pendaftaran.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="tgl_akhir_pendaftaran" class="form-label">Tanggal Akhir
                                                    Pendaftaran</label>
                                                <input type="date" name="tgl_akhir_pendaftaran" class="form-control"
                                                    id="tgl_akhir_pendaftaran"
                                                    value="{{ $gelombang->tgl_akhir_pendaftaran }}" required>
                                                <div class="invalid-feedback">
                                                    Silakan masukkan tanggal akhir pendaftaran.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="tgl_pemetaan_jurusan" class="form-label">Tanggal Sosialisasi dan Wawancara
                                                    </label>
                                                <input type="date" name="tgl_pemetaan_jurusan" class="form-control"
                                                    id="tgl_pemetaan_jurusan"
                                                    value="{{ $gelombang->tgl_pemetaan_jurusan }}" required>
                                                <div class="invalid-feedback">
                                                    Silakan masukkan tanggal sosialisasi dan wawancara.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="tgl_pengumuman_hasil" class="form-label">Tanggal Pengumuman
                                                    Hasil</label>
                                                <input type="date" name="tgl_pengumuman_hasil" class="form-control"
                                                    id="tgl_pengumuman_hasil"
                                                    value="{{ $gelombang->tgl_pengumuman_hasil }}" required>
                                                <div class="invalid-feedback">
                                                    Silakan masukkan tanggal pengumuman hasil.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="tgl_awal_daftarulang" class="form-label">Tanggal Awal Daftar
                                                    Ulang</label>
                                                <input type="date" name="tgl_awal_daftarulang" class="form-control"
                                                    id="tgl_awal_daftarulang"
                                                    value="{{ $gelombang->tgl_awal_daftarulang }}" required>
                                                <div class="invalid-feedback">
                                                    Silakan masukkan tanggal awal daftar ulang.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="tgl_akhir_daftarulang" class="form-label">Tanggal Akhir Daftar
                                                    Ulang</label>
                                                <input type="date" name="tgl_akhir_daftarulang" class="form-control"
                                                    id="tgl_akhir_daftarulang"
                                                    value="{{ $gelombang->tgl_akhir_daftarulang }}" required>
                                                <div class="invalid-feedback">
                                                    Silakan masukkan tanggal akhir daftar ulang.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" style="width: 100%" type="submit">Simpan</button>
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
