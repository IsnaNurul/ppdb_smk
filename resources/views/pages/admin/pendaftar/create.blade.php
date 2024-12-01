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
                            <h4>Data Calon Siswa</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Menu</a></li>
                                <li class="breadcrumb-item active">Data Calon Siswa</li>
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
                                <h4 class="header-title">Formulir Siswa Baru</h4>
                                <p class="card-title-desc">Harap lengkapi semua data calon siswa di bawah ini !!</p>

                                <form action="{{ route('pendaftar.store') }}" method="POST" class="needs-validation" novalidate>
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <div class="mb-3">
                                                    <label for="validationCustom03" class="form-label">Program Keahlian
                                                        1</label>
                                                    <select class="form-select" name="jurusan1" id="validationCustom03" required>
                                                        <option selected disabled value="">Pilih Kompetensi keahlian
                                                        </option>
                                                        @foreach ($jurusan1 as $item)
                                                            <option>{{ $item->nama_jurusan }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please select a valid state.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="validationCustom03" class="form-label">Program Keahlian
                                                    2</label>
                                                <select class="form-select" name="jurusan2" id="validationCustom03" required>
                                                    <option selected disabled value="">Pilih Kompetensi keahlian
                                                    </option>
                                                    @foreach ($jurusan2 as $item)
                                                        <option>{{ $item->nama_jurusan }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid state.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="schoolSelect" class="form-label">Asal Sekolah</label>
                                                <select class="form-select" name="pilihan_sekolah" id="schoolSelect" required onchange="toggleOtherSchoolField()">
                                                    <option selected disabled value="">Pilih Asal Sekolah</option>
                                                    @foreach ($asal_sekolah as $item)
                                                        <option value="{{ $item->kode_sekolah }}" data-nama="{{ $item->nama_sekolah }}">{{ $item->nama_sekolah }}</option>
                                                    @endforeach
                                                    <option value="Lainnya" data-nama="Lainnya">SMP/MTS Lainnya</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid school.
                                                </div>
                                            </div>

                                            <!-- Hidden inputs for kode_sekolah and asal_sekolah -->
                                            <input type="hidden" name="kode_sekolah" id="kodeSekolahField">
                                            <input type="hidden" name="asal_sekolah" id="namaSekolahField">

                                            <!-- Input field for "Other School" -->
                                            <div class="mb-3" id="otherSchoolField" style="display: none;">
                                                <label for="otherSchoolInput" class="form-label">Nama Sekolah</label>
                                                <input type="text" name="asal_sekolah_lainnya" class="form-control" id="otherSchoolInput"
                                                    placeholder="Masukkan nama sekolah">
                                                <div class="invalid-feedback">
                                                    Please enter your school name.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            @php
                                                $currentYear = date('Y'); // Get the current year
                                            @endphp

                                            <div class="mb-3">
                                                <label for="graduationYear" class="form-label">Tahun Lulus</label>
                                                <select class="form-select" name="tahun_lulus" id="graduationYear" required>
                                                    <option value="">Pilih Tahun</option>
                                                    @for ($year = $currentYear; $year >= 2000; $year--)
                                                        <option value="{{ $year }}">{{ $year }}</option>
                                                    @endfor
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid graduation year.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">NISN</label>
                                                <input type="text" name="nisn" class="form-control" id="validationCustom04"
                                                    placeholder="masukan NISN anda" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">NIK</label>
                                                <input type="text" name="nik" class="form-control" id="validationCustom04"
                                                    placeholder="masukan NIK anda" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Nama Lengkap</label>
                                                <input type="text" name="nama" class="form-control" id="validationCustom04"
                                                    placeholder="masukan NIK anda" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Password</label>
                                                <input type="password" name="password" class="form-control" id="validationCustom04"
                                                    placeholder="masukan Password anda" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Tempat Lahir</label>
                                                <input type="text" name="tempat_lahir"class="form-control" id="validationCustom04"
                                                    placeholder="masukan tempat lahir anda" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- Day -->
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="day" class="form-label">Tanggal Lahir</label>
                                                <select class="form-select" id="day" required>
                                                    <option selected disabled value="">Pilih Tanggal</option>
                                                    <!-- Dynamically generate days -->
                                                    @for ($i = 1; $i <= 31; $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid day.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Month -->
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="month" class="form-label">Bulan Lahir</label>
                                                <select class="form-select" id="month" required>
                                                    <option selected disabled value="">Pilih Bulan</option>
                                                    <!-- Dynamically generate months -->
                                                    <option value="1">Januari</option>
                                                    <option value="2">Februari</option>
                                                    <option value="3">Maret</option>
                                                    <option value="4">April</option>
                                                    <option value="5">Mei</option>
                                                    <option value="6">Juni</option>
                                                    <option value="7">Juli</option>
                                                    <option value="8">Agustus</option>
                                                    <option value="9">September</option>
                                                    <option value="10">Oktober</option>
                                                    <option value="11">November</option>
                                                    <option value="12">Desember</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid month.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Year -->
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="year" class="form-label">Tahun Lahir</label>
                                                <select class="form-select" id="year" required>
                                                    <option selected disabled value="">Pilih Tahun</option>
                                                    <!-- Dynamically generate years -->
                                                    @php
                                                        $currentYear = date('Y');
                                                        $startYear = 1900;
                                                    @endphp
                                                    @for ($i = $currentYear; $i >= $startYear; $i--)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid year.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Hidden input untuk menyimpan tanggal lahir -->
                                    <input type="hidden" id="dob" name="dob">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Agama</label>
                                                <input type="text" name="agama" class="form-control" id="validationCustom04"
                                                    placeholder="masukan NIK anda" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label">Jenis Kelamin</label>
                                                <div class="d-flex justify-content-between">
                                                    <!-- Male -->
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                            id="male" value="laki-laki" required>
                                                        <label class="form-check-label" for="male">
                                                            <i class="fas fa-mars" style="font-size: 18px;"></i> Laki-laki
                                                        </label>
                                                    </div>

                                                    <!-- Female -->
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                            id="female" value="perempuan" required>
                                                        <label class="form-check-label" for="female">
                                                            <i class="fas fa-venus" style="font-size: 18px;"></i>
                                                            Perempuan
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please select a gender.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Alamat</label>
                                                <textarea type="text" class="form-control" id="alamat" placeholder="masukan alamat anda"
                                                    cols="10" rows="3" required></textarea>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">No. Rumah</label>
                                                <input type="text" class="form-control" id="no_rumah"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Dusun</label>
                                                <input type="text" class="form-control" id="dusun"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">RT</label>
                                                <input type="text" class="form-control" id="rt"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">RW</label>
                                                <input type="text" class="form-control" id="rw"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Kelurahan/Desa</label>
                                                <input type="text" class="form-control" id="kelurahan_desa"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Kota/Kabupaten</label>
                                                <input type="text" class="form-control" id="kota_kabupaten"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Provinsi</label>
                                                <input type="text" class="form-control" id="provinsi"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Kode Pos</label>
                                                <input type="text" class="form-control" id="kode_pos"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="alamat_lengkap" id="alamat_lengkap">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">No.HP/Telp.</label>
                                                <input type="text" name="nohp_siswa" class="form-control" id="validationCustom04"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="schoolSelect" class="form-label">Tempat Tinggal</label>
                                                <select class="form-select" name="tempat_tinggal">
                                                    <option selected disabled value="">Pilih Tempat Tinggal</option>
                                                    <option value="Bersama orang tua">Bersama orang tua</option>
                                                    <option value="Bersama wali">Bersama wali</option>
                                                    <option value="Pesantren">Pesantren</option>
                                                    <option value="Kost">Kost</option>
                                                    <option value="Asrama">Asrama</option>
                                                    <option value="Panti asuhan">Panti asuhan</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid school.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Anak Ke</label>
                                                <input type="text" name="anak_ke" class="form-control" id="validationCustom04"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Jumlah Saudara</label>
                                                <input type="text" name="jumlah_saudara" class="form-control" id="validationCustom04"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Hobi</label>
                                                <input type="text" name="hobi" class="form-control" id="validationCustom04"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Minat
                                                    Ekstrakulikuler</label>
                                                <input type="text" name="minat" class="form-control" id="validationCustom04"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label class="form-label">Berkebutuhan Khusus</label>
                                                <div class="d-flex justify-content-between">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="berkebutuhan" id="yaBerkebutuhan" value="ya"
                                                            required>
                                                        <label class="form-check-label" for="yaBerkebutuhan">Ya</label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="berkebutuhan" id="tidakBerkebutuhan" value="tidak"
                                                            required checked>
                                                        <label class="form-check-label"
                                                            for="tidakBerkebutuhan">Tidak</label>
                                                    </div>
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please select an option.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" id="keteranganContainer" style="display: none;">
                                            <div class="mb-3">
                                                <label for="keterangan" class="form-label">Keterangan</label>
                                                <input type="text" name="berkebutuhan_khusus" class="form-control" id="keterangan"
                                                    placeholder="Masukkan keterangan">
                                                <div class="invalid-feedback">
                                                    Please provide a valid keterangan.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label class="form-label">Penerima KIPKSP</label>
                                                <div class="d-flex justify-content-between">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="kipksp"
                                                            id="yaKIPKSP" value="ya" required>
                                                        <label class="form-check-label" for="yaKIPKSP">Ya</label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="kipksp"
                                                            id="tidakKIPKSP" value="tidak" required checked>
                                                        <label class="form-check-label" for="tidakKIPKSP">Tidak</label>
                                                    </div>
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please select an option.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" id="noKIPKSPContainer" style="display: none;">
                                            <div class="mb-3">
                                                <label for="noKIPKSP" class="form-label">No. KIPKSP</label>
                                                <input type="text" class="form-control" name="no_kipksp" id="noKIPKSP"
                                                    placeholder="Masukkan No. KIPKSP">
                                                <div class="invalid-feedback">
                                                    Please provide a valid No. KIPKSP.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Tinggi
                                                    Badan(CM)</label>
                                                <input type="text" name="tinggi_badan" class="form-control" id="validationCustom04"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Berat Badan(CM)</label>
                                                <input type="text" name="berat_badan" class="form-control" id="validationCustom04"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Transportasi</label>
                                                <input type="text" name="transportasi"class="form-control" id="validationCustom04"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Jarak ke sekolah</label>
                                                <div class="d-flex justify-content-between">
                                                    <!-- Male -->
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jarak"
                                                            id="male" value="kurang dari 1 km" required>
                                                        <label class="form-check-label" for="male">Kurang dari 1
                                                            km</label>
                                                    </div>

                                                    <!-- Female -->
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jarak"
                                                            id="female" value="lebih dari 1 km" required>
                                                        <label class="form-check-label" for="female">Lebih dari 1
                                                            km</label>
                                                    </div>
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please select a gender.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Sebutkan (KM)</label>
                                                <input type="text" name="ket_jarak" class="form-control" id="validationCustom04"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Waktu Tempuh</label>
                                                <input type="text" name="waktu" class="form-control" id="validationCustom04"
                                                    placeholder="00:00" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <button id="submitBtn" class="btn btn-primary" style="width: 100%" type="submit" onclick="updateAlamat(); updateDateOfBirth();">SIMPAN DATA</button>
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
    <script>
        function updateAlamat(){
            // Get the values from all input fields
            var alamat = document.getElementById('alamat').value;
            var noRumah = document.getElementById('no_rumah').value;
            var dusun = document.getElementById('dusun').value;
            var rt = document.getElementById('rt').value;
            var rw = document.getElementById('rw').value;
            var kelurahan = document.getElementById('kelurahan_desa').value;
            var kota = document.getElementById('kota_kabupaten').value;
            var provinsi = document.getElementById('provinsi').value;
            var kodePos = document.getElementById('kode_pos').value;

            // Combine them into one string
            var fullAddress = alamat + ', No. ' + noRumah + ',' + dusun + ', RT ' + rt + '/RW ' + rw + ', ' + kelurahan + ', ' + kota + ', ' + provinsi + ', ' + kodePos;

            // Set the combined address into the textarea
            document.getElementById('alamat_lengkap').value = fullAddress;
        }
        // Add event listeners to input fields to call updateAddress whenever any input changes
        document.getElementById('alamat').addEventListener('input', updateAlamat);
        document.getElementById('no_rumah').addEventListener('input', updateAlamat);
        document.getElementById('dusun').addEventListener('input', updateAlamat);
        document.getElementById('rt').addEventListener('input', updateAlamat);
        document.getElementById('rw').addEventListener('input', updateAlamat);
        document.getElementById('kelurahan_desa').addEventListener('input', updateAlamat);
        document.getElementById('kota_kabupaten').addEventListener('input', updateAlamat);
        document.getElementById('provinsi').addEventListener('input', updateAlamat);
        document.getElementById('kode_pos').addEventListener('input', updateAlamat);
    </script>
    <script>
        // Fungsi untuk memperbarui tanggal lahir di field hidden
        function updateDateOfBirth() {
            const day = document.getElementById('day').value;
            const month = document.getElementById('month').value;
            const year = document.getElementById('year').value;

            if (day && month && year) {
                // Format tanggal sebagai YYYY-MM-DD
                const dob = `${year}-${String(month).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                document.getElementById('dob').value = dob;
            }
        }

        // Menambahkan event listener untuk setiap elemen dropdown
        document.getElementById('day').addEventListener('change', updateDateOfBirth);
        document.getElementById('month').addEventListener('change', updateDateOfBirth);
        document.getElementById('year').addEventListener('change', updateDateOfBirth);
    </script>
    <script>
        function toggleOtherSchoolField() {
            const schoolSelect = document.getElementById('schoolSelect');
            const otherSchoolField = document.getElementById('otherSchoolField');

            // Show the "Other School" field if "Lainnya" is selected
            if (schoolSelect.value === 'Lainnya') {
                otherSchoolField.style.display = 'block';
            } else {
                otherSchoolField.style.display = 'none';
            }

            // Ambil opsi yang dipilih
            const selectedOption = schoolSelect.options[schoolSelect.selectedIndex];

            // Ambil nilai kode sekolah dari value dan nama sekolah dari atribut data-nama
            const kodeSekolah = selectedOption.value;
            const namaSekolah = selectedOption.getAttribute('data-nama');

            // Set nilai input hidden
            document.getElementById('kodeSekolahField').value = kodeSekolah;
            document.getElementById('namaSekolahField').value = namaSekolah;
        }
    </script>

    <!-- JavaScript -->
    <script>
        // Function to toggle visibility of input fields based on radio button selection
        document.getElementById('yaBerkebutuhan').addEventListener('change', function() {
            document.getElementById('keteranganContainer').style.display = 'block';
        });

        document.getElementById('tidakBerkebutuhan').addEventListener('change', function() {
            document.getElementById('keteranganContainer').style.display = 'none';
        });

        document.getElementById('yaKIPKSP').addEventListener('change', function() {
            document.getElementById('noKIPKSPContainer').style.display = 'block';
        });

        document.getElementById('tidakKIPKSP').addEventListener('change', function() {
            document.getElementById('noKIPKSPContainer').style.display = 'none';
        });
    </script>
@endpush
