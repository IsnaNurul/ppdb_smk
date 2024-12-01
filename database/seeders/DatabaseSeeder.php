<?php

namespace Database\Seeders;

use App\Models\AsalSekolah;
use App\Models\Gelombang;
use App\Models\Jadwal;
use App\Models\Jurusan;
use App\Models\Pengelola;
use App\Models\TahunAjaran;
use App\Models\User;
use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Nurul Aini',
            'username' => 'isna',
            'password' => bcrypt('12341234'),
            'level' => 'admin'
        ]);

        User::create([
            'name' => 'Regina Fauziyyah',
            'username' => 'regina',
            'password' => bcrypt('12341234'),
            'level' => 'operator'
        ]);
        TahunAjaran::create([
            'awal_tahun_ajaran' => '2025',
            'akhir_tahun_ajaran' => '2026',
            'status' => 1
        ]);
        Gelombang::create([
            'gelombang' => '1',
            'tgl_awal_Pendaftaran' => '2025-01-01',
            'tgl_akhir_Pendaftaran' => '2025-04-23',
            'tgl_pemetaan_jurusan' => '2025-04-24',
            'tgl_pengumuman_hasil' => '2025-04-26',
            'tgl_awal_daftarulang' => '2025-04-26',
            'tgl_akhir_daftarulang' => '2025-05-17',
            'id_tahun_ajaran' => 1,
        ]);

        Gelombang::create([
            'gelombang' => '2',
            'tgl_awal_Pendaftaran' => '2025-04-25',
            'tgl_akhir_Pendaftaran' => '2025-05-27',
            'tgl_pemetaan_jurusan' => '2025-05-28',
            'tgl_pengumuman_hasil' => '2025-005-30',
            'tgl_awal_daftarulang' => '2025-05-30',
            'tgl_akhir_daftarulang' => '2025-06-28',
            'id_tahun_ajaran' => 1,
        ]);

        Gelombang::create([
            'gelombang' => '3',
            'tgl_awal_Pendaftaran' => Carbon::now('Asia/Jakarta')->format('Y-m-d'),
            'tgl_akhir_Pendaftaran' => Carbon::now('Asia/Jakarta')->format('Y-m-d'),
            'tgl_pemetaan_jurusan' => Carbon::now('Asia/Jakarta')->format('Y-m-d'),
            'tgl_pengumuman_hasil' => Carbon::now('Asia/Jakarta')->format('Y-m-d'),
            'tgl_awal_daftarulang' => Carbon::now('Asia/Jakarta')->format('Y-m-d'),
            'tgl_akhir_daftarulang' => Carbon::now('Asia/Jakarta')->format('Y-m-d'),
            'id_tahun_ajaran' => 1,
        ]);
        Jurusan::create([
            'nama_jurusan' => 'Teknik Komputer Jaringan & Telekomunikasi',
            'singkatan' =>'TKJT',
            'pilihan1' => 1,
            'pilihan2' => 1,
            'id_tahun_ajaran' => 1
        ]);
        Jurusan::create([
            'nama_jurusan' => 'Pengembangan Perangkat Lunak & Gim',
            'singkatan' =>'PPLG',
            'pilihan1' => 1,
            'pilihan2' => 1,
            'id_tahun_ajaran' => 1

        ]);
        Jurusan::create([
            'nama_jurusan' => 'Desain Pemodelan & Informasi Bangunan',
            'singkatan' =>'BPIB',
            'pilihan1' => 1,
            'pilihan2' => 1,
            'id_tahun_ajaran' => 1

        ]);
        Jurusan::create([
            'nama_jurusan' => 'Desain Komunikasi Visual',
            'singkatan' =>'DKV',
            'pilihan1' => 1,
            'pilihan2' => 1,
            'id_tahun_ajaran' => 1

        ]);
        Jurusan::create([
            'nama_jurusan' => 'Teknik Kendaraan Ringan',
            'singkatan' =>'TKR',
            'pilihan1' => 1,
            'pilihan2' => 1,
            'id_tahun_ajaran' => 1

        ]);
        Jurusan::create([
            'nama_jurusan' => 'Teknik Sepeda Motor',
            'singkatan' =>'TSM',
            'pilihan1' => 1,
            'pilihan2' => 1,
            'id_tahun_ajaran' => 1

        ]);
        Jurusan::create([
            'nama_jurusan' => 'Teknik Elektronika Industri',
            'singkatan' =>'TEKLIN',
            'pilihan1' => 1,
            'pilihan2' => 1,
            'id_tahun_ajaran' => 1

        ]);
        AsalSekolah::create([
            'kode_sekolah' => '001',
            'nama_sekolah' => 'SMP Negeri 1',
            'npsn' => '123456789',
            'index_sekolah' => '8'
        ]);
        Jadwal::create([
            'tanggal' => Carbon::now('Asia/Jakarta')->format('Y-m-d'),
            'id_tahun_ajaran' => 1,
            'no_ruangan' => '1',
            'ruangan' => '201',
            'jumlah' => '20',
            'sesi' => '1',
            'jam' => '12:52'
        ]);
    }
}
