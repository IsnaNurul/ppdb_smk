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

                                <form action="{{ route('data-siswa.update',$dataSiswa->id) }}" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
                                    @csrf
                                    @method('PUT')
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
                                                            <option value="{{ $item->nama_jurusan }}" {{ $dataSiswa && $dataSiswa->jurusan1 == $item->nama_jurusan ? 'selected' : '' }}>
                                                                {{ $item->nama_jurusan }}
                                                            </option>
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
                                                            <option value="{{ $item->nama_jurusan }}" {{ $dataSiswa && $dataSiswa->jurusan2 == $item->nama_jurusan ? 'selected' : '' }}>
                                                                {{ $item->nama_jurusan }}
                                                            </option>
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
                                                    <option value="{{ $item->kode_sekolah }}" 
                                                            data-nama="{{ $item->nama_sekolah }}" 
                                                            {{ isset($dataSiswa) && $dataSiswa->kode_sekolah == $item->kode_sekolah ? 'selected' : '' }}>
                                                        {{ $item->nama_sekolah }}
                                                    </option>
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
                                                        <option value="{{ $year }}" {{ $dataSiswa && $dataSiswa->tahun_lulus == $year ? 'selected' : '' }}>{{ $year }}</option>
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
                                                    placeholder="masukan NISN anda" value="{{ $dataSiswa ? $dataSiswa->nisn : '' }}" readonly required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">NIK</label>
                                                <input type="text" name="nik" value="{{ $dataSiswa ? $dataSiswa->nik : '' }}" class="form-control" id="validationCustom04"
                                                    placeholder="masukan NIK anda" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Nama Lengkap</label>
                                                <input type="text" name="nama" value="{{ $dataSiswa ? $dataSiswa->nama : '' }}" class="form-control" id="validationCustom04"
                                                    placeholder="masukan NIK anda" required>
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
                                                <input type="text" name="tempat_lahir" value="{{ $dataSiswa ? $dataSiswa->tempat_lahir : '' }}" class="form-control" id="validationCustom04"
                                                    placeholder="masukan tempat lahir anda" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    @php
                                        $dateOfBirth = $dataSiswa->tanggal_lahir ?? null; // Ambil tanggal lahir dari database
                                        $year = $month = $day = null;

                                        if ($dateOfBirth) {
                                            // Pecah tanggal menjadi bagian tahun, bulan, dan hari
                                            [$year, $month, $day] = explode('-', $dateOfBirth);
                                        }
                                    @endphp
                                        <!-- Day -->
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="day" class="form-label">Tanggal Lahir</label>
                                                <select class="form-select" id="day" required>
                                                    <option selected disabled value="">Pilih Tanggal</option>
                                                    <!-- Dynamically generate days -->
                                                    @for ($i = 1; $i <= 31; $i++)
                                                        <option value="{{ $i }}" {{ $i == (int)$day ? 'selected' : '' }}>{{ $i }}</option>
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
                                                    <option value="1" {{ $month == '01' ? 'selected' : '' }}>Januari</option>
                                                    <option value="2" {{ $month == '02' ? 'selected' : '' }}>Februari</option>
                                                    <option value="3" {{ $month == '03' ? 'selected' : '' }}>Maret</option>
                                                    <option value="4" {{ $month == '04' ? 'selected' : '' }}>April</option>
                                                    <option value="5" {{ $month == '05' ? 'selected' : '' }}>Mei</option>
                                                    <option value="6" {{ $month == '06' ? 'selected' : '' }}>Juni</option>
                                                    <option value="7" {{ $month == '07' ? 'selected' : '' }}>Juli</option>
                                                    <option value="8" {{ $month == '08' ? 'selected' : '' }}>Agustus</option>
                                                    <option value="9" {{ $month == '09' ? 'selected' : '' }}>September</option>
                                                    <option value="10" {{ $month == '10' ? 'selected' : '' }}>Oktober</option>
                                                    <option value="11" {{ $month == '11' ? 'selected' : '' }}>November</option>
                                                    <option value="12" {{ $month == '12' ? 'selected' : '' }}>Desember</option>
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
                                                        <option value="{{ $i }}" {{ $i == (int)$year ? 'selected' : '' }}>{{ $i }}</option>
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
                                                <input type="text" name="agama" value="{{ $dataSiswa ? $dataSiswa->agama : '' }}" class="form-control" id="validationCustom04"
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
                                                            id="male" value="laki-laki" {{ $dataSiswa && $dataSiswa->jenis_kelamin == 'laki-laki' ? 'checked' : '' }} required>
                                                        <label class="form-check-label" for="male">
                                                            <i class="fas fa-mars" style="font-size: 18px;"></i> Laki-laki
                                                        </label>
                                                    </div>

                                                    <!-- Female -->
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                            id="female" value="perempuan" {{ $dataSiswa && $dataSiswa->jenis_kelamin == 'perempuan' ? 'checked' : '' }} required>
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
                                                    cols="10" rows="3" required>{{ $alamatComponents['alamat'] }}</textarea>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">No. Rumah</label>
                                                <input type="text" class="form-control" value="{{ $alamatComponents['no_rumah'] ?? '' }} " id="no_rumah"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Dusun</label>
                                                <input type="text" class="form-control" id="dusun" value="{{ $alamatComponents['dusun'] ?? '' }}"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">RT</label>
                                                <input type="text" class="form-control" id="rt" value="{{ $alamatComponents['rt'] ?? '' }}"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">RW</label>
                                                <input type="text" class="form-control" id="rw" value="{{ $alamatComponents['rw'] ?? ''}}"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Kelurahan/Desa</label>
                                                <input type="text" class="form-control" id="kelurahan_desa" value="{{ $alamatComponents['kelurahan_desa'] ?? '' }}"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Kota/Kabupaten</label>
                                                <input type="text" class="form-control" id="kota_kabupaten" value="{{ $alamatComponents['kota_kabupaten'] ?? '' }}"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Provinsi</label>
                                                <input type="text" class="form-control" id="provinsi" value="{{ $alamatComponents['provinsi'] ?? '' }}"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Kode Pos</label>
                                                <input type="text" class="form-control" id="kode_pos" value="{{ $alamatComponents['kode_pos'] ?? '' }}"
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
                                                <input type="text" name="nohp_siswa" value="{{ $dataSiswa ? $dataSiswa->nohp_siswa : '' }}" class="form-control" id="validationCustom04"
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
                                                    <option value="Bersama orang tua" {{ $dataSiswa && $dataSiswa->tempat_tinggal == 'Bersama orang tua' ? 'selected' : '' }}>Bersama orang tua</option>
                                                    <option value="Bersama wali" {{ $dataSiswa && $dataSiswa->tempat_tinggal == 'Bersama wali' ? 'selected' : '' }}>Bersama wali</option>
                                                    <option value="Pesantren" {{ $dataSiswa && $dataSiswa->tempat_tinggal == 'Pesantren' ? 'selected' : '' }}>Pesantren</option>
                                                    <option value="Kost" {{ $dataSiswa && $dataSiswa->tempat_tinggal == 'Kost' ? 'selected' : '' }}>Kost</option>
                                                    <option value="Asrama" {{ $dataSiswa && $dataSiswa->tempat_tinggal == 'Asrama' ? 'selected' : '' }}>Asrama</option>
                                                    <option value="Panti asuhan" {{ $dataSiswa && $dataSiswa->tempat_tinggal == 'Panti asuhan' ? 'selected' : '' }}>Panti asuhan</option>
                                                    <option value="Lainnya" {{ $dataSiswa && $dataSiswa->tempat_tinggal == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid school.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Anak Ke</label>
                                                <input type="text" name="anak_ke" value="{{ $dataSiswa ? $dataSiswa->anak_ke : '' }}" class="form-control" id="validationCustom04"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Jumlah Saudara</label>
                                                <input type="text" name="jumlah_saudara" value="{{ $dataSiswa ? $dataSiswa->jumlah_saudara : '' }}" class="form-control" id="validationCustom04"
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
                                                <input type="text" name="hobi" value="{{ $dataSiswa ? $dataSiswa->hobi : '' }}" class="form-control" id="validationCustom04"
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
                                                <input type="text" name="minat" value="{{ $dataSiswa ? $dataSiswa->minat_ekskul : '' }}" class="form-control" id="validationCustom04"
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
                                                            name="berkebutuhan" id="yaBerkebutuhan" value="ya" {{ $dataSiswa && $dataSiswa->kebutuhan_khusus != null ? 'checked' : '' }} required>
                                                        <label class="form-check-label" for="yaBerkebutuhan">Ya</label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="berkebutuhan" id="tidakBerkebutuhan" value="tidak" {{ $dataSiswa && $dataSiswa->kebutuhan_khusus == null ? 'checked' : '' }}
                                                            required>
                                                        <label class="form-check-label"
                                                            for="tidakBerkebutuhan">Tidak</label>
                                                    </div>
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please select an option.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" id="keteranganContainer" style="display: {{ $dataSiswa && $dataSiswa->kebutuhan_khusus != null ? 'block' : 'none' }};">
                                            <div class="mb-3">
                                                <label for="keterangan" class="form-label">Keterangan</label>
                                                <input type="text" name="berkebutuhan_khusus" value="{{ $dataSiswa ? $dataSiswa->kebutuhan_khusus : '' }}" class="form-control" id="keterangan"
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
                                                        <input class="form-check-input" type="radio" name="kipksp" {{ $dataSiswa && $dataSiswa->no_kipksp != null ? 'checked' : '' }}
                                                            id="yaKIPKSP" value="ya" required>
                                                        <label class="form-check-label" for="yaKIPKSP">Ya</label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="kipksp" {{ $dataSiswa && $dataSiswa->no_kipksp == null ? 'checked' : '' }}
                                                            id="tidakKIPKSP" value="tidak" required>
                                                        <label class="form-check-label" for="tidakKIPKSP">Tidak</label>
                                                    </div>
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please select an option.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" id="noKIPKSPContainer" style="display: {{ $dataSiswa && $dataSiswa->no_kipksp != null ? 'block' : 'none' }};">
                                            <div class="mb-3">
                                                <label for="noKIPKSP" class="form-label">No. KIPKSP</label>
                                                <input type="text" class="form-control" value="{{ $dataSiswa ? $dataSiswa->no_kipksp : '' }}" name="no_kipksp" id="noKIPKSP"
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
                                                <input type="text" name="tinggi_badan" value="{{ $dataSiswa ? $dataSiswa->tinggi_badan : '' }}" class="form-control" id="validationCustom04"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Berat Badan(CM)</label>
                                                <input type="text" name="berat_badan" class="form-control" value="{{ $dataSiswa ? $dataSiswa->berat_badan : '' }}" id="validationCustom04"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Transportasi</label>
                                                <input type="text" name="transportasi"class="form-control" value="{{ $dataSiswa ? $dataSiswa->transportasi : '' }}" id="validationCustom04"
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
                                                            id="male" value="kurang dari 1 km" {{ $dataSiswa && $dataSiswa->jarak == 'kurang dari 1 km' ? 'checked' : '' }} required>
                                                        <label class="form-check-label" for="male">Kurang dari 1
                                                            km</label>
                                                    </div>

                                                    <!-- Female -->
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jarak"
                                                            id="female" value="lebih dari 1 km" {{ $dataSiswa && $dataSiswa->jarak == 'lebih dari 1 km' ? 'checked' : '' }} required>
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
                                                <input type="text" name="ket_jarak" value="{{ $dataSiswa ? $dataSiswa->ket_jarak : '' }}" class="form-control" id="validationCustom04"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Waktu Tempuh</label>
                                                <input type="text" name="waktu" value="{{ $dataSiswa ? $dataSiswa->waktu : '' }}" class="form-control" id="validationCustom04"
                                                    placeholder="00:00" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <button id="submitBtn" class="btn btn-primary" style="width: 100%" type="submit" onclick="updateAlamat(); updateDateOfBirth();">Selanjutnya</button>
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
    <script>
        // Cek saat form disubmit
        document.querySelector('form').addEventListener('submit', function (event) {
            const jurusan1 = document.querySelector('select[name="jurusan1"]').value;
            const jurusan2 = document.querySelector('select[name="jurusan2"]').value;
    
            // Jika jurusan1 dan jurusan2 sama, tampilkan pesan kesalahan
            if (jurusan1 && jurusan2 && jurusan1 === jurusan2) {
                event.preventDefault(); // Batalkan pengiriman form
                alert("Program Keahlian 1 dan Program Keahlian 2 harus berbeda!");
            }
        });
    </script>    
@endpush
