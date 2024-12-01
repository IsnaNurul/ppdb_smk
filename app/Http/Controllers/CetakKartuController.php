<?php

namespace App\Http\Controllers;

use App\Models\Gelombang;
use App\Models\Peserta;
use App\Models\SiswaRegister;
use App\Models\TahunAjaran;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CetakKartuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tahun_ajaran = TahunAjaran::where('status',1)->first();
        $siswa = SiswaRegister::where('id_user',Auth::user()->id)->first();
        $peserta = Peserta::where('id_register',$siswa->id)->with('jadwal')->first();
        $gelombang = Gelombang::where('id',$siswa->gelombang)->first();
        return view('pages.peserta.cetak_kartu.index',compact('peserta','siswa','tahun_ajaran','gelombang'));
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
        $tahun_ajaran = TahunAjaran::where('status',1)->first();
        $siswa = SiswaRegister::where('id',$id)->first();
        $peserta = Peserta::where('id_register',$siswa->id)->with('jadwal')->first();
        $gelombang = Gelombang::where('id',$siswa->gelombang)->first();
        return view('pages.admin.calon_siswa.cetak_kartu',compact('peserta','siswa','tahun_ajaran','gelombang'));
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
