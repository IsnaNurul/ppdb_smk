@extends('layouts.app')

@section('title', 'Admin')
@push('style')
    <!-- DataTables -->
    <link href="{{ asset('assets2/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets2/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
@endpush
@section('main')
    <div class="page-content">
        <!-- start page title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="page-title">
                            <h4>Daftar Ulang Siswa</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Menu</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Daftar Ulang</a></li>
                                <li class="breadcrumb-item active">List</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="container-fluid">
            <div class="page-content-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-centered datatable dt-responsive nowrap "
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead class="thead-light">
                                            <tr>
                                                <th style="width: 20px;">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="ordercheck">
                                                        <label class="form-check-label" for="ordercheck">&nbsp;</label>
                                                    </div>
                                                </th>
                                                <th>No</th>
                                                <th>NISN</th>
                                                <th>No. Peserta</th>
                                                <th>Nama Peserta</th>
                                                <th>Tempat / Tgl Lahir</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Asal Sekolah</th>
                                                <th>Alamat Siswa</th>
                                                <th class="text-center">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($daftar_ulang as $no => $item)
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="ordercheck1">
                                                            <label class="form-check-label" for="ordercheck1">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td class="text-dark fw-bold">{{ $no + 1 }}</td>
                                                    <td>{{ $item->peserta->siswa_register->nisn }}</td>
                                                    <td>{{ $item->no_peserta }}</td>
                                                    <td>{{ $item->peserta->siswa_register->nama }}</td>
                                                    <td>{{ $item->peserta->siswa_register->tempat_lahir }},
                                                        {{ $item->peserta->siswa_register->tanggal_lahir }}</td>
                                                    <td>{{ $item->peserta->siswa_register->jenis_kelamin }}</td>
                                                    <td>{{ $item->peserta->siswa_register->asal_sekolah }}</td>
                                                    <td>{{ $item->peserta->siswa_register->alamat_siswa }}</td>
                                                    <td id="tooltip-container1" class="text-center">
                                                        <form action="{{ route('daftar-ulang.toggleDaftarUlang', $item->id) }}"
                                                            method="POST" style="display: inline;">
                                                            @csrf
                                                            <button type="{{ $item->status === 1 ? 'button' : 'submit' }}"
                                                                class="btn btn-sm {{ $item->status === 1 ? 'btn-success' : 'btn-danger' }}">
                                                                {{ $item->status === 1 ? 'Sudah daftar ulang' : 'Verifikasi' }}
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div>


        </div> <!-- container-fluid -->
    </div>
@endsection
@push('scripts')
    <!-- Required datatable js -->
    <script src="{{ asset('assets2/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets2/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ asset('assets2/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets2/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('assets2/js/pages/ecommerce-datatables.init.js') }}"></script>
@endpush
