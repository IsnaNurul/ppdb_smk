<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\SiswaRegister;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $pendaftar = SiswaRegister::all()->count();
        $calon_siswa = Peserta::all()->count();
        $pplg1 = SiswaRegister::where('jurusan1','Rekayasa Perangkat Lunak & Gim')->count();
        $pplg2 = SiswaRegister::where('jurusan2','Rekayasa Perangkat Lunak & Gim')->count();
        $tkjt1 = SiswaRegister::where('jurusan1','Teknik Jaringan Komputer & Telekomunikasi')->count();
        $tkjt2 = SiswaRegister::where('jurusan2','Teknik Jaringan Komputer & Telekomunikasi')->count();
        $dkv1 = SiswaRegister::where('jurusan1','Desain Komunikasi Visual')->count();
        $dkv2 = SiswaRegister::where('jurusan2','Desain Komunikasi Visual')->count();
        $tkr1 = SiswaRegister::where('jurusan1','Teknik Kendaraan Ringan')->count();
        $tkr2 = SiswaRegister::where('jurusan2','Teknik Kendaraan Ringan')->count();
        $tsm1 = SiswaRegister::where('jurusan1','Teknik Sepeda Motor')->count();
        $tsm2 = SiswaRegister::where('jurusan2','Teknik Sepeda Motor')->count();
        $dpib1 = SiswaRegister::where('jurusan1','Desain Pemodelan & Informasi Bangunan')->count();
        $dpib2 = SiswaRegister::where('jurusan2','Desain Pemodelan & Informasi Bangunan')->count();
        $te1 = SiswaRegister::where('jurusan1','Teknik Elektronika Industri')->count();
        $te2 = SiswaRegister::where('jurusan2','Teknik Elektronika Industri')->count();
        $sti1 = SiswaRegister::where('jurusan1','Samsung Tech Institute')->count();
        $sti2 = SiswaRegister::where('jurusan2','Samsung Tech Institute')->count();
        $telkom_tkjt1 = SiswaRegister::where('jurusan1','Telkom-TKJT')->count();
        $telkom_tkjt2 = SiswaRegister::where('jurusan2','Telkom-TKJT')->count();
        $telkom_pplg1 = SiswaRegister::where('jurusan1','Telkom-PPLG')->count();
        $telkom_pplg2 = SiswaRegister::where('jurusan2','Telkom-PPLG')->count();
        return view ('pages.dashboard',compact('pendaftar','calon_siswa','pplg1','pplg2','tkjt1','tkjt2','dkv1','dkv2','tkr1','tkr2','tsm1','tsm2','dpib1','dpib2','te1','te2','sti1','sti2','telkom_tkjt1','telkom_tkjt2','telkom_pplg1','telkom_pplg2'));
    }
}