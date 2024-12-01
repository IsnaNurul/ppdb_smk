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
                            <h4>Data Orang Tua / Wali</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Menu</a></li>
                                <li class="breadcrumb-item active">Data Orang Tua / Wali</li>
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

                                <form action="{{ $route }}" method="POST" class="needs-validation" novalidate>
                                    @csrf
                                    @if ($method == 'PUT')
                                        @method('PUT')
                                    @endif
                                    <h4 class="text-center">Data Ayah</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Nama Lengkap</label>
                                                <input type="text" name="nama_ayah" class="form-control" value="{{ $ortu->nama_ayah ?? '' }}" id="validationCustom04" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">NIK</label>
                                                <input type="text" name="nik_ayah" value="{{ $ortu->nik_ayah ?? '' }}" class="form-control" id="validationCustom04" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="month" class="form-label">Pendidikan Terakhir</label>
                                                <select class="form-select" name="pendidikan_ayah" id="month" required>
                                                    <option selected disabled value="">Pilih Pendidikan Terakhir</option>
                                                    <!-- Dynamically generate months -->
                                                    <option value="SMP/SLTP" {{ $ortu && $ortu->pendidikan_ayah == 'SMP/SLTP' ? 'selected' : '' }}>SMP/SLTP</option>
                                                    <option value="SMA/SLTA" {{ $ortu && $ortu->pendidikan_ayah == 'SMA/SLTA' ? 'selected' : '' }}>SMA/SLTA</option>
                                                    <option value="D1" {{ $ortu && $ortu->pendidikan_ayah == 'D1' ? 'selected' : '' }}>D1</option>
                                                    <option value="D2" {{ $ortu && $ortu->pendidikan_ayah == 'D2' ? 'selected' : '' }}>D2</option>
                                                    <option value="D3" {{ $ortu && $ortu->pendidikan_ayah == 'D3' ? 'selected' : '' }}>D3</option>
                                                    <option value="D4" {{ $ortu && $ortu->pendidikan_ayah == 'D4' ? 'selected' : '' }}>D4</option>
                                                    <option value="S1" {{ $ortu && $ortu->pendidikan_ayah == 'S1' ? 'selected' : '' }}>S1</option>
                                                    <option value="S2" {{ $ortu && $ortu->pendidikan_ayah == 'S2' ? 'selected' : '' }}>S2</option>
                                                    <option value="S3" {{ $ortu && $ortu->pendidikan_ayah == 'S3' ? 'selected' : '' }}>S3</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid month.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Pekerjaan</label>
                                                <input type="text" name="pekerjaan_ayah" value="{{ $ortu->pekerjaan_ayah ?? '' }}" class="form-control" id="validationCustom04" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Penghasilan (perbulan)</label>
                                                <input type="text" name="penghasilan_ayah" value="{{ $ortu->penghasilan_ayah ?? '' }}" class="form-control" id="validationCustom04" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        @php
                                            $tanggal_lahir_ayah = $ortu->tanggal_lahir_ayah ?? null;
                                            $year_ayah = $month_ayah = $day_ayah = null;

                                            if ($tanggal_lahir_ayah) {
                                                // Pecah tanggal menjadi bagian tahun, bulan, dan hari
                                                [$year_ayah, $month_ayah, $day_ayah] = explode('-', $tanggal_lahir_ayah);
                                            }
                                        @endphp
                                        <!-- Day -->
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="day" class="form-label">Tanggal Lahir</label>
                                                <select class="form-select" id="day_ayah" required>
                                                    <option selected disabled value="">Pilih Tanggal</option>
                                                    <!-- Dynamically generate days -->
                                                    @for ($i = 1; $i <= 31; $i++)
                                                        <option value="{{ $i }}" {{ $i == (int)$day_ayah ? 'selected' : '' }}>{{ $i }}</option>
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
                                                <select class="form-select" id="month_ayah" required>
                                                    <option selected disabled value="">Pilih Bulan</option>
                                                    <!-- Dynamically generate months -->
                                                    <option value="1" {{ $month_ayah == '01' ? 'selected' : '' }}>Januari</option>
                                                    <option value="2" {{ $month_ayah == '02' ? 'selected' : '' }}>Februari</option>
                                                    <option value="3" {{ $month_ayah == '03' ? 'selected' : '' }}>Maret</option>
                                                    <option value="4" {{ $month_ayah == '04' ? 'selected' : '' }}>April</option>
                                                    <option value="5" {{ $month_ayah == '05' ? 'selected' : '' }}>Mei</option>
                                                    <option value="6" {{ $month_ayah == '06' ? 'selected' : '' }}>Juni</option>
                                                    <option value="7" {{ $month_ayah == '07' ? 'selected' : '' }}>Juli</option>
                                                    <option value="8" {{ $month_ayah == '08' ? 'selected' : '' }}>Agustus</option>
                                                    <option value="9" {{ $month_ayah == '09' ? 'selected' : '' }}>September</option>
                                                    <option value="10" {{ $month_ayah == '10' ? 'selected' : '' }}>Oktober</option>
                                                    <option value="11" {{ $month_ayah == '11' ? 'selected' : '' }}>November</option>
                                                    <option value="12" {{ $month_ayah == '12' ? 'selected' : '' }}>Desember</option>
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
                                                <select class="form-select" id="year_ayah" required>
                                                    <option selected disabled value="">Pilih Tahun</option>
                                                    <!-- Dynamically generate years -->
                                                    @php
                                                        $currentYear = date('Y');
                                                        $startYear = 1900;
                                                    @endphp
                                                    @for ($i = $currentYear; $i >= $startYear; $i--)
                                                    <option value="{{ $i }}" {{ $i == (int)$year_ayah ? 'selected' : '' }}>{{ $i }}</option>
                                                    @endfor
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid year.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Hidden input untuk menyimpan tanggal lahir -->
                                    <input type="hidden" id="tanggal_lahir_ayah" name="tanggal_lahir_ayah">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Alamat</label>
                                                <textarea type="text" class="form-control" id="alamat_ayah"
                                                    cols="10" rows="3" required>{{ $alamatComponents_ayah['alamat'] }}</textarea>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">No. Rumah</label>
                                                <input type="text" class="form-control" value="{{ $alamatComponents_ayah['no_rumah'] }}" id="no_rumah_ayah"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Dusun</label>
                                                <input type="text" class="form-control" value="{{ $alamatComponents_ayah['dusun'] }}" id="dusun_ayah"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">RT</label>
                                                <input type="text" class="form-control" value="{{ $alamatComponents_ayah['rt'] }}" id="rt_ayah"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">RW</label>
                                                <input type="text" class="form-control" value="{{ $alamatComponents_ayah['rw'] }}" id="rw_ayah"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Kelurahan/Desa</label>
                                                <input type="text" class="form-control" value="{{ $alamatComponents_ayah['kelurahan_desa'] }}" id="kelurahan_desa_ayah"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Kota/Kabupaten</label>
                                                <input type="text" class="form-control" value="{{ $alamatComponents_ayah['kota_kabupaten'] }}" id="kota_kabupaten_ayah"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Provinsi</label>
                                                <input type="text" class="form-control" value="{{ $alamatComponents_ayah['provinsi'] }}" id="provinsi_ayah"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Kode Pos</label>
                                                <input type="text" class="form-control" value="{{ $alamatComponents_ayah['kode_pos'] }}" id="kode_pos_ayah"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="alamat_lengkap_ayah" id="alamat_lengkap_ayah">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">No.HP/Telp.</label>
                                                <input type="text" name="nohp_ayah" class="form-control" value="{{ $ortu->nohp_ayah ?? '' }}" id="validationCustom04" required>
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
                                                            name="kebutuhankhusus_ayah" id="yaBerkebutuhan_ayah" value="ya" {{ $ortu && $ortu->kebutuhankhusus_ayah != null ? 'checked' : '' }}
                                                            required>
                                                        <label class="form-check-label" for="yaBerkebutuhan_ayah">Ya</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="kebutuhankhusus_ayah" id="tidakBerkebutuhan_ayah" value="tidak" {{ $ortu && $ortu->kebutuhankhusus_ayah == null ? 'checked' : '' }}
                                                            required checked>
                                                        <label class="form-check-label"
                                                            for="tidakBerkebutuhan_ayah">Tidak</label>
                                                    </div>
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please select an option.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" id="keteranganContainer_ayah" style="display: {{ $ortu && $ortu->kebutuhankhusus_ayah != null ? 'block' : 'none' }};">
                                            <div class="mb-3">
                                                <label for="keterangan" class="form-label">Keterangan</label>
                                                <input type="text" name="ket_kebutuhankhusus_ayah" class="form-control" id="keterangan"
                                                    placeholder="Masukkan keterangan">
                                                <div class="invalid-feedback">
                                                    Please provide a valid keterangan.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <h4 class="text-center">Data Ibu</h4>
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Nama Lengkap</label>
                                                <input type="text" name="nama_ibu" class="form-control" id="validationCustom04" required value="{{ $ortu->nama_ibu ?? '' }}">
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">NIK</label>
                                                <input type="text" name="nik_ibu" class="form-control" id="validationCustom04" value="{{ $ortu->nik_ibu ?? '' }}" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="month" class="form-label">Pendidikan Terakhir</label>
                                                <select class="form-select" name="pendidikan_ibu" id="month" required>
                                                    <option selected disabled value="">Pilih Pendidikan Terakhir</option>
                                                    <!-- Dynamically generate months -->
                                                    <option value="SMP/SLTP" {{ $ortu && $ortu->pendidikan_ibu == 'SMP/SLTP' ? 'selected' : '' }}>SMP/SLTP</option>
                                                    <option value="SMA/SLTA" {{ $ortu && $ortu->pendidikan_ibu == 'SMA/SLTA' ? 'selected' : '' }}>SMA/SLTA</option>
                                                    <option value="D1" {{ $ortu && $ortu->pendidikan_ibu == 'D1' ? 'selected' : '' }}>D1</option>
                                                    <option value="D2" {{ $ortu && $ortu->pendidikan_ibu == 'D2' ? 'selected' : '' }}>D2</option>
                                                    <option value="D3" {{ $ortu && $ortu->pendidikan_ibu == 'D3' ? 'selected' : '' }}>D3</option>
                                                    <option value="D4" {{ $ortu && $ortu->pendidikan_ibu == 'D4' ? 'selected' : '' }}>D4</option>
                                                    <option value="S1" {{ $ortu && $ortu->pendidikan_ibu == 'S1' ? 'selected' : '' }}>S1</option>
                                                    <option value="S2" {{ $ortu && $ortu->pendidikan_ibu == 'S2' ? 'selected' : '' }}>S2</option>
                                                    <option value="S3" {{ $ortu && $ortu->pendidikan_ibu == 'S3' ? 'selected' : '' }}>S3</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid month.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Pekerjaan</label>
                                                <input type="text" name="pekerjaan_ibu" value="{{ $ortu->pekerjaan_ibu ?? '' }}" class="form-control" id="validationCustom04" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Penghasilan (perbulan)</label>
                                                <input type="text" name="penghasilan_ibu" value="{{ $ortu->penghasilan_ibu ?? '' }}" class="form-control" id="validationCustom04" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        @php
                                            $tanggal_lahir_ibu = $ortu->tanggal_lahir_ibu ?? null;
                                            $year_ibu = $month_ibu = $day_ibu = null;

                                            if ($tanggal_lahir_ibu) {
                                                // Pecah tanggal menjadi bagian tahun, bulan, dan hari
                                                [$year_ibu, $month_ibu, $day_ibu] = explode('-', $tanggal_lahir_ibu);
                                            }
                                        @endphp
                                        <!-- Day -->
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="day" class="form-label">Tanggal Lahir</label>
                                                <select class="form-select" id="day_ibu" required>
                                                    <option selected disabled value="">Pilih Tanggal</option>
                                                    <!-- Dynamically generate days -->
                                                    @for ($i = 1; $i <= 31; $i++)
                                                        <option value="{{ $i }}" {{ $i == (int)$day_ibu ? 'selected' : '' }}>{{ $i }}</option>
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
                                                <select class="form-select" id="month_ibu" required>
                                                    <option selected disabled value="">Pilih Bulan</option>
                                                    <!-- Dynamically generate months -->
                                                    <option value="1" {{ $month_ibu == '01' ? 'selected' : '' }}>Januari</option>
                                                    <option value="2" {{ $month_ibu == '02' ? 'selected' : '' }}>Februari</option>
                                                    <option value="3" {{ $month_ibu == '03' ? 'selected' : '' }}>Maret</option>
                                                    <option value="4" {{ $month_ibu == '04' ? 'selected' : '' }}>April</option>
                                                    <option value="5" {{ $month_ibu == '05' ? 'selected' : '' }}>Mei</option>
                                                    <option value="6" {{ $month_ibu == '06' ? 'selected' : '' }}>Juni</option>
                                                    <option value="7" {{ $month_ibu == '07' ? 'selected' : '' }}>Juli</option>
                                                    <option value="8" {{ $month_ibu == '08' ? 'selected' : '' }}>Agustus</option>
                                                    <option value="9" {{ $month_ibu == '09' ? 'selected' : '' }}>September</option>
                                                    <option value="10" {{ $month_ibu == '10' ? 'selected' : '' }}>Oktober</option>
                                                    <option value="11" {{ $month_ibu == '11' ? 'selected' : '' }}>November</option>
                                                    <option value="12" {{ $month_ibu == '12' ? 'selected' : '' }}>Desember</option>
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
                                                <select class="form-select" id="year_ibu" required>
                                                    <option selected disabled value="">Pilih Tahun</option>
                                                    <!-- Dynamically generate years -->
                                                    @php
                                                        $currentYear = date('Y');
                                                        $startYear = 1900;
                                                    @endphp
                                                    @for ($i = $currentYear; $i >= $startYear; $i--)
                                                    <option value="{{ $i }}" {{ $i == (int)$year_ibu ? 'selected' : '' }}>{{ $i }}</option>
                                                    @endfor
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid year.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Hidden input untuk menyimpan tanggal lahir -->
                                    <input type="hidden" id="tanggal_lahir_ibu" name="tanggal_lahir_ibu">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Alamat</label>
                                                <textarea type="text" class="form-control" id="alamat_ibu"
                                                    cols="10" rows="3" required>{{ $alamatComponents_ibu['alamat'] }}</textarea>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">No. Rumah</label>
                                                <input type="text" class="form-control" value="{{ $alamatComponents_ibu['no_rumah'] }}" id="no_rumah_ibu"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Dusun</label>
                                                <input type="text" class="form-control" value="{{ $alamatComponents_ibu['dusun'] }}" id="dusun_ibu"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">RT</label>
                                                <input type="text" class="form-control" value="{{ $alamatComponents_ibu['rt'] }}" id="rt_ibu"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">RW</label>
                                                <input type="text" class="form-control" value="{{ $alamatComponents_ibu['rw'] }}" id="rw_ibu"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Kelurahan/Desa</label>
                                                <input type="text" class="form-control" value="{{ $alamatComponents_ibu['kelurahan_desa'] }}" id="kelurahan_desa_ibu"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Kota/Kabupaten</label>
                                                <input type="text" class="form-control" value="{{ $alamatComponents_ibu['kota_kabupaten'] }}" id="kota_kabupaten_ibu"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Provinsi</label>
                                                <input type="text" class="form-control" value="{{ $alamatComponents_ibu['provinsi'] }}" id="provinsi_ibu"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Kode Pos</label>
                                                <input type="text" class="form-control" value="{{ $alamatComponents_ibu['kode_pos'] }}" id="kode_pos_ibu"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="alamat_lengkap_ibu" id="alamat_lengkap_ibu">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">No.HP/Telp.</label>
                                                <input type="text" name="nohp_ibu" value="{{ $ortu->nohp_ibu ?? '' }}" class="form-control" id="validationCustom04" required>
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
                                                        name="kebutuhankhusus_ibu" id="yaBerkebutuhan_ibu" value="ya"
                                                            required {{ $ortu && $ortu->kebutuhankhusus_ibu != null ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="yaBerkebutuhan_ibu">Ya</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="kebutuhankhusus_ibu" id="tidakBerkebutuhan_ibu" value="tidak" required {{ $ortu && $ortu->kebutuhankhusus_ibu == null ? 'checked' : '' }}>
                                                        <label class="form-check-label"
                                                            for="tidakBerkebutuhan_ibu">Tidak</label>
                                                    </div>
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please select an option.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" id="keteranganContainer_ibu" style="display: {{ $ortu && $ortu->kebutuhankhusus_ibu != null ? 'block' : 'none' }};">
                                            <div class="mb-3">
                                                <label for="keterangan" class="form-label">Keterangan</label>
                                                <input type="text" name="ket_kebutuhankhusus_ibu" value="{{ $ortu->kebutuhankhusus_ibu ?? '' }}" class="form-control" id="keterangan"
                                                    placeholder="Masukkan keterangan">
                                                <div class="invalid-feedback">
                                                    Please provide a valid keterangan.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <h4 class="text-center">Data Wali</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Nama Lengkap</label>
                                                <input type="text" name="nama_wali" value="{{ $ortu->nama_wali ?? '' }}" class="form-control" id="validationCustom04" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">NIK</label>
                                                <input type="text" name="nik_wali" value="{{ $ortu->nik_wali ?? '' }}" class="form-control" id="validationCustom04" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="month" class="form-label">Pendidikan Terakhir</label>
                                                <select class="form-select" name="pendidikan_wali" id="month" required>
                                                    <option selected disabled value="">Pilih Pendidikan Terakhir</option>
                                                    <!-- Dynamically generate months -->
                                                    <option value="SMP/SLTP" {{ $ortu && $ortu->pendidikan_wali == 'SMP/SLTP' ? 'selected' : '' }}>SMP/SLTP</option>
                                                    <option value="SMA/SLTA" {{ $ortu && $ortu->pendidikan_wali == 'SMA/SLTA' ? 'selected' : '' }}>SMA/SLTA</option>
                                                    <option value="D1" {{ $ortu && $ortu->pendidikan_wali == 'D1' ? 'selected' : '' }}>D1</option>
                                                    <option value="D2" {{ $ortu && $ortu->pendidikan_wali == 'D2' ? 'selected' : '' }}>D2</option>
                                                    <option value="D3" {{ $ortu && $ortu->pendidikan_wali == 'D3' ? 'selected' : '' }}>D3</option>
                                                    <option value="D4" {{ $ortu && $ortu->pendidikan_wali == 'D4' ? 'selected' : '' }}>D4</option>
                                                    <option value="S1" {{ $ortu && $ortu->pendidikan_wali == 'S1' ? 'selected' : '' }}>S1</option>
                                                    <option value="S2" {{ $ortu && $ortu->pendidikan_wali == 'S2' ? 'selected' : '' }}>S2</option>
                                                    <option value="S3" {{ $ortu && $ortu->pendidikan_wali == 'S3' ? 'selected' : '' }}>S3</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid month.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Pekerjaan</label>
                                                <input type="text" name="pekerjaan_wali" class="form-control" value="{{ $ortu->pekerjaan_wali ?? '' }}" id="validationCustom04" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Penghasilan (perbulan)</label>
                                                <input type="text" name="penghasilan_wali" value="{{ $ortu->penghasilan_wali ?? '' }}" class="form-control" id="validationCustom04" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        @php
                                            $tanggal_lahir_wali = $ortu->tanggal_lahir_wali ?? null;
                                            $year_wali = $month_wali = $day_wali = null;

                                            if ($tanggal_lahir_wali) {
                                                // Pecah tanggal menjadi bagian tahun, bulan, dan hari
                                                [$year_wali, $month_wali, $day_wali] = explode('-', $tanggal_lahir_wali);
                                            }
                                        @endphp
                                        <!-- Day -->
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="day" class="form-label">Tanggal Lahir</label>
                                                <select class="form-select" id="day_wali" required>
                                                    <option selected disabled value="">Pilih Tanggal</option>
                                                    <!-- Dynamically generate days -->
                                                    @for ($i = 1; $i <= 31; $i++)
                                                        <option value="{{ $i }}" {{ $i == (int)$day_wali ? 'selected' : '' }}>{{ $i }}</option>
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
                                                <select class="form-select" id="month_wali" required>
                                                    <option selected disabled value="">Pilih Bulan</option>
                                                    <!-- Dynamically generate months -->
                                                    <option value="1" {{ $month_wali == '01' ? 'selected' : '' }}>Januari</option>
                                                    <option value="2" {{ $month_wali == '02' ? 'selected' : '' }}>Februari</option>
                                                    <option value="3" {{ $month_wali == '03' ? 'selected' : '' }}>Maret</option>
                                                    <option value="4" {{ $month_wali == '04' ? 'selected' : '' }}>April</option>
                                                    <option value="5" {{ $month_wali == '05' ? 'selected' : '' }}>Mei</option>
                                                    <option value="6" {{ $month_wali == '06' ? 'selected' : '' }}>Juni</option>
                                                    <option value="7" {{ $month_wali == '07' ? 'selected' : '' }}>Juli</option>
                                                    <option value="8" {{ $month_wali == '08' ? 'selected' : '' }}>Agustus</option>
                                                    <option value="9" {{ $month_wali == '09' ? 'selected' : '' }}>September</option>
                                                    <option value="10" {{ $month_wali == '10' ? 'selected' : '' }}>Oktober</option>
                                                    <option value="11" {{ $month_wali == '11' ? 'selected' : '' }}>November</option>
                                                    <option value="12" {{ $month_wali == '12' ? 'selected' : '' }}>Desember</option>
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
                                                <select class="form-select" id="year_wali" required>
                                                    <option selected disabled value="">Pilih Tahun</option>
                                                    <!-- Dynamically generate years -->
                                                    @php
                                                        $currentYear = date('Y');
                                                        $startYear = 1900;
                                                    @endphp
                                                    @for ($i = $currentYear; $i >= $startYear; $i--)
                                                    <option value="{{ $i }}" {{ $i == (int)$year_wali ? 'selected' : '' }}>{{ $i }}</option>
                                                    @endfor
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid year.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Hidden input untuk menyimpan tanggal lahir -->
                                    <input type="hidden" id="tanggal_lahir_wali" name="tanggal_lahir_wali">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Alamat</label>
                                                <textarea type="text" class="form-control" id="alamat_wali"
                                                    cols="10" rows="3" required>{{ $alamatComponents_wali['alamat'] }}</textarea>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">No. Rumah</label>
                                                <input type="text" class="form-control" value="{{ $alamatComponents_wali['no_rumah'] }}" id="no_rumah_wali"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Dusun</label>
                                                <input type="text" class="form-control" value="{{ $alamatComponents_wali['dusun'] }}" id="dusun_wali"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">RT</label>
                                                <input type="text" class="form-control" value="{{ $alamatComponents_wali['rt'] }}" id="rt_wali"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">RW</label>
                                                <input type="text" class="form-control" value="{{ $alamatComponents_wali['rw'] }}" id="rw_wali"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Kelurahan/Desa</label>
                                                <input type="text" class="form-control" value="{{ $alamatComponents_wali['kelurahan_desa'] }}" id="kelurahan_desa_wali"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Kota/Kabupaten</label>
                                                <input type="text" class="form-control" id="kota_kabupaten_wali" value="{{ $alamatComponents_wali['kota_kabupaten'] }}"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Provinsi</label>
                                                <input type="text" class="form-control" id="provinsi_wali" value="{{ $alamatComponents_wali['provinsi'] }}"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">Kode Pos</label>
                                                <input type="text" class="form-control" id="kode_pos_wali" value="{{ $alamatComponents_wali['kode_pos'] }}"
                                                    placeholder="" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="alamat_lengkap_wali" id="alamat_lengkap_wali">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="validationCustom04" class="form-label">No.HP/Telp.</label>
                                                <input type="text" name="nohp_wali" value="{{ $ortu->nohp_wali ?? '' }}" class="form-control" id="validationCustom04" required>
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
                                                            name="kebutuhankhusus_wali" id="yaBerkebutuhan_wali" value="ya" {{ $ortu && $ortu->kebutuhankhusus_wali != null ? 'checked' : '' }}
                                                            required>
                                                        <label class="form-check-label" for="yaBerkebutuhan_wali">Ya</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="kebutuhankhusus_wali" id="tidakBerkebutuhan_wali" value="tidak" {{ $ortu && $ortu->kebutuhankhusus_wali == null ? 'checked' : '' }}
                                                            required>
                                                        <label class="form-check-label"
                                                            for="tidakBerkebutuhan_wali">Tidak</label>
                                                    </div>
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please select an option.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" id="keteranganContainer_wali" style="display: {{ $ortu && $ortu->kebutuhankhusus_wali != null ? 'block' : 'none' }};">
                                            <div class="mb-3">
                                                <label for="keterangan" class="form-label">Keterangan</label>
                                                <input type="text" name="ket_kebutuhankhusus_wali" value="{{ $ortu->kebutuhankhusus_wali ?? '' }}" class="form-control" id="keterangan"
                                                    placeholder="Masukkan keterangan">
                                                <div class="invalid-feedback">
                                                    Please provide a valid keterangan.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <button id="submitBtn" class="btn btn-primary" style="width: 100%" type="submit" onclick="updateAlamatAyah(); updateAlamatIbu(); updateAlamatWali(); updateDateOfBirthAyah(); updateDateOfBirthIbu(); updateDateOfBirthWali();">Selanjutnya</button>
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
    <!-- JavaScript -->
    <script>
        // Function to toggle visibility of input fields based on radio button selection
        document.getElementById('yaBerkebutuhan_ayah').addEventListener('change', function() {
            document.getElementById('keteranganContainer_ayah').style.display = 'block';
        });

        document.getElementById('tidakBerkebutuhan_ayah').addEventListener('change', function() {
            document.getElementById('keteranganContainer_ayah').style.display = 'none';
        });

        document.getElementById('yaBerkebutuhan_ibu').addEventListener('change', function() {
            document.getElementById('keteranganContainer_ibu').style.display = 'block';
        });

        document.getElementById('tidakBerkebutuhan_ibu').addEventListener('change', function() {
            document.getElementById('keteranganContainer_ibu').style.display = 'none';
        });

        document.getElementById('yaBerkebutuhan_wali').addEventListener('change', function() {
            document.getElementById('keteranganContainer_wali').style.display = 'block';
        });

        document.getElementById('tidakBerkebutuhan_wali').addEventListener('change', function() {
            document.getElementById('keteranganContainer_wali').style.display = 'none';
        });

    </script>
    <script>
        function updateAlamatAyah(){
            // Get the values from all input fields
            var alamat = document.getElementById('alamat_ayah').value;
            var noRumah = document.getElementById('no_rumah_ayah').value;
            var dusun = document.getElementById('dusun_ayah').value;
            var rt = document.getElementById('rt_ayah').value;
            var rw = document.getElementById('rw_ayah').value;
            var kelurahan = document.getElementById('kelurahan_desa_ayah').value;
            var kota = document.getElementById('kota_kabupaten_ayah').value;
            var provinsi = document.getElementById('provinsi_ayah').value;
            var kodePos = document.getElementById('kode_pos_ayah').value;

            // Combine them into one string
            var fullAddress = alamat + ', No. ' + noRumah + ',' + dusun + ', RT ' + rt + '/RW ' + rw + ', ' + kelurahan + ', ' + kota + ', ' + provinsi + ', ' + kodePos;

            // Set the combined address into the textarea
            document.getElementById('alamat_lengkap_ayah').value = fullAddress;
        }
        // Add event listeners to input fields to call updateAddress whenever any input changes
        document.getElementById('alamat_ayah').addEventListener('input', updateAlamatAyah);
        document.getElementById('no_rumah_ayah').addEventListener('input', updateAlamatAyah);
        document.getElementById('dusun_ayah').addEventListener('input', updateAlamatAyah);
        document.getElementById('rt_ayah').addEventListener('input', updateAlamatAyah);
        document.getElementById('rw_ayah').addEventListener('input', updateAlamatAyah);
        document.getElementById('kelurahan_desa_ayah').addEventListener('input', updateAlamatAyah);
        document.getElementById('kota_kabupaten_ayah').addEventListener('input', updateAlamatAyah);
        document.getElementById('provinsi_ayah').addEventListener('input', updateAlamatAyah);
        document.getElementById('kode_pos_ayah').addEventListener('input', updateAlamatAyah);

        function updateAlamatIbu(){
            // Get the values from all input fields
            var alamat = document.getElementById('alamat_ibu').value;
            var noRumah = document.getElementById('no_rumah_ibu').value;
            var dusun = document.getElementById('dusun_ibu').value;
            var rt = document.getElementById('rt_ibu').value;
            var rw = document.getElementById('rw_ibu').value;
            var kelurahan = document.getElementById('kelurahan_desa_ibu').value;
            var kota = document.getElementById('kota_kabupaten_ibu').value;
            var provinsi = document.getElementById('provinsi_ibu').value;
            var kodePos = document.getElementById('kode_pos_ibu').value;

            // Combine them into one string
            var fullAddress = alamat + ', No. ' + noRumah + ',' + dusun + ', RT ' + rt + '/RW ' + rw + ', ' + kelurahan + ', ' + kota + ', ' + provinsi + ', ' + kodePos;

            // Set the combined address into the textarea
            document.getElementById('alamat_lengkap_ibu').value = fullAddress;
        }
        // Add event listeners to input fields to call updateAddress whenever any input changes
        document.getElementById('alamat_ibu').addEventListener('input', updateAlamatIbu);
        document.getElementById('no_rumah_ibu').addEventListener('input', updateAlamatIbu);
        document.getElementById('dusun_ibu').addEventListener('input', updateAlamatIbu);
        document.getElementById('rt_ibu').addEventListener('input', updateAlamatIbu);
        document.getElementById('rw_ibu').addEventListener('input', updateAlamatIbu);
        document.getElementById('kelurahan_desa_ibu').addEventListener('input', updateAlamatIbu);
        document.getElementById('kota_kabupaten_ibu').addEventListener('input', updateAlamatIbu);
        document.getElementById('provinsi_ibu').addEventListener('input', updateAlamatIbu);
        document.getElementById('kode_pos_ibu').addEventListener('input', updateAlamatIbu);

        function updateAlamatWali(){
            // Get the values from all input fields
            var alamat = document.getElementById('alamat_wali').value;
            var noRumah = document.getElementById('no_rumah_wali').value;
            var dusun = document.getElementById('dusun_wali').value;
            var rt = document.getElementById('rt_wali').value;
            var rw = document.getElementById('rw_wali').value;
            var kelurahan = document.getElementById('kelurahan_desa_wali').value;
            var kota = document.getElementById('kota_kabupaten_wali').value;
            var provinsi = document.getElementById('provinsi_wali').value;
            var kodePos = document.getElementById('kode_pos_wali').value;

            // Combine them into one string
            var fullAddress = alamat + ', No. ' + noRumah + ',' + dusun + ', RT ' + rt + '/RW ' + rw + ',' + kelurahan + ',' + kota + ',' + provinsi + ',' + kodePos;
            // const fullAdress = `${alamat} No. ${noRumah} , ${dusun} , RT ${rt} , / RW ${rw}, ${kelurahan} , ${kota} , ${provinsi} , `;

            // Set the combined address into the textarea
            document.getElementById('alamat_lengkap_wali').value = fullAddress;
        }
        // Add event listeners to input fields to call updateAddress whenever any input changes
        document.getElementById('alamat_wali').addEventListener('input', updateAlamatWali);
        document.getElementById('no_rumah_wali').addEventListener('input', updateAlamatWali);
        document.getElementById('dusun_wali').addEventListener('input', updateAlamatWali);
        document.getElementById('rt_wali').addEventListener('input', updateAlamatWali);
        document.getElementById('rw_wali').addEventListener('input', updateAlamatWali);
        document.getElementById('kelurahan_desa_wali').addEventListener('input', updateAlamatWali);
        document.getElementById('kota_kabupaten_wali').addEventListener('input', updateAlamatWali);
        document.getElementById('provinsi_wali').addEventListener('input', updateAlamatWali);
        document.getElementById('kode_pos_wali').addEventListener('input', updateAlamatWali);
    </script>
    <script>
        // Fungsi untuk memperbarui tanggal lahir di field hidden
        function updateDateOfBirthAyah() {
            const day = document.getElementById('day_ayah').value;
            const month = document.getElementById('month_ayah').value;
            const year = document.getElementById('year_ayah').value;

            if (day && month && year) {
                // Format tanggal sebagai YYYY-MM-DD
                const dob = `${year}-${String(month).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                document.getElementById('tanggal_lahir_ayah').value = dob;
            }
        }

        // Menambahkan event listener untuk setiap elemen dropdown
        document.getElementById('day_ayah').addEventListener('change', updateDateOfBirthAyah);
        document.getElementById('month_ayah').addEventListener('change', updateDateOfBirthAyah);
        document.getElementById('year_ayah').addEventListener('change', updateDateOfBirthAyah);

        // Fungsi untuk memperbarui tanggal lahir di field hidden
        function updateDateOfBirthIbu() {
            const day = document.getElementById('day_ibu').value;
            const month = document.getElementById('month_ibu').value;
            const year = document.getElementById('year_ibu').value;

            if (day && month && year) {
                // Format tanggal sebagai YYYY-MM-DD
                const dob = `${year}-${String(month).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                document.getElementById('tanggal_lahir_ibu').value = dob;
            }
        }

        // Menambahkan event listener untuk setiap elemen dropdown
        document.getElementById('day_ibu').addEventListener('change', updateDateOfBirthIbu);
        document.getElementById('month_ibu').addEventListener('change', updateDateOfBirthIbu);
        document.getElementById('year_ibu').addEventListener('change', updateDateOfBirthIbu);

        // Fungsi untuk memperbarui tanggal lahir di field hidden
        function updateDateOfBirthWali() {
            const day = document.getElementById('day_wali').value;
            const month = document.getElementById('month_wali').value;
            const year = document.getElementById('year_wali').value;

            if (day && month && year) {
                // Format tanggal sebagai YYYY-MM-DD
                const dob = `${year}-${String(month).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                document.getElementById('tanggal_lahir_wali').value = dob;
            }
        }

        // Menambahkan event listener untuk setiap elemen dropdown
        document.getElementById('day_wali').addEventListener('change', updateDateOfBirthWali);
        document.getElementById('month_wali').addEventListener('change', updateDateOfBirthWali);
        document.getElementById('year_wali').addEventListener('change', updateDateOfBirthWali);
    </script>
@endpush
