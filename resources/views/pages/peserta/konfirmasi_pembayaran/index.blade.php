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
                            <h4>Pembayaran</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Menu</a></li>
                                <li class="breadcrumb-item active">Pembayaran</li>
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
                                <!-- <h4 class="header-title">Konfirmasi Pembayaran</h4> -->
                                <p class="card-title-desc">TIPE PEMBAYARAN : 
                                    <Ul>
                                        <li>PEMBAYARAN BISA LANGSUNG DILAKUKAN DI KAMPUS SMK YPC TASIKMALAYA</li>
                                        <li>TRANSFER KE BANK SYARIAH INDONESIA: 
                                            <Ul>
                                                <li>NO. REKENING 7093332223</li>
                                                <li>ATAS NAMA :  SMK YPC TASIKMALAYA</li>
                                            </Ul>
                                        </li>
                                    </Ul>
                                </p>

                                @if (!$konfirmasi_pembayaran)
                                <form action="{{ route('konfirmasi-pembayaran.store') }}" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                                    @csrf
                                    
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="month" class="form-label">Tujuan Bank</label>
                                                <select class="form-select" name="via" id="month" required>
                                                    <option selected disabled value="">Pilih Tujuan Bank</option>
                                                    <!-- Dynamically generate months -->
                                                    <option value="BSI">Bank Syariah Indonesia</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid month.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Atas Nama</label>
                                                <input type="text" name="nama_peserta" class="form-control" id="validationCustom04" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Bukti Pembayaran</label>
                                                <input type="file" name="bukti" class="form-control" id="validationCustom04" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <button id="submitBtn" class="btn btn-primary" style="width: 100%" type="submit">Kirim</button>
                                    </div>
                                </form>
                                @else
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="header-title">Status Pembayaran</h4>  
                                            <div class="table-responsive">
                                                <table class="table table-bordered border-dark mb-0">
            
                                                    <thead>
                                                        <tr>
                                                            <th>NISN</th>
                                                            <th>Nama Calon Siswa</th>
                                                            <th>Jenis Pembayaran</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">{{ $status_pembayaran->siswa_register->nisn }}</th>
                                                            <td>{{ $status_pembayaran->siswa_register->nama }}</td>
                                                            <td>{{ $status_pembayaran->jenis_pembayaran }}</td>
                                                            <td>
                                                                @if ($status_pembayaran->status == 0)
                                                                    <button class="btn btn-danger">Belum Verifikasi</button>
                                                                @else
                                                                    <button class="btn btn-success">Sudah Verifikasi</button>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
            
                                        </div>
                                    </div>
                                </div>
                                @endif
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
