<?php

namespace App\Http\Controllers;

use App\Models\SiswaRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataFileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = SiswaRegister::where('id_user',Auth::user()->id)->first();
        return view('pages.peserta.data_file.index',compact('data'));
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
        $fotoPath = null;
        $ijazahPath = null;
        if ($request->hasFile('foto')) {
            // Tentukan nama file yang diinginkan, misalnya dengan NISN dan timestamp
            $nisn = $request->input('nisn');
            $fileName = $nisn . '_' . time() . '.' . $request->file('foto')->getClientOriginalExtension();

            // Simpan file dengan storeAs
            $fotoPath = $request->file('foto')->storeAs('peserta/foto-peserta', $fileName);

        }else{
            $fotoPath = null;
        }

        if ($request->hasFile('ijazah')) {
            // Tentukan nama file yang diinginkan, misalnya dengan NISN dan timestamp
            $nisn = $request->input('nisn');
            $fileName = $nisn . '_' . time() . '.' . $request->file('ijazah')->getClientOriginalExtension();

            // Simpan file dengan storeAs
            $ijazahPath = $request->file('ijazah')->storeAs('peserta/ijazah-peserta', $fileName);

        }else{
            $ijazahPath = null;
        }
        $siswaRegistEdit = SiswaRegister::where('id_user',Auth::user()->id)->update([
            'foto' => $fotoPath,
            'ijazah' => $ijazahPath,
        ]);
        if ($siswaRegistEdit) {
            return redirect()->route('konfirmasi-pembayaran.index')->with('success','Data File Berhasil Diupload');
        } else {
            return redirect()->back()->with('errors','Data File Gagal Diupload');
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
