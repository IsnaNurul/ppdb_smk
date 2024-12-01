<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $jurusan = Jurusan::all();
        return view('pages.admin.jurusan.index', compact('jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tahun_ajaran = TahunAjaran::all();
        return view('pages.admin.jurusan.create',compact('tahun_ajaran'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input data
        $request->validate([
            'nama_jurusan' => 'required|string|max:255',
            'singkatan' => 'required|string|max:255',
        ]);

        // Create a new Jurusan instance and fill in the data
        $jurusan = new Jurusan();
        $jurusan->id_tahun_ajaran = $request->input('id_tahun_ajaran');
        $jurusan->nama_jurusan = $request->input('nama_jurusan');
        $jurusan->singkatan = $request->input('singkatan');
        $jurusan->pilihan1 = $request->has('pilihan1'); // Check if pilihan1 is selected
        $jurusan->pilihan2 = $request->has('pilihan2'); // Check if pilihan2 is selected

        // Save the data to the database
        $jurusan->save();

        // Redirect with a success message
        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil ditambahkan!');
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
    public function edit($id)
    {
        // Find the jurusan by ID
        $jurusan = Jurusan::findOrFail($id);
        $tahun_ajaran = TahunAjaran::all();

        // Return the edit view with jurusan data
        return view('pages.admin.jurusan.edit', compact('jurusan','tahun_ajaran'));
    }

    public function update(Request $request, $id)
    {
        // Validate the input data
        $request->validate([
            'nama_jurusan' => 'required|string|max:255',
            'singkatan' => 'required|string|max:255',
        ]);

        // Find the jurusan by ID
        $jurusan = Jurusan::findOrFail($id);

        // Update the jurusan attributes
        $jurusan->nama_jurusan = $request->input('nama_jurusan');
        $jurusan->singkatan = $request->input('singkatan');
        $jurusan->pilihan1 = $request->has('pilihan1'); // Check if pilihan1 is selected
        $jurusan->pilihan2 = $request->has('pilihan2'); // Check if pilihan2 is selected

        // Save the updated data to the database
        $jurusan->save();

        // Redirect with a success message
        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the jurusan by ID
        $jurusan = Jurusan::findOrFail($id);

        // Delete the jurusan from the database
        $jurusan->delete();

        // Redirect with a success message
        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil dihapus!');
    }
}
