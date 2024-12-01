<?php

namespace App\Http\Controllers;

use App\Models\Brosur;
use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrosurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $brosur = Brosur::first();
        $informasi = Informasi::first();
        return view('pages.admin.brosur.index', compact('brosur', 'informasi'));
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
        // Validate the file input
        $validated = $request->validate([
            'file' => 'file|mimes:pdf,jpeg,jpg,png',  // Validates PDF files, max size 2MB
        ]);

        // Check if the validation passed
    if (!$validated) {
        return redirect()->route('brosur.index')->with('error', 'Format file tidak sesuai. Harap upload file PDF, JPEG, JPG atau PNG.');
    }

        // Check if a Brosur record already exists
        $brosur = Brosur::first();

        // Handle file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('brosurs', $filename, 'public');

            // Update existing record or create a new one
            if ($brosur) {
                // Delete the old file if it exists
                if (Storage::disk('public')->exists($brosur->file)) {
                    Storage::disk('public')->delete($brosur->file);
                }
                $brosur->file = $filePath;
                $brosur->save();
            } else {
                Brosur::create([
                    'file' => $filePath,
                ]);
            }
        }

        return redirect()->route('brosur.index')->with('success', 'Brosur berhasil diupload.');
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
