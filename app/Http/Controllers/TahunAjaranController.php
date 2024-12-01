<?php

namespace App\Http\Controllers;

use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class TahunAjaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tahun_ajaran = TahunAjaran::all();
        return view('pages.admin.tahun_ajaran.index', compact('tahun_ajaran'));
    }

    public function changeStatus($id)
    {
        // Nonaktifkan semua Tahun Ajaran
        TahunAjaran::where('status', 1)->update(['status' => 0]);

        // Aktifkan Tahun Ajaran yang dipilih
        $tahunAjaran = TahunAjaran::findOrFail($id);
        $tahunAjaran->status = 1;
        $tahunAjaran->save();

        return redirect()->route('tahun-ajaran.index')->with('success', 'Status Tahun Ajaran berhasil diubah!');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.admin.tahun_ajaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'awal_tahun_ajaran' => 'required|integer|min:2000|max:3000',
            'akhir_tahun_ajaran' => 'required|integer|min:2000|max:3000',
        ]);

        // Simpan data ke database
        TahunAjaran::create([
            'awal_tahun_ajaran' => $request->awal_tahun_ajaran,
            'akhir_tahun_ajaran' => $request->akhir_tahun_ajaran,
            'status' => 0, // Default status nonaktif
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('tahun-ajaran.index')->with('success', 'Tahun Ajaran berhasil ditambahkan!');
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
