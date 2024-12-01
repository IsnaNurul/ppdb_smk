<?php

use App\Exports\CalonSiswaExport;
use App\Exports\SiswaExport;
use App\Http\Controllers\AsalSekolahController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrosurController;
use App\Http\Controllers\CalonSiswaController;
use App\Http\Controllers\CetakKartuController;
use App\Http\Controllers\DaftarUlangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataFileController;
use App\Http\Controllers\DataOrtuController;
use App\Http\Controllers\DataSiswaController;
use App\Http\Controllers\GelombangController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KonfirmasiPembayaranController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TahunAjaranController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JadwalController;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', [LandingPageController::class, 'index']);
Route::get('/brosur/download', [LandingPageController::class, 'download'])->name('brosur.download');

Route::get('/login', function () {
    return view('pages.peserta.auth.loginPage');
});

Route::get('/daftar', function () {
    return view('pages.peserta.auth.daftarPage');
});

Route::post('/login', [AuthController::class, 'login'])->name('login.siswa');
Route::post('/daftar', [AuthController::class, 'daftarSiswa'])->name('daftar.siswa');

Route::get('/pages/admin-operator/login', [AuthController::class, 'showLoginForm'])->name('login.admin');
Route::post('/pages/admin-operator/login', [AuthController::class, 'login'])->name('login.admin');

//admin
Route::middleware(['checkrole:admin'])->group(function () {
    Route::get('/pages/admin-operator/dashboard', [DashboardController::class,'index'])->name('dashboard.admin');
    Route::resource('pages/admin-operator/pendaftar', PendaftarController::class);
    Route::get('pages/admin-operator/pendaftar/data-ortu/{id}', [PendaftarController::class, 'dataOrtu'])->name('pendaftar.data-ortu');
    Route::PUT('pages/admin-operator/pendaftar/data-ortu/{id}', [PendaftarController::class, 'updateDataOrtu'])->name('pendaftar.data-ortu.update');
    Route::POST('pages/admin-operator/pendaftar/data-ortu/{id}', [PendaftarController::class, 'storeDataOrtu'])->name('pendaftar.data-ortu.store');
    Route::resource('pages/admin-operator/calon-siswa', CalonSiswaController::class);
    Route::post('pages/admin-operator/daftar-ulang/toggle-daftar-ulang/{no_peserta}', [CalonSiswaController::class, 'toggleDaftarUlang'])->name('daftar-ulang.toggleDaftarUlang');
    Route::get('/calon-siswa/export', function () {
        return Excel::download(new CalonSiswaExport, 'calon-siswa.xlsx');
    })->name('calon-siswa.export');
    Route::get('/siswa/export', function () {
        return Excel::download(new SiswaExport, 'siswa.xlsx');
    })->name('siswa.export');
    Route::resource('pages/admin-operator/siswa', SiswaController::class);
    Route::resource('pages/admin-operator/pembayaran', PembayaranController::class);
    Route::patch('pembayaran/{id}/verify', [PembayaranController::class, 'verify'])->name('pembayaran.verify');
    Route::resource('/pages/admin-operator/jurusan', JurusanController::class);
    Route::resource('/pages/admin-operator/sekolah', AsalSekolahController::class);
    Route::resource('/pages/admin-operator/brosur', BrosurController::class);
    Route::resource('/pages/admin-operator/informasi', InformasiController::class);
    Route::resource('/pages/admin-operator/kontak', KontakController::class);
    Route::resource('/pages/admin-operator/users', UserController::class);
    Route::resource('/pages/admin-operator/daftar-ulang', DaftarUlangController::class);
    Route::resource('/pages/admin-operator/gelombang', GelombangController::class);
    Route::resource('/pages/admin-operator/tahun-ajaran', TahunAjaranController::class);
    Route::resource('/pages/admin-operator/jadwal', JadwalController::class);
    Route::post('/pages/admin-operator/tahun-ajaran/{id}/change-status', [TahunAjaranController::class, 'changeStatus'])->name('tahun-ajaran.changeStatus');
    Route::get('/gelombang/get-latest/{tahunAjaranId}', [GelombangController::class, 'getLatestGelombang']);
    Route::resource('pages/admin-operator/cetak-kartu-siswa', CetakKartuController::class);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

//siswa
Route::middleware(['checkrole:siswa'])->group(function () {
    Route::resource('pages/peserta/data-siswa', DataSiswaController::class);
    Route::resource('pages/peserta/data-ortu', DataOrtuController::class);
    Route::resource('pages/peserta/data-file', DataFileController::class);
    Route::resource('pages/peserta/konfirmasi-pembayaran', KonfirmasiPembayaranController::class);
    Route::resource('pages/peserta/cetak-kartu', CetakKartuController::class);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
