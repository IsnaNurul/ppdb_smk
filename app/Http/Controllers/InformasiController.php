<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // Validate the file input with proper error messages
    $validated = $request->validate([
        'file' => 'file|mimes:jpeg,jpg,png|max:10240', // Add your desired file types and max size (10MB in this case)
    ]);

    // Check if the validation passed
    if (!$validated) {
        return redirect()->route('brosur.index')->with('error', 'Format file tidak sesuai. Harap upload file JPEG, JPG atau PNG dengan ukuran maksimal 10MB.');
    }

        // Check if a informasi record already exists
        $informasi = Informasi::first();

        // Handle file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('informasi', $filename, 'public');

            // Update existing record or create a new one
            if ($informasi) {
                // Delete the old file if it exists
                if (Storage::disk('public')->exists($informasi->file)) {
                    Storage::disk('public')->delete($informasi->file);
                }
                $informasi->file = $filePath;
                $informasi->save();
            } else {
                Informasi::create([
                    'file' => $filePath,
                ]);
            }
        }

        return redirect()->route('brosur.index')->with('success', 'Informasi berhasil diupload.');
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
