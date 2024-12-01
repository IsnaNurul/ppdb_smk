<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $jadwal = Jadwal::with('tahun_ajaran')->get();
        return view('pages.admin.jadwal.index',compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tahun_ajaran = TahunAjaran::all();
        return view('pages.admin.jadwal.create',compact('tahun_ajaran'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $jadwal = Jadwal::create([
            'tanggal' => $request->tanggal,
            'no_ruangan' => $request->no_ruangan,
            'ruangan' => $request->ruangan,
            'jumlah' => $request->jumlah,
            'sesi' => $request->sesi,
            'jam' => $request->jam,
            'id_tahun_ajaran' => $request->id_tahun_ajaran,
        ]);
        if ($jadwal) {
            return redirect()->route('jadwal.index')->with('success','Jadwal Berhasil ditambahkan');
        } else {
            return back()->with('success','Terjadi Kesalahan');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $tahun_ajaran = TahunAjaran::all();
        return view('pages.admin.jadwal.edit',compact('jadwal','tahun_ajaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus!');

    }
}
