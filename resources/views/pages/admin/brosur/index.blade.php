@extends('layouts.app')

@section('title', 'Admin')
@push('style')
    <link href="{{ asset('assets2/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('main')
    <div class="page-content">

        @if ($errors->any())
            <script>
                var errorMessages = '';
                @foreach ($errors->all() as $error)
                    errorMessages += '{{ $error }}\n';
                @endforeach

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: errorMessages,
                    showConfirmButton: true
                });
            </script>
        @endif


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
                                <li class="breadcrumb-item active">List</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="float-end d-none d-sm-block">
                            <a href="{{ route('jurusan.create') }}" class="btn btn-success"><i class="fas fa-plus"></i>
                                Add Data</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="container-fluid">
            <div class="page-content-wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="header-title">Brosur</h4>
                                <p class="card-title-desc">File ini akan di tampilkan di halaman depan website ini, harap
                                    masukan file dengan format PDF.</p>

                                <div>
                                    <div class="row">
                                        <div class="col-6">
                                            <form action="{{ route('brosur.store') }}" method="POST"
                                                enctype="multipart/form-data" class="dropzone">
                                                @csrf
                                                <div class="fallback">
                                                    <input name="file" type="file" required>
                                                </div>
                                                <div class="dz-message needsclick">
                                                    <div class="mb-3">
                                                        <i class="display-4 text-muted mdi mdi-cloud-upload-outline"></i>
                                                    </div>
                                                    <h4>Drop file here to upload or click to select</h4>
                                                </div>
                                                <div class="text-center mt-4">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                        Save Brosur
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- Column for Brosur file icon and link, centered -->
                                        <div class="col-6 d-flex justify-content-center align-items-center">
                                            @if ($brosur && $brosur->file)
                                                <div class="text-center">
                                                    <!-- Displaying file icon -->
                                                    <i class="fas fa-file-pdf fa-5x text-danger"></i>
                                                    <!-- File name with link to view -->
                                                    <div class="mt-2">
                                                        <a href="{{ asset('storage/' . $brosur->file) }}" target="_blank">
                                                            {{ basename($brosur->file) }}
                                                        </a>
                                                    </div>
                                                </div>
                                            @else
                                                <p class="text-center">No Brosur uploaded yet.</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div> <!-- end col -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="header-title">Informasi</h4>
                                <p class="card-title-desc">File ini akan di tampilkan di halaman depan website.</p>

                                <div>
                                    <div class="row">
                                        <div class="col-6">
                                            <form action="{{ route('informasi.store') }}" method="POST"
                                                enctype="multipart/form-data" class="dropzone">
                                                @csrf
                                                <div class="fallback">
                                                    <input name="file" type="file">
                                                </div>
                                                <div class="dz-message needsclick">
                                                    <div class="mb-3">
                                                        <i class="display-4 text-muted mdi mdi-cloud-upload-outline"></i>
                                                    </div>
                                                    <h4>Drop file here to upload or click to select</h4>
                                                </div>
                                                <div class="text-center mt-4">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                        Save Informasi
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- Column for Brosur file icon and link, centered -->
                                        <div class="col-6 d-flex justify-content-center align-items-center">
                                            @if ($informasi && $informasi->file)
                                                <div class="text-center">
                                                    <!-- Displaying file icon -->
                                                    <i class="fas fa-file-pdf fa-5x text-danger"></i>
                                                    <!-- File name with link to view -->
                                                    <div class="mt-2">
                                                        <a href="{{ asset('storage/' . $informasi->file) }}"
                                                            target="_blank">
                                                            {{ basename($informasi->file) }}
                                                        </a>
                                                    </div>
                                                </div>
                                            @else
                                                <p class="text-center">No informasi uploaded yet.</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div>
        </div> <!-- container-fluid -->
    </div>
@endsection
@push('scripts')
    <!-- Plugins js -->
    <script src="{{ asset('assets2/libs/dropzone/min/dropzone.min.js') }}"></script>
@endpush
