<?php

namespace App\Http\Controllers;

use App\Models\DaftarUlang;
use App\Models\Gelombang;
use App\Models\Jadwal;
use App\Models\Pembayaran;
use App\Models\Peserta;
use App\Models\SiswaRegister;
use App\Models\TahunAjaran;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all students along with their payments if they exist
        $data = SiswaRegister::with('pembayaran')->get();
        return view('pages.admin.pembayaran.index', compact('data'));
    }

    public function verify($id)
    {
        // Find the payment record by ID
        $data = Pembayaran::findOrFail($id);
        $register = $data->id_register;

        // Update the status to verified (true)
        $data->status = !$data->status;
        $pembayaran = $data->save();

        if ($pembayaran) {
            $tahunAjaranAktif = TahunAjaran::where('status', true)->first();

            if (!$tahunAjaranAktif) {
                throw new \Exception('Tahun ajaran aktif tidak ditemukan.');
            }

            // Extract last two digits from awal_tahun_ajaran and akhir_tahun_ajaran
            $tahunAjaran = substr($tahunAjaranAktif->awal_tahun_ajaran, -2) .
                substr($tahunAjaranAktif->akhir_tahun_ajaran, -2);

            DB::transaction(function () use ($tahunAjaran, $register) {
                $tahunAjaranAktif = TahunAjaran::where('status', true)->first();
                $data = SiswaRegister::where('id', $register)->first();

                // Get the last participant number for the given academic year
                $dataTerakhir = Peserta::where('no_peserta', 'LIKE', $tahunAjaran . '%')
                    ->orderBy('no_peserta', 'desc')
                    ->first();

                // dd($dataTerakhir, $data->gelombang);


                if (!$dataTerakhir) {
                    // Jika tidak ada peserta sebelumnya, mulai dengan nomor peserta pertama
                    $noPesertaBaru = $tahunAjaran . str_pad(1, 4, '0', STR_PAD_LEFT);
                } else {
                    $noBaru = (int)substr($dataTerakhir->no_peserta, 4) + 1;
                    $noPesertaBaru = $tahunAjaran . str_pad($noBaru, 4, '0', STR_PAD_LEFT);
                }
                // Cari jadwal yang masih tersedia
                // $jadwal = Jadwal::whereRaw('(SELECT COUNT(*) FROM pesertas WHERE pesertas.id_jadwal = jadwals.id) < jadwals.jumlah')
                // ->orderBy('tanggal') // Urutkan berdasarkan tanggal (atau kriteria lain)
                // ->first();
                $id_jadwal = 0;
                $jadwal = Jadwal::with('peserta')->where('id_tahun_ajaran',$tahunAjaranAktif->id)->orderBy('no_ruangan','asc')->get();
                foreach ($jadwal as $jadwals) {
                    $id_jadwal = $jadwals->id;
                    if ($jadwals->peserta->count() < $jadwals->jumlah) {
                        $id_jadwal = $jadwals->id;
                        break;
                    }
                    // echo $id_jadwal;
                }

                // dd($jadwal);
                // if (!$jadwal) {
                //     throw new \Exception('Tidak ada jadwal yang tersedia.');
                // }
                $peserta = new Peserta();
                $peserta->no_peserta = $noPesertaBaru;
                $peserta->id_register = $register;
                $peserta->id_gelombang = $data->gelombang;
                $peserta->daftar_ulang = false;
                $peserta->id_jadwal = $id_jadwal;
                $peserta->save();
            });

            return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil diverifikasi.');
        }
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
        // Fetch the user register data
        $register = $request->id_register;

        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'id_register' => 'required|exists:siswa_registers,id',
            'nama_peserta' => 'required|string',
            'jenis_pembayaran' => 'required|in:tunai,transfer',
            'via' => 'nullable|string',
            'tanggal' => 'nullable|date',
        ]);


        // If validation fails, return with errorss
        if ($validator->fails()) {
            return redirect()->back()->withErrorss($validator)->withInput();
        }

        // Handle file upload if payment type is 'transfer'
        $buktiPath = null;
        if ($request->hasFile('bukti')) {
            $buktiPath = $request->file('bukti')->store('bukti_pembayaran', 'public');
        }

        // Create the payment record
        $pembayaran = Pembayaran::create([
            'id_register' => $request->id_register,
            'nama_peserta' => $request->nama_peserta,
            'jenis_pembayaran' => $request->jenis_pembayaran,
            'via' => $request->jenis_pembayaran === 'transfer' ? $request->via : 'admin',
            'tanggal' => now(),
            'bukti' => $buktiPath,
            'status' => false, // Set status to pending/false by default
        ]);

        if (!$pembayaran) {
            return redirect()->back()->with('errors', 'Pembayaran gagal ditambahkan.');
        }

        // If everything goes well, return to the payment index page
        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil ditambahkan.');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the payment record by ID
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->delete();

        if ($pembayaran) {
            $peserta = Peserta::where('id_register', $pembayaran->id_register)->first();
            $peserta->delete();
        }

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil dihapus.');
    }
}
