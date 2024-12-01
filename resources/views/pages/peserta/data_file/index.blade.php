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
                            <h4>Data File</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Menu</a></li>
                                <li class="breadcrumb-item active">Data File</li>
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
                                <p class="card-title-desc">*Tidak diharuskan untuk input sekarang, foto dan ijazah bisa langsung diberikan waktu daftar ulang</p>

                                <form action="{{ route('data-file.store') }}" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <!-- Foto Section -->
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="foto" class="form-label">Foto</label>
                                                @if(isset($data->foto))
                                                    <!-- Show existing photo if it exists -->
                                                    <div class="mb-2">
                                                        <a href="{{ asset('storage/' . $data->foto) }}" target="_blank">Lihat Foto</a>
                                                    </div>
                                                @endif
                                                <input type="file" name="foto" class="form-control" id="foto" {{ !isset($data->foto) ? 'required' : '' }}>
                                                <div class="invalid-feedback">
                                                    Please provide a valid photo.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Ijazah Section -->
                                        <div class="col-md-7">
                                            <div class="mb-3">
                                                <label for="ijazah" class="form-label">Ijazah</label>
                                                @if(isset($data->ijazah))
                                                    <!-- Show existing certificate if it exists -->
                                                    <div class="mb-2">
                                                        <a href="{{ asset('storage/' . $data->ijazah) }}" target="_blank">Lihat Ijazah</a>
                                                    </div>
                                                @endif
                                                <input type="file" name="ijazah" class="form-control" id="ijazah" {{ !isset($data->ijazah) ? 'required' : '' }}>
                                                <div class="invalid-feedback">
                                                    Please provide a valid certificate.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <button id="submitBtn" class="btn btn-primary" style="width: 100%" type="submit">Upload</button>
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
