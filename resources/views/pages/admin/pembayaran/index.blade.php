@extends('layouts.app')

@section('title', 'Admin')
@push('style')
    <!-- DataTables -->
    <link href="{{ asset('assets2/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets2/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <style>
        .fixed-badge {
            width: 100%;
            /* Set your desired fixed width */
            height: 20px;
            /* Set your desired fixed height */
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            /* Adjust font size as needed */
            white-space: nowrap;
            /* Prevent text from wrapping */
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
                            <h4>Pembayaran Registrasi</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Menu</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pembayaran</a></li>
                                <li class="breadcrumb-item active">Pembayaran</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="float-end d-none d-sm-block">
                            <a href="#" class="btn btn-success"><i class="fas fa-download"></i> Export Excel</a>
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
                                                <th>Jenis Pembayaran</th>
                                                <th>Tempat Pembayaran</th>
                                                <th>Atas Nama</th>
                                                <th>Bukti Pembayaran</th>
                                                <th>Waktu Pembayaran</th>
                                                <th>Status Pembayaran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $no => $student)
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="ordercheck1">
                                                            <label class="form-check-label" for="ordercheck1">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td class="text-dark fw-bold">{{ $no + 1 }}</td>
                                                    <td>{{ $student->nisn }}</td>
                                                    <td>{{ $student->nama }}</td>
                                                    <!-- Check if a payment exists for the student -->
                                                    <td>
                                                        <input type="text" class="form-control" 
                                                            value="{{ $student->pembayaran ? $student->pembayaran->jenis_pembayaran : '-' }}" readonly style="width: 50%">
                                                    </td>
                                                    
                                                    <td>{{ $student->pembayaran ? $student->pembayaran->via : '-' }}</td>
                                                    <td>{{ $student->pembayaran ? $student->pembayaran->nama_peserta : '-' }}
                                                    </td>
                                                    <td>
                                                        @if ($student->pembayaran && $student->pembayaran->bukti)
                                                            <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                                                data-bs-target="#buktiModal"
                                                                data-bukti="{{ asset('storage/' . $student->pembayaran->bukti) }}">
                                                                Lihat Bukti
                                                            </button>
                                                        @else
                                                            <span class="text-muted">Tidak Ada Bukti</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $student->pembayaran && $student->pembayaran->status ? 'Telah Bayar' : 'Belum Bayar' }}
                                                    </td>
                                                    <td class="">
                                                        @if ($student->pembayaran)
                                                            <form
                                                                action="{{ route('pembayaran.verify', $student->pembayaran->id) }}"
                                                                method="POST" style="display:inline-block;">
                                                                @csrf
                                                                @method('PATCH')
                                                                @if ($student->pembayaran->status)
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-success">Verifikasi</button>
                                                                @else
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-danger">Verifikasi</button>
                                                                @endif
                                                            </form>
                                                            @if ($student->pembayaran->status === 1)
                                                                <form
                                                                    action="{{ route('pembayaran.destroy', $student->pembayaran->id) }}"
                                                                    method="POST" style="display:inline-block;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-danger">Cancel</button>
                                                                </form>
                                                            @endif
                                                        @else
                                                            <!-- If no payment data, show button to open modal -->
                                                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                                data-bs-target="#paymentModal"
                                                                data-id="{{ $student->id }}"
                                                                data-nisn="{{ $student->nisn }}">
                                                                Lakukan Pembayaran
                                                            </button>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @if ($data)
                                        <!-- Payment Details Modal -->
                                        <div class="modal fade" id="paymentModal" tabindex="-1"
                                            aria-labelledby="paymentModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="paymentModalLabel">Lengkapi Data
                                                                Pembayaran</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Hidden field to store student ID -->
                                                            <input type="hidden" name="id_register" id="studentId">

                                                            <!-- Form fields for payment details -->
                                                            <div class="mb-3">
                                                                <label for="nisn" class="form-label">NISN</label>
                                                                <input type="text" class="form-control" name="nisn"
                                                                    readonly>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="jenis_pembayaran" class="form-label">Jenis
                                                                    Pembayaran</label>
                                                                <select name="jenis_pembayaran" class="form-control"
                                                                    id="jenisPembayaranSelect" required>
                                                                    <option value="">Pilih Pembayaran</option>
                                                                    <option value="tunai">Tunai</option>
                                                                    <option value="transfer">Transfer</option>
                                                                </select>
                                                            </div>

                                                            <!-- Common field for both Tunai and Transfer -->
                                                            <div class="mb-3">
                                                                <label for="nama_peserta" class="form-label">Atas
                                                                    Nama</label>
                                                                <input type="text" class="form-control"
                                                                    name="nama_peserta" required>
                                                            </div>

                                                            <!-- Additional fields for Transfer only -->
                                                            <div id="transferFields" style="display: none;">
                                                                <div class="mb-3">
                                                                    <label for="nama_bank" class="form-label">Nama
                                                                        Bank</label>
                                                                    <select name="via" class="form-control">
                                                                        <option value="">Pilih Bank</option>
                                                                        <option value="BCA">BCA</option>
                                                                        <option value="BRI">BRI</option>
                                                                        <option value="BNI">BNI</option>
                                                                        <option value="Mandiri">Mandiri</option>
                                                                        <option value="Lainnya">Lainnya</option>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="bukti" class="form-label">Bukti
                                                                        Pembayaran</label>
                                                                    <input type="file" class="form-control"
                                                                        name="bukti">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 d-flex justify-content-end">
                                                            <button type="button" class="btn btn-secondary me-2"
                                                                data-bs-dismiss="modal">Tutup</button>
                                                            <button type="submit"
                                                                class="btn btn-primary me-3">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <!-- Bukti Pembayaran Modal -->
                                    <div class="modal fade" id="buktiModal" tabindex="-1"
                                        aria-labelledby="buktiModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="buktiModalLabel">Bukti Pembayaran</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <img id="buktiImage" src="" alt="Bukti Pembayaran"
                                                        class="img-fluid" style="max-height: 400px;">
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

    <script>
        function saveJurusan() {
            document.getElementById('jurusanForm').submit();
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var buktiModal = document.getElementById('buktiModal');
            buktiModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var buktiUrl = button.getAttribute('data-bukti');
                var buktiImage = buktiModal.querySelector('#buktiImage');
                buktiImage.src = buktiUrl;
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var paymentModal = document.getElementById('paymentModal');
            paymentModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var studentId = button.getAttribute('data-id');
                var studentNisn = button.getAttribute('data-nisn');
                var inputStudentId = paymentModal.querySelector('#studentId');
                var inputNisn = paymentModal.querySelector('input[name="nisn"]');

                inputStudentId.value = studentId;
                inputNisn.value = studentNisn;
            });
        });
    </script>

    <!-- Script to Pass Student ID to Modal -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var paymentModal = document.getElementById('paymentModal');
            paymentModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var studentId = button.getAttribute('data-id');
                var inputStudentId = paymentModal.querySelector('#studentId');
                inputStudentId.value = studentId;
            });
        });
    </script>

    <script>
        document.getElementById('jenisPembayaranSelect').addEventListener('change', function() {
            var paymentType = this.value;
            var transferFields = document.getElementById('transferFields');

            // Show transfer fields only if "Transfer" is selected
            if (paymentType === 'transfer') {
                transferFields.style.display = 'block';
            } else {
                transferFields.style.display = 'none';
            }
        });
    </script>
@endpush
