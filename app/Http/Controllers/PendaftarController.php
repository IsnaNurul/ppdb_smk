<?php

namespace App\Http\Controllers;

use App\Models\AsalSekolah;
use App\Models\Gelombang;
use App\Models\Jurusan;
use App\Models\OrtuRegister;
use App\Models\Peserta;
use App\Models\SiswaRegister;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // Ambil data siswa_registers dengan tahun ajaran aktif
        $data = SiswaRegister::whereHas('gelombang.tahun_ajaran', function ($query) {
            $query->where('status', true); // Hanya ambil tahun ajaran aktif
        })->with('gelombang.tahun_ajaran')->get();
        return view('pages.admin.pendaftar.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $jurusan1 = Jurusan::where('pilihan1', true)->get();
        $jurusan2 = Jurusan::where('pilihan2', true)->get();
        $asal_sekolah = AsalSekolah::all();
        return view('pages.admin.pendaftar.create', compact('jurusan1', 'jurusan2', 'asal_sekolah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'nisn' => 'required',
        //     'password' => 'required',
        // ]);
        $user = User::create([
            'name' => $request->nama,
            'nisn' => $request->nisn,
            'nohp' => $request->nohp_siswa,
            'password' => bcrypt($request->password),
            'level' => 'siswa'

        ]);
        $asal_sekolah = $request->pilihan_sekolah === 'Lainnya' ? $request->asal_sekolah_lainnya : $request->asal_sekolah;

        $kode_sekolah = $request->pilihan_sekolah === 'Lainnya' ? null : $request->kode_sekolah;
        $berkebutuhan_khusus = $request->berkebutuhan === 'ya' ? $request->berkebutuhan_khusus : null;
        $no_kipksp = $request->kipksi === 'ya' ? $request->no_kipksp : null;
        // Set locale Carbon ke Indonesia
        Carbon::setLocale('id');
        $today = Carbon::today();
        // Query untuk mendapatkan gelombang yang rentan waktunya mencakup hari ini
        $data = Gelombang::where('tgl_akhir_pendaftaran', '>=', $today)
            ->where('tgl_awal_pendaftaran', '<=', $today)
            ->first();
        $gelombang = $data->id;
        $siswaRegist = SiswaRegister::create([
            'id_user' => $user->id,
            'jurusan1' => $request->jurusan1,
            'jurusan2' => $request->jurusan2,
            'asal_sekolah' => $asal_sekolah,
            'kode_sekolah' => $kode_sekolah,
            'tahun_lulus' => $request->tahun_lulus,
            'nisn' => $request->nisn,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->dob,
            'agama' => $request->agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat_siswa' => $request->alamat_lengkap,
            'nohp_siswa' => $request->nohp_siswa,
            'tempat_tinggal' => $request->tempat_tinggal,
            'anak_ke' => $request->anak_ke,
            'jumlah_saudara' => $request->jumlah_saudara,
            'hobi' => $request->hobi,
            'minat_ekskul' => $request->minat,
            'kebutuhan_khusus' => $berkebutuhan_khusus,
            'no_kipksp' => $no_kipksp,
            'tinggi_badan' => $request->tinggi_badan,
            'berat_badan' => $request->berat_badan,
            'transportasi' => $request->transportasi,
            'jarak' => $request->jarak,
            'ket_jarak' => $request->ket_jarak,
            'waktu' => $request->waktu,
            'gelombang' => $gelombang,
            'tanggal_register' => $today
        ]);
        if ($siswaRegist) {
            return redirect()->route('pendaftar.index')->with('success', 'Pendaftaran Berhasil');
        } else {
            return redirect()->back()->with('errors', 'Pendaftaran Gagal');
        }
    }

    public function dataOrtu($id)
    {
        $siswa = SiswaRegister::findOrFail($id);
        $id_siswa = $id;
        $ortu = OrtuRegister::where('id_register', $siswa->id)->first();

        // dd($ortu);
        if ($ortu) {
            $route = route('pendaftar.data-ortu.update', $ortu->id);
            $method = 'PUT';
        } else {
            $route = route('pendaftar.data-ortu.store', $id_siswa);
            $method = 'POST';
        }

        $alamat_wali = $ortu->alamat_wali ?? null;
        $alamatComponents_wali = [
            'alamat' => '',
            'no_rumah' => '',
            'dusun' => '',
            'rt' => '',
            'rw' => '',
            'kelurahan_desa' => '',
            'kota_kabupaten' => '',
            'provinsi' => '',
            'kode_pos' => ''
        ];

        // Jika alamat ada, proses untuk memecahnya
        if ($alamat_wali) {
            // Pecah alamat berdasarkan koma
            $alamatParts_wali = explode(',', $alamat_wali);

            // Cek bagian-bagian alamat dan simpan ke dalam variabel
            if (count($alamatParts_wali) >= 7) {
                $alamatComponents_wali['alamat'] = trim($alamatParts_wali[0]);
                // Mengambil nomor rumah setelah kata "No." pada bagian kedua
                preg_match('/No\.?\s*(\d+)/i', $alamatParts_wali[1], $matches);
                $alamatComponents_wali['no_rumah'] = $matches[1] ?? ''; // Mengambil angka setelah "No."
                $alamatComponents_wali['dusun'] = trim($alamatParts_wali[2]);

                // Cek RT/RW pada bagian ketiga
                preg_match('/RT\s*(\d+)\/RW\s*(\d+)/i', $alamatParts_wali[3], $rtRwMatches);
                $alamatComponents_wali['rt'] = $rtRwMatches[1] ?? '';
                $alamatComponents_wali['rw'] = $rtRwMatches[2] ?? '';

                $alamatComponents_wali['kelurahan_desa'] = trim($alamatParts_wali[4]);
                $alamatComponents_wali['kota_kabupaten'] = trim($alamatParts_wali[5]);
                $alamatComponents_wali['provinsi'] = trim($alamatParts_wali[6]);
                $alamatComponents_wali['kode_pos'] = trim($alamatParts_wali[7]);
            }
        }


        $alamat_ayah = $ortu->alamat_ayah ?? null;
        $alamatComponents_ayah = [
            'alamat' => '',
            'no_rumah' => '',
            'dusun' => '',
            'rt' => '',
            'rw' => '',
            'kelurahan_desa' => '',
            'kota_kabupaten' => '',
            'provinsi' => '',
            'kode_pos' => ''
        ];

        // Jika alamat ada, proses untuk memecahnya
        if ($alamat_ayah) {
            // Pecah alamat berdasarkan koma
            $alamatParts_ayah = explode(',', $alamat_ayah);

            // Cek bagian-bagian alamat dan simpan ke dalam variabel
            if (count($alamatParts_ayah) >= 7) {
                $alamatComponents_ayah['alamat'] = trim($alamatParts_ayah[0]);
                // Mengambil nomor rumah setelah kata "No." pada bagian kedua
                preg_match('/No\.?\s*(\d+)/i', $alamatParts_ayah[1], $matches);
                $alamatComponents_ayah['no_rumah'] = $matches[1] ?? ''; // Mengambil angka setelah "No."
                $alamatComponents_ayah['dusun'] = trim($alamatParts_ayah[2]);

                // Cek RT/RW pada bagian ketiga
                preg_match('/RT\s*(\d+)\/RW\s*(\d+)/i', $alamatParts_ayah[3], $rtRwMatches);
                $alamatComponents_ayah['rt'] = $rtRwMatches[1] ?? '';
                $alamatComponents_ayah['rw'] = $rtRwMatches[2] ?? '';

                $alamatComponents_ayah['kelurahan_desa'] = trim($alamatParts_ayah[4]);
                $alamatComponents_ayah['kota_kabupaten'] = trim($alamatParts_ayah[5]);
                $alamatComponents_ayah['provinsi'] = trim($alamatParts_ayah[6]);
                $alamatComponents_ayah['kode_pos'] = trim($alamatParts_ayah[7]);
            }
        }


        $alamat_ibu = $ortu->alamat_ibu ?? null;
        $alamatComponents_ibu = [
            'alamat' => '',
            'no_rumah' => '',
            'dusun' => '',
            'rt' => '',
            'rw' => '',
            'kelurahan_desa' => '',
            'kota_kabupaten' => '',
            'provinsi' => '',
            'kode_pos' => ''
        ];

        // Jika alamat ada, proses untuk memecahnya
        if ($alamat_ibu) {
            // Pecah alamat berdasarkan koma
            $alamatParts_ibu = explode(',', $alamat_ibu);

            // Cek bagian-bagian alamat dan simpan ke dalam variabel
            if (count($alamatParts_ibu) >= 7) {
                $alamatComponents_ibu['alamat'] = trim($alamatParts_ibu[0]);
                // Mengambil nomor rumah setelah kata "No." pada bagian kedua
                preg_match('/No\.?\s*(\d+)/i', $alamatParts_ibu[1], $matches);
                $alamatComponents_ibu['no_rumah'] = $matches[1] ?? ''; // Mengambil angka setelah "No."
                $alamatComponents_ibu['dusun'] = trim($alamatParts_ibu[2]);

                // Cek RT/RW pada bagian ketiga
                preg_match('/RT\s*(\d+)\/RW\s*(\d+)/i', $alamatParts_ibu[3], $rtRwMatches);
                $alamatComponents_ibu['rt'] = $rtRwMatches[1] ?? '';
                $alamatComponents_ibu['rw'] = $rtRwMatches[2] ?? '';

                $alamatComponents_ibu['kelurahan_desa'] = trim($alamatParts_ibu[4]);
                $alamatComponents_ibu['kota_kabupaten'] = trim($alamatParts_ibu[5]);
                $alamatComponents_ibu['provinsi'] = trim($alamatParts_ibu[6]);
                $alamatComponents_ibu['kode_pos'] = trim($alamatParts_ibu[7]);
            }
        }

        return view('pages.admin.data-ortu.index', compact('id_siswa', 'ortu', 'method', 'route', 'alamatComponents_wali', 'alamatComponents_ayah', 'alamatComponents_ibu'));
    }

    public function storeDataOrtu(Request $request, $id)
    {
        $siswa = SiswaRegister::where('id', $id)->first();
        // dd($siswa);
        $berkebutuhan_khusus_ayah = $request->kebutuhankhusus_ayah === 'ya' ? $request->ket_kebutuhankhusus_ayah : null;
        $berkebutuhan_khusus_ibu = $request->kebutuhankhusus_ibu === 'ya' ? $request->ket_kebutuhankhusus_ibu : null;
        $berkebutuhan_khusus_wali = $request->kebutuhankhusus_wali === 'ya' ? $request->ket_kebutuhankhusus_wali : null;
        $ortuRegist = OrtuRegister::create([
            'id_register' => $siswa->id,
            'nama_ayah' => $request->nama_ayah,
            'nik_ayah' => $request->nik_ayah,
            'pendidikan_ayah' => $request->pendidikan_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'penghasilan_ayah' => $request->penghasilan_ayah,
            'tanggal_lahir_ayah' => $request->tanggal_lahir_ayah,
            'alamat_ayah' => $request->alamat_lengkap_ayah,
            'nohp_ayah' => $request->nohp_ayah,
            'kebutuhankhusus_ayah' => $berkebutuhan_khusus_ayah,
            'nama_ibu' => $request->nama_ibu,
            'nik_ibu' => $request->nik_ibu,
            'pendidikan_ibu' => $request->pendidikan_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'penghasilan_ibu' => $request->penghasilan_ibu,
            'tanggal_lahir_ibu' => $request->tanggal_lahir_ibu,
            'alamat_ibu' => $request->alamat_lengkap_ibu,
            'nohp_ibu' => $request->nohp_ibu,
            'kebutuhankhusus_ibu' => $berkebutuhan_khusus_ibu,
            'nama_wali' => $request->nama_wali,
            'nik_wali' => $request->nik_wali,
            'pendidikan_wali' => $request->pendidikan_wali,
            'pekerjaan_wali' => $request->pekerjaan_wali,
            'penghasilan_wali' => $request->penghasilan_wali,
            'tanggal_lahir_wali' => $request->tanggal_lahir_wali,
            'alamat_wali' => $request->alamat_lengkap_wali,
            'nohp_wali' => $request->nohp_wali,
            'kebutuhankhusus_wali' => $berkebutuhan_khusus_wali,
        ]);
        if ($ortuRegist) {
            return redirect()->back()->with('success', 'Tambah Data Ortu Berhasil');
        } else {
            return redirect()->back()->with('errors', 'Gagal Tambah Data Ortu');
        }
    }

    public function updateDataOrtu(Request $request, string $id)
    {
        dd($id);
        // $siswa = SiswaRegister::findOrFail($id);
        $berkebutuhan_khusus_ayah = $request->kebutuhankhusus_ayah === 'ya' ? $request->ket_kebutuhankhusus_ayah : null;
        $berkebutuhan_khusus_ibu = $request->kebutuhankhusus_ibu === 'ya' ? $request->ket_kebutuhankhusus_ibu : null;
        $berkebutuhan_khusus_wali = $request->kebutuhankhusus_wali === 'ya' ? $request->ket_kebutuhankhusus_wali : null;
        $ortuRegist = OrtuRegister::where('id', $id)->update([
            'nama_ayah' => $request->nama_ayah,
            'nik_ayah' => $request->nik_ayah,
            'pendidikan_ayah' => $request->pendidikan_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'penghasilan_ayah' => $request->penghasilan_ayah,
            'tanggal_lahir_ayah' => $request->tanggal_lahir_ayah,
            'alamat_ayah' => $request->alamat_lengkap_ayah,
            'nohp_ayah' => $request->nohp_ayah,
            'kebutuhankhusus_ayah' => $berkebutuhan_khusus_ayah,
            'nama_ibu' => $request->nama_ibu,
            'nik_ibu' => $request->nik_ibu,
            'pendidikan_ibu' => $request->pendidikan_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'penghasilan_ibu' => $request->penghasilan_ibu,
            'tanggal_lahir_ibu' => $request->tanggal_lahir_ibu,
            'alamat_ibu' => $request->alamat_lengkap_ibu,
            'nohp_ibu' => $request->nohp_ibu,
            'kebutuhankhusus_ibu' => $berkebutuhan_khusus_ibu,
            'nama_wali' => $request->nama_wali,
            'nik_wali' => $request->nik_wali,
            'pendidikan_wali' => $request->pendidikan_wali,
            'pekerjaan_wali' => $request->pekerjaan_wali,
            'penghasilan_wali' => $request->penghasilan_wali,
            'tanggal_lahir_wali' => $request->tanggal_lahir_wali,
            'alamat_wali' => $request->alamat_lengkap_wali,
            'nohp_wali' => $request->nohp_wali,
            'kebutuhankhusus_wali' => $berkebutuhan_khusus_wali,
        ]);
        if ($ortuRegist) {
            return redirect()->back()->with('success', 'Update Data Ortu Berhasil');
        } else {
            return redirect()->back()->with('errors','Gagal Update Data Ortu');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jurusan1 = Jurusan::where('pilihan1', true)->get();
        $jurusan2 = Jurusan::where('pilihan2', true)->get();
        $asal_sekolah = AsalSekolah::all();

        $dataSiswa = SiswaRegister::where('id_user', $id)->first();
        // Ambil alamat dari database
        $alamat = $dataSiswa->alamat_siswa ?? null;

        // Inisialisasi variabel untuk bagian-bagian alamat
        $alamatComponents = [
            'alamat' => '',
            'no_rumah' => '',
            'dusun' => '',
            'rt' => '',
            'rw' => '',
            'kelurahan_desa' => '',
            'kota_kabupaten' => '',
            'provinsi' => '',
            'kode_pos' => ''
        ];

        // Jika alamat ada, proses untuk memecahnya
        if ($alamat) {
            // Pecah alamat berdasarkan koma
            $alamatParts = explode(',', $alamat);

            // Cek bagian-bagian alamat dan simpan ke dalam variabel
            if (count($alamatParts) >= 7) {
                $alamatComponents['alamat'] = trim($alamatParts[0]);
                // Mengambil nomor rumah setelah kata "No." pada bagian kedua
                preg_match('/No\.?\s*(\d+)/i', $alamatParts[1], $matches);
                $alamatComponents['no_rumah'] = $matches[1] ?? ''; // Mengambil angka setelah "No."
                $alamatComponents['dusun'] = trim($alamatParts[2]);

                // Cek RT/RW pada bagian ketiga
                preg_match('/RT\s*(\d+)\/RW\s*(\d+)/i', $alamatParts[3], $rtRwMatches);
                $alamatComponents['rt'] = $rtRwMatches[1] ?? '';
                $alamatComponents['rw'] = $rtRwMatches[2] ?? '';

                $alamatComponents['kelurahan_desa'] = trim($alamatParts[4]);
                $alamatComponents['kota_kabupaten'] = trim($alamatParts[5]);
                $alamatComponents['provinsi'] = trim($alamatParts[6]);
                $alamatComponents['kode_pos'] = trim($alamatParts[7]);
            }
        }
        // dd($dataSiswa);
        // dd($user);
        return view('pages.admin.pendaftar.edit', compact('jurusan1', 'jurusan2', 'asal_sekolah', 'dataSiswa', 'alamatComponents'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $asal_sekolah = $request->pilihan_sekolah === 'Lainnya' ? $request->asal_sekolah_lainnya : $request->asal_sekolah;

        $kode_sekolah = $request->pilihan_sekolah === 'Lainnya' ? null : $request->kode_sekolah;
        $berkebutuhan_khusus = $request->berkebutuhan === 'ya' ? $request->berkebutuhan_khusus : null;
        $no_kipksp = $request->kipksi === 'ya' ? $request->no_kipksp : null;
        // Set locale Carbon ke Indonesia
        Carbon::setLocale('id');
        $today = Carbon::today();
        // Query untuk mendapatkan gelombang yang rentan waktunya mencakup hari ini
        $data = Gelombang::where('tgl_akhir_pendaftaran', '>=', $today)
            ->where('tgl_awal_pendaftaran', '<=', $today)
            ->first();
        $gelombang = $data->id;
        // $request->validate([
        //     'jurusan1' => 'required|different:jurusan2',
        //     'jurusan2' => 'required|different:jurusan1',
        // ]);
        $siswaRegist = SiswaRegister::where('id_user', $id)->update([
            'id_user' => $id,
            'jurusan1' => $request->jurusan1,
            'jurusan2' => $request->jurusan2,
            'asal_sekolah' => $asal_sekolah,
            'kode_sekolah' => $kode_sekolah,
            'tahun_lulus' => $request->tahun_lulus,
            'nisn' => $request->nisn,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->dob,
            'agama' => $request->agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat_siswa' => $request->alamat_lengkap,
            'nohp_siswa' => $request->nohp_siswa,
            'tempat_tinggal' => $request->tempat_tinggal,
            'anak_ke' => $request->anak_ke,
            'jumlah_saudara' => $request->jumlah_saudara,
            'hobi' => $request->hobi,
            'minat_ekskul' => $request->minat,
            'kebutuhan_khusus' => $berkebutuhan_khusus,
            'no_kipksp' => $no_kipksp,
            'tinggi_badan' => $request->tinggi_badan,
            'berat_badan' => $request->berat_badan,
            'transportasi' => $request->transportasi,
            'jarak' => $request->jarak,
            'ket_jarak' => $request->ket_jarak,
            'waktu' => $request->waktu,
            'gelombang' => $gelombang,
            'tanggal_register' => $today
        ]);
        // dd($siswaRegist);
        if ($siswaRegist) {
            $user = User::where('id', $id)->update([
                'name' => $request->nama,
                'nisn' => $request->nisn,
                'nohp' => $request->hohp_siswa,
            ]);
            return redirect()->route('pendaftar.index')->with('success', 'Update Pendaftaran Berhasil');
        } else {
            return redirect()->back()->with('errors','Update Pendaftaran Gagal');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
