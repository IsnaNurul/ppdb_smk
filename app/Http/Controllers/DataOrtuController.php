<?php

namespace App\Http\Controllers;

use App\Models\OrtuRegister;
use App\Models\SiswaRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataOrtuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = SiswaRegister::where('id_user',Auth::user()->id)->first();
        $ortu = OrtuRegister::where('id_register',$siswa->id)->first();
        if ($ortu) {
            $route = route('data-ortu.update',$ortu->id);
            $method = 'PUT';
        }else{
            $route = route('data-ortu.store');
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

        return view('pages.peserta.data_ortu.index',compact('ortu','method','route','alamatComponents_wali','alamatComponents_ayah','alamatComponents_ibu'));
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
        $siswa = SiswaRegister::where('id_user',Auth::user()->id)->first();
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
            return redirect()->route('data-file.index')->with('success', 'Data Orang Tua Berhasil Ditambahkan');
        }else{
            return redirect()->back()->with('error', 'Data Orang Tua Gagal Ditambahkan');
        }

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
        $siswa = SiswaRegister::where('id_user',Auth::user()->id)->first();
        $berkebutuhan_khusus_ayah = $request->kebutuhankhusus_ayah === 'ya' ? $request->ket_kebutuhankhusus_ayah : null;
        $berkebutuhan_khusus_ibu = $request->kebutuhankhusus_ibu === 'ya' ? $request->ket_kebutuhankhusus_ibu : null;
        $berkebutuhan_khusus_wali = $request->kebutuhankhusus_wali === 'ya' ? $request->ket_kebutuhankhusus_wali : null;
        $ortuRegist = OrtuRegister::where('id_register',$siswa->id)->update([
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
            return redirect()->back()->with('success', 'Data Orang Tua Berhasil Diubah');
        }else{
            return redirect()->back()->with('errors', 'Data Orang Tua Gagal Diubah');
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
