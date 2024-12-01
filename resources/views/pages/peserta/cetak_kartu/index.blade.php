@php
    use Carbon\Carbon;
@endphp
@extends('layouts.app')

@section('title', 'Calon Siswa')
@push('style')
    <style>
        @media print {
    /* Pastikan kontainer mencakup seluruh halaman cetak */
    body, html {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    .container-fluid {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; /* Menggunakan tinggi penuh layar cetak */
    }

    .page-content-wrapper {
        width: 100%;
        max-width: 600px; /* Atur lebar maksimal kartu */
        padding: 20px;
    }

    /* Hapus margin, padding, dan border untuk tabel agar tampil rapi */
    .table {
        width: 100%;
        border-collapse: collapse;
    }

    /* Pastikan gambar dan teks berada di posisi yang benar */
    .img {
        width: 100px; /* Sesuaikan jika perlu */
    }
    .text-center {
        text-align: center;
    }
    .text-end {
        text-align: right;
    }

    /* Sembunyikan tombol cetak dalam mode cetak */
    .btn {
        display: none;
    }

    /* Jika ada bagian yang terlalu besar untuk halaman cetak, sesuaikan ukurannya */
    .card, .card-body {
        max-width: 100%;
    }
}
    </style>
@endpush
@section('main')
    <div class="page-content">

        <!-- start page title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="page-title">
                            <h4>Cetak Kartu Peserta</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Menu</a></li>
                                <li class="breadcrumb-item active">Cetak Kartu Peserta</li>
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
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-1">
                                            <img src="https://web.smk-ypc.sch.id/wp-content/uploads/2022/07/YPC-250-no-border.png" alt="" class="img" width="100">
                                        </div>
                                        <div class="col">
                                            <h3 class="text-center">KARTU PENDAFTARAN</h3>
                                            <p class="text-center">PENERIMAAN CALON PESERTA DIDIK BARU<br>SMK YPC TASIKMALAYA<br>TAHUN {{$tahun_ajaran->awal_tahun_ajaran}}/{{$tahun_ajaran->akhir_tahun_ajaran}}</p>
                                        </div>
                                    </div>
                                    <hr>
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td>No Peserta</td>
                                                    <td>:</td>
                                                    <td>{{ $peserta->no_peserta }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Nama</td>
                                                    <td>:</td>
                                                    <td>{{$siswa->nama}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Tempat, Tgl Lahir</td>
                                                    <td>:</td>
                                                    <td>{{$siswa->tempat_lahir}}, {{Carbon::parse($siswa->tanggal_lahir)->format('d-m-Y')}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Asal Sekolah</td>
                                                    <td>:</td>
                                                    <td>{{$siswa->asal_sekolah}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Paket Keahlian</td>
                                                    <td>:</td>
                                                    <td>1. {{$siswa->jurusan1}} <br>  2. {{$siswa->jurusan2}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal Sosialisasi Dan Wawancara</td>
                                                    <td>:</td>
                                                    <td>{{$gelombang->tgl_pemetaan_jurusan}}</td>
                                                </tr>
                                            </table>
                                            <p class="text-end">Tasikmalaya, {{Carbon::today()->format('d/m/Y')}}<br><br><br><br><br> Panitia PPDB SMK YPC</p>
                                            
                                            </p>
                                    <div class="text-center mt-3">
                                        <button onclick="window.print()" class="btn btn-primary">Cetak</button>
                                    </div>
                                </div>
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
