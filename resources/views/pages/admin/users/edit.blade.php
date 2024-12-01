@extends('layouts.app')

@section('title', 'Edit User')
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
                            <h4>Edit User</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Menu</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                                <li class="breadcrumb-item active">Edit</li>
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
                                <h4 class="header-title">Edit Data User</h4>
                                <p class="card-title-desc">Update user information.</p>

                                <form action="{{ route('users.update', $user->id) }}" method="POST" class="needs-validation" novalidate>
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Nama Lengkap</label>
                                                <input type="text" name="name" class="form-control" id="name"
                                                    placeholder="Masukkan nama lengkap" value="{{ old('name', $user->name) }}" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid name.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="level" class="form-label">Level</label>
                                                <select name="level" class="form-select" id="level" required onchange="toggleFields()">
                                                    <option value="">Pilih Level</option>
                                                    <option value="admin" {{ old('level', $user->level) === 'admin' ? 'selected' : '' }}>Admin</option>
                                                    <option value="operator" {{ old('level', $user->level) === 'operator' ? 'selected' : '' }}>Operator</option>
                                                    <option value="siswa" {{ old('level', $user->level) === 'siswa' ? 'selected' : '' }}>Siswa</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a level.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12" id="username-field" style="display: {{ old('level', $user->level) === 'admin' ? 'block' : 'none' }};">
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" name="username" class="form-control"
                                                    id="username" placeholder="Masukkan username" value="{{ old('username', $user->username) }}">
                                                <div class="invalid-feedback">
                                                    Please provide a valid username.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12" id="nisn-field" style="display: {{ old('level', $user->level) === 'siswa' ? 'block' : 'none' }};">
                                            <div class="mb-3">
                                                <label for="nisn" class="form-label">NISN</label>
                                                <input type="text" name="nisn" class="form-control" id="nisn"
                                                    placeholder="Masukkan NISN" value="{{ old('nisn', $user->nisn) }}">
                                                <div class="invalid-feedback">
                                                    Please provide a valid NISN.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" name="password" class="form-control" id="password"
                                                    placeholder="Masukkan password">
                                                <div class="invalid-feedback">
                                                    Please provide a valid password.
                                                </div>
                                                <small class="text-muted">Leave blank if you do not want to change the password.</small>
                                            </div>
                                        </div>
                                    </div>
                                    <button id="submitBtn" class="btn btn-primary" style="width: 100%" type="submit">Update</button>
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
<script>
    function toggleFields() {
        var level = document.getElementById("level").value;
        var usernameField = document.getElementById("username-field");
        var nisnField = document.getElementById("nisn-field");

        if (level === "admin") {
            usernameField.style.display = "block";
            nisnField.style.display = "none";
        } else if (level === "siswa") {
            usernameField.style.display = "none";
            nisnField.style.display = "block";
        } else {
            usernameField.style.display = "none";
            nisnField.style.display = "none";
        }
    }
</script>
@endpush
