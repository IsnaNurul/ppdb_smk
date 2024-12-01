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
                            <h4>Informasi Kontak</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Menu</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Informasi Kontak</a></li>
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
                                <h4 class="header-title">Informasi Kontak</h4>
                                <p class="card-title-desc">Data ini akan di tampilan di halaman depan website !!</p>

                                <form action="{{ route('kontak.store') }}" method="POST" class="needs-validation"
                                    novalidate>
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="alamat_sekolah" class="form-label">Alamat Sekolah</label>
                                                <textarea class="form-control" name="alamat" id="alamat_sekolah" cols="30" rows="3">{{ old('alamat', $contact->alamat ?? '') }}</textarea>
                                                <div class="invalid-feedback">
                                                    Please provide a valid address.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email" id="email"
                                                    value="{{ old('email', $contact->email ?? '') }}" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid email.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="nohp1" class="form-label">No. HP/Telp 1</label>
                                                <input type="number" name="nohp1" class="form-control" id="nohp1"
                                                    value="{{ old('nohp1', $contact->nohp1 ?? '') }}" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid phone number.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="nohp2" class="form-label">No. HP/Telp 2</label>
                                                <input type="number" name="nohp2" class="form-control" id="nohp2"
                                                    value="{{ old('nohp2', $contact->nohp2 ?? '') }}">
                                                <div class="invalid-feedback">
                                                    Please provide a valid phone number.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="nohp3" class="form-label">No. HP/Telp 3</label>
                                                <input type="number" name="nohp3" class="form-control" id="nohp3"
                                                    value="{{ old('nohp3', $contact->nohp3 ?? '') }}">
                                                <div class="invalid-feedback">
                                                    Please provide a valid phone number.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Social Media Links Section -->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="tiktok_link" class="form-label">TikTok</label>
                                                <input type="url" name="tiktok" class="form-control" id="tiktok_link"
                                                    placeholder="https://www.tiktok.com/@..."
                                                    value="{{ old('tiktok', $contact->tiktok ?? '') }}">
                                                <div class="invalid-feedback">
                                                    Please provide a valid TikTok link.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="youtube_link" class="form-label">YouTube</label>
                                                <input type="url" name="youtube" class="form-control" id="youtube_link"
                                                    placeholder="https://www.youtube.com/channel/..."
                                                    value="{{ old('youtube', $contact->youtube ?? '') }}">
                                                <div class="invalid-feedback">
                                                    Please provide a valid YouTube link.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="instagram_link" class="form-label">Instagram</label>
                                                <input type="url" name="instagram" class="form-control"
                                                    id="instagram_link" placeholder="https://www.instagram.com/..."
                                                    value="{{ old('instagram', $contact->instagram ?? '') }}">
                                                <div class="invalid-feedback">
                                                    Please provide a valid Instagram link.
                                                </div>
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
