<?php

namespace App\Http\Controllers;

use App\Models\Gelombang;
use App\Models\Pembayaran;
use App\Models\Peserta;
use App\Models\SiswaRegister;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KonfirmasiPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = SiswaRegister::where('id_user',Auth::user()->id)->first();
        $konfirmasi_pembayaran = Pembayaran::where('id_register',$data->id)->first();
        // if ($konfirmasi_pembayaran) {
            $status_pembayaran = Pembayaran::where('id_register',$data->id)->with('siswa_register')->first();
        // }
        return view('pages.peserta.konfirmasi_pembayaran.index',compact('konfirmasi_pembayaran','status_pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $register = SiswaRegister::where('id_user',Auth::user()->id)->first();
        Carbon::setLocale('id');
        $today = Carbon::today();
        $buktiPath = null;
        if ($request->hasFile('bukti')) {
            // Tentukan nama file yang diinginkan, misalnya dengan NISN dan timestamp
            $nama_peserta = $request->input('nama_peserta');
            $fileName = $nama_peserta . '_' . time() . '.' . $request->file('bukti')->getClientOriginalExtension();

            // Simpan file dengan storeAs
            $buktiPath = $request->file('bukti')->storeAs('bukti_pembayaran', $fileName);

        }else{
            $buktiPath = null;
        }
        $pembayaran = Pembayaran::create([
            'nama_peserta' => $request->nama_peserta,
            'jenis_pembayaran' => 'transfer',
            'via' => $request->via,
            'tanggal' => $today,
            'bukti' => $buktiPath,
            'status' => 0,
            'id_register' => $register->id
        ]);
        if ($pembayaran) {
            return redirect()->back()->with('success', 'Pembayaran Berhasil');
        }else{
            return redirect()->back()->with('error', 'Pembayaran Gagal');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
