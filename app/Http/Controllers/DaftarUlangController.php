<?php

namespace App\Http\Controllers;

use App\Models\DaftarUlang;
use App\Models\Hasil;
use App\Models\Jurusan;
use App\Models\Peserta;
use App\Models\SiswaRegister;
use Illuminate\Http\Request;
use Monolog\Registry;

class DaftarUlangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $daftar_ulang = DaftarUlang::with('peserta.siswa_register')->get();
        // dd($daftar_ulang);
        return view('pages.admin.daftar_ulang.index', compact('daftar_ulang'));
    }

    public function toggleDaftarUlang($id)
    {
        $siswa = DaftarUlang::findOrFail($id);
        $siswa->status = !$siswa->status; // Toggle the status
        $siswa->save();

        $peserta = Peserta::where('no_peserta', $siswa->no_peserta)->first();

        $register = SiswaRegister::findOrFail($peserta->id_register);

        $program = Jurusan::where('nama_jurusan', $register->jurusan1)->first();

        $hasil = Hasil::create([
            'nisn' => $register->nisn,
            'no_peserta' => $siswa->no_peserta,
            'program' => $program->nama_jurusan,
            'id_program' => $program->id,
            'status' => false,
            'id_daftar_ulang' => $id,
            'daftar_ulang'  => true
        ]);

        return redirect()->back()->with('success', 'Daftar ulang status berhasil diupdate');
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
