<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $contact = Kontak::first();
        return view('pages.admin.kontak.index', compact('contact'));
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
        // Validate input data
        $request->validate([
            'alamat' => 'required|string',
            'email' => 'nullable|email',
            'nohp1' => 'nullable|string',
            'nohp2' => 'nullable|string',
            'nohp3' => 'nullable|string',
            'youtube' => 'nullable|url',
            'instagram' => 'nullable|url',
            'tiktok' => 'nullable|url',
        ]);

        // Check if the data already exists
        $kontak = Kontak::first();

        if ($kontak) {
            // Update existing data
            $kontak->update($request->only([
                'alamat',
                'email',
                'nohp1',
                'nohp2',
                'nohp3',
                'youtube',
                'instagram',
                'tiktok'
            ]));
        } else {
            // Create new record if it does not exist
            Kontak::create($request->all());
        }

        return redirect()->route('kontak.index')->with('success', 'Informasi kontak berhasil disimpan.');
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
