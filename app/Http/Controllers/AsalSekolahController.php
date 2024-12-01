<?php

namespace App\Http\Controllers;

use App\Models\AsalSekolah;
use Illuminate\Http\Request;

class AsalSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $sekolah = AsalSekolah::all();
        return view('pages.admin.asal_sekolah.index', compact('sekolah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.admin.asal_sekolah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'kode_sekolah' => 'required|unique:asal_sekolahs,kode_sekolah',
            'nama_sekolah' => 'required|string|max:255',
            'npsn' => 'nullable',
            'index_sekolah' => 'nullable|numeric',
        ]);

        // Create a new school record
        AsalSekolah::create([
            'kode_sekolah' => $request->input('kode_sekolah'),
            'nama_sekolah' => $request->input('nama_sekolah'),
            'npsn' => $request->input('npsn'),
            'index_sekolah' => $request->input('index_sekolah'),
        ]);

        // Redirect back with a success message
        return redirect()->route('sekolah.index')->with('success', 'Data Sekolah berhasil ditambahkan.');
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
    public function edit($kode_sekolah)
    {
        $sekolah = AsalSekolah::findOrFail($kode_sekolah);
        return view('pages.admin.asal_sekolah.edit', compact('sekolah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $kode_sekolah)
    {
        // Validate the input
        $request->validate([
            'kode_sekolah' => 'required|integer|unique:asal_sekolahs,kode_sekolah,' . $kode_sekolah . ',kode_sekolah',
            'nama_sekolah' => 'required|string|max:255',
            'npsn' => 'nullable|integer',
            'index_sekolah' => 'nullable|numeric',
        ]);

        // Find and update the school record
        $sekolah = AsalSekolah::findOrFail($kode_sekolah);
        $sekolah->update([
            'kode_sekolah' => $request->input('kode_sekolah'),
            'nama_sekolah' => $request->input('nama_sekolah'),
            'npsn' => $request->input('npsn'),
            'index_sekolah' => $request->input('index_sekolah'),
        ]);

        // Redirect back with a success message
        return redirect()->route('sekolah.index')->with('success', 'Data Sekolah berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($kode_sekolah)
    {
        $sekolah = AsalSekolah::findOrFail($kode_sekolah);
        $sekolah->delete();

        return redirect()->route('sekolah.index')->with('success', 'Data Sekolah berhasil dihapus.');
    }
}
