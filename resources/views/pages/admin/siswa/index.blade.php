@extends('layouts.app')

@section('title', 'Admin')
@push('style')
    <!-- DataTables -->
    <link href="{{ asset('assets2/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets2/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <style>
        .fixed-badge {
            width: 100%;
            height: 20px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            white-space: nowrap;
        }
    </style>
@endpush

@section('main')
    <div class="page-content">
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="page-title">
                            <h4>Data Daftar Ulang Siswa</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Menu</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Data Peserta</a></li>
                                <li class="breadcrumb-item active">Siswa</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="float-end d-none d-sm-block">
                            <a href="{{ route('siswa.export') }}" class="btn btn-success">
                                <i class="fas fa-file-excel"></i> Export Data
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="page-content-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-auto">
                                        <span class="badge badge-soft-success d-flex align-items-center fw-bold" style="width: 210px; height: 25px; font-size:13px;">
                                            Total Calon Siswa : {{ $total_calon_siswa }}
                                        </span>
                                    </div>
                                    <div class="col-auto">
                                        <span class="badge badge-soft-success d-flex align-items-center fw-bold" style="width: 210px; height: 25px; font-size:13px">
                                            Total Siswa Daftar Ulang : {{ $total_daftar_ulang }}
                                        </span>
                                    </div>
                                </div>
                                <div class="row mb-2 p-2 flex-nowrap overflow-auto" style="white-space: nowrap;">
                                    @foreach ($programsCount as $program)
                                        <div class="col-auto px-2">
                                            <button class="btn btn-sm btn-primary d-flex align-items-center" style="width: 80px; height: 20px">
                                                {{ $program->singkatan }} : {{ $program->count }}
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-centered datatable dt-responsive nowrap"
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
                                                <th>Nama Peserta</th>
                                                <th>Tempat / Tgl Lahir</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Asal Sekolah</th>
                                                <th class="text-center">Jurusan Diterima</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $no => $item)
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="ordercheck1">
                                                            <label class="form-check-label" for="ordercheck1">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td class="text-dark fw-bold">{{ $no + 1 }}</td>
                                                    <td>{{ $item->nisn }}</td>
                                                    <td>{{ $item->peserta->siswa_register->nama }}</td>
                                                    <td>{{ $item->peserta->siswa_register->tempat_lahir }},
                                                        {{ $item->peserta->siswa_register->tanggal_lahir }}</td>
                                                    <td>{{ $item->peserta->siswa_register->jenis_kelamin }}</td>
                                                    <td>{{ $item->peserta->siswa_register->asal_sekolah }}</td>
                                                    <td>
                                                        <a href="javascript:void(0);" data-bs-toggle="modal"
                                                            data-bs-target="#jurusanModal"
                                                            data-item-id="{{ $item->id }}" class="text-primary">
                                                            <span
                                                                class="badge badge-soft-primary font-size-12 fixed-badge">{{ $item->program }}</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <!-- Modal Structure -->
                                    <div class="modal fade" id="jurusanModal" tabindex="-1"
                                        aria-labelledby="jurusanModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <form id="jurusanForm" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="student_id" id="student_id">
                                                        <label for="newProgram" class="form-label">Ubah Jurusan</label>
                                                        <select class="form-select" name="program" id="newProgram">
                                                            @foreach ($jurusans as $jurusan)
                                                                <option value="{{ $jurusan->id }}">
                                                                    {{ $jurusan->nama_jurusan }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </form>
                                                    <div class="d-flex justify-content-end mt-3 ">
                                                        <button type="button" class="btn btn-sm btn-secondary me-2"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="button" class="btn btn-sm btn-primary"
                                                            onclick="saveJurusan()">Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets2/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets2/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets2/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets2/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

    <script>
        function saveJurusan() {
            document.getElementById('jurusanForm').submit();
        }

        // Set up event listener to pass student ID into modal
        document.addEventListener('DOMContentLoaded', function () {
            $('#jurusanModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var studentId = button.data('item-id');
                $('#student_id').val(studentId);

                // Update form action to include the student ID
                $('#jurusanForm').attr('action', `/pages/admin-operator/siswa/${studentId}`);
            });
        });
    </script>
@endpush
