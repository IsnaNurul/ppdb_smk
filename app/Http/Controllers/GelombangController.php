<?php

namespace App\Http\Controllers;

use App\Models\Gelombang;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class GelombangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $gelombang = Gelombang::with('tahun_ajaran')->get();
        return view('pages.admin.gelombang.index', compact('gelombang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $tahun_ajaran = TahunAjaran::all();
        return view('pages.admin.gelombang.create', compact('tahun_ajaran'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_tahun_ajaran' => 'required|exists:tahun_ajarans,id',
            'tgl_awal_pendaftaran' => 'required|date',
            'tgl_akhir_pendaftaran' => 'required|date|after_or_equal:tgl_awal_pendaftaran',
            'tgl_pemetaan_jurusan' => 'required|date',
            'tgl_pengumuman_hasil' => 'required|date',
            'tgl_awal_daftarulang' => 'required|date',
            'tgl_akhir_daftarulang' => 'required|date|after_or_equal:tgl_awal_daftarulang',
        ]);

        // Cari gelombang terakhir dari tahun ajaran yang dipilih
        $latestGelombang = Gelombang::where('id_tahun_ajaran', $request->id_tahun_ajaran)
            ->orderBy('gelombang', 'desc')
            ->first();

        $nextGelombang = $latestGelombang ? ((int)$latestGelombang->gelombang + 1) : 1;

        // Simpan data baru
        Gelombang::create([
            'id_tahun_ajaran' => $request->id_tahun_ajaran,
            'gelombang' => $nextGelombang,
            'tgl_awal_pendaftaran' => $request->tgl_awal_pendaftaran,
            'tgl_akhir_pendaftaran' => $request->tgl_akhir_pendaftaran,
            'tgl_pemetaan_jurusan' => $request->tgl_pemetaan_jurusan,
            'tgl_pengumuman_hasil' => $request->tgl_pengumuman_hasil,
            'tgl_awal_daftarulang' => $request->tgl_awal_daftarulang,
            'tgl_akhir_daftarulang' => $request->tgl_akhir_daftarulang
        ]);

        return redirect()->route('gelombang.index')->with('success', 'Gelombang berhasil ditambahkan!');
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
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $gelombang = Gelombang::findOrFail($id);
        $tahun_ajaran = TahunAjaran::all();
        return view('pages.admin.gelombang.edit', compact('gelombang', 'tahun_ajaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_tahun_ajaran' => 'required|exists:tahun_ajarans,id',
            'tgl_awal_pendaftaran' => 'required|date',
            'tgl_akhir_pendaftaran' => 'required|date|after_or_equal:tgl_awal_pendaftaran',
            'tgl_pemetaan_jurusan' => 'required|date',
            'tgl_pengumuman_hasil' => 'required|date',
            'tgl_awal_daftarulang' => 'required|date',
            'tgl_akhir_daftarulang' => 'required|date|after_or_equal:tgl_awal_daftarulang',
        ]);

        $gelombang = Gelombang::findOrFail($id);
        $gelombang->update($request->all());

        return redirect()->route('gelombang.index')->with('success', 'Gelombang berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gelombang = Gelombang::findOrFail($id);

        $gelombang->delete();

        return redirect()->route('gelombang.index')->with('success', 'Gelombang berhasil dihapus!');
    }
}
