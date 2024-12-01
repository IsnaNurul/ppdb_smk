<?php

namespace App\Http\Controllers;

use App\Models\Brosur;
use App\Models\Gelombang;
use App\Models\Jurusan;
// use Carbon\Carbon;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        // Set locale Carbon ke Indonesia
        // Carbon::setLocale('id');
        // $today = Carbon::today();
        $today = date('Y-m-d');
        // Query untuk mendapatkan gelombang yang rentan waktunya mencakup hari ini
        $data['gelombang'] = Gelombang::where('tgl_akhir_pendaftaran', '>=', $today)
            ->where('tgl_awal_pendaftaran', '<=', $today)
            ->first();
        $data['jurusan'] = Jurusan::all();
        $data['pendaftaran'] = Gelombang::all();
        return view('pages.landingPage', $data);
    }

    public function download()
    {
        $brosur = Brosur::first();
        if ($brosur) {
            return response()->download(public_path('storage/' . $brosur->file));
        } else {
            return redirect()->back();
        }
    }
}
