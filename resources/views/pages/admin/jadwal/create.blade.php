@extends('layouts.app')

@section('title', 'Tambah Jadwal')
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
                            <h4>Tambah Jadwal</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Menu</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Jadwal</a></li>
                                <li class="breadcrumb-item active">Tambah Jadwal</li>
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
                                <h4 class="header-title">Tambah Jadwal Baru</h4>
                                <p class="card-title-desc">Isi data berikut untuk menambahkan jadwal baru.</p>

                                <form action="{{ route('jadwal.store') }}" method="POST" class="needs-validation"
                                    novalidate>
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="id_tahun_ajaran" class="form-label">Tahun Ajaran</label>
                                                <select name="id_tahun_ajaran" class="form-select" id="id_tahun_ajaran"
                                                    required>
                                                    <option value="">Pilih Tahun Ajaran</option>
                                                    @foreach ($tahun_ajaran as $tahun)
                                                        <option value="{{ $tahun->id }}">
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
                                                <label for="tanggal" class="form-label">Tanggal</label>
                                                <input type="date" name="tanggal" class="form-control"
                                                    id="tanggal" required>
                                                <div class="invalid-feedback">
                                                    Silakan masukkan tanggal
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="no_ruangan" class="form-label">No Ruangan</label>
                                                <input type="text" name="no_ruangan" class="form-control"
                                                    id="no_ruangan" required>
                                                <div class="invalid-feedback">
                                                    Silakan masukkan no ruangan
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="ruangan" class="form-label">Nama Ruangan</label>
                                                <input type="text" name="ruangan" class="form-control"
                                                    id="ruangan" required>
                                                <div class="invalid-feedback">
                                                    Silakan masukkan nama ruangan
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="jumlah" class="form-label">Jumlah</label>
                                                <input type="text" name="jumlah" class="form-control"
                                                    id="jumlah" required>
                                                <div class="invalid-feedback">
                                                    Silakan masukkan jumlah
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="sesi" class="form-label">Sesi</label>
                                                <input type="text" name="sesi" class="form-control"
                                                    id="sesi" required>
                                                <div class="invalid-feedback">
                                                    Silakan masukkan sesi
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="jam" class="form-label">Jam</label>
                                                <input type="time" name="jam" class="form-control"
                                                    id="jam" required>
                                                <div class="invalid-feedback">
                                                    Silakan masukkan jam
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
