<?php

namespace App\Http\Controllers;

use App\Models\AsalSekolah;
use App\Models\Gelombang;
use App\Models\Jurusan;
use App\Models\SiswaRegister;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurusan1 = Jurusan::where('pilihan1', true)->get();
        $jurusan2 = Jurusan::where('pilihan2', true)->get();
        $asal_sekolah = AsalSekolah::all();

        $dataSiswa = SiswaRegister::where('id_user',Auth::user()->id)->first();
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
        return view('pages.peserta.data_siswa.index', compact('jurusan1', 'jurusan2', 'asal_sekolah','dataSiswa','alamatComponents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $data= Gelombang::where('tgl_akhir_pendaftaran', '>=', $today)
        ->where('tgl_awal_pendaftaran', '<=', $today)
        ->first();
        $gelombang = $data->id;
        $request->validate([
            'jurusan1' => 'required|different:jurusan2',
            'jurusan2' => 'required|different:jurusan1',
        ]);
        $siswaRegist = SiswaRegister::where('id_user',Auth::user()->id)->update([
            'id_user' => Auth::user()->id,
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
            User::where('id',Auth::user()->id)->update([
                'name' => $request->nama,
                'nisn' => $request->nisn,
                'nohp' => $request->hohp_siswa,
            ]);
            return redirect()->route('data-siswa.index')->with('success', 'Data berhasil diupdate');
        } else {
            return redirect()->back()->with('errors', 'Data gagal diupdate');
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
