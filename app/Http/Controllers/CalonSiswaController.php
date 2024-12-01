<?php

namespace App\Http\Controllers;

use App\Exports\CalonSiswaExport;
use App\Models\Hasil;
use App\Models\Jurusan;
use App\Models\Peserta;
use App\Models\SiswaRegister;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CalonSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // Ambil data Peserta dengan relasi SiswaRegister, dan filter berdasarkan tahun ajaran aktif
        $data = Peserta::whereHas('siswa_register.gelombang.tahun_ajaran', function ($query) {
            // Hanya ambil tahun ajaran yang aktif (status = true)
            $query->where('status', true);
        })
            ->with('siswa_register.gelombang.tahun_ajaran') // Eager loading untuk relasi
            ->get();

        return view('pages.admin.calon_siswa.index', compact('data'));
    }

    public function toggleDaftarUlang($no_peserta)
    {
        $peserta = Peserta::findOrFail($no_peserta);
        $peserta->daftar_ulang = !$peserta->status; // Toggle the status
        $peserta->save();

        $register = SiswaRegister::findOrFail($peserta->id_register);

        $program = Jurusan::where('nama_jurusan', $register->jurusan1)->first();

        $hasil = Hasil::create([
            'nisn' => $register->nisn,
            'no_peserta' => $no_peserta,
            'program' => $program->nama_jurusan,
            'id_program' => $program->id,
            'status' => true
        ]);

        return redirect()->back()->with('success', 'Daftar ulang berhasil');
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
