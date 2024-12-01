<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $admins = User::where('level', 'admin')->get();
        $siswas = User::where('level', 'siswa')->get();
        $operators = User::where('level', 'operator')->get();
        return view('pages.admin.users.index', compact('admins', 'siswas','operators'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|in:admin,operator',
            'username' => 'nullable|string|unique:users,username',
            // 'nisn' => 'nullable|string|unique:users,nisn',
            'password' => 'required|string|min:6',
        ]);

        // Check level and set username or nisn to null if not provided
        // $username = $request->level === 'admin' ? $request->username : null;
        // $nisn = $request->level === 'siswa' ? $request->nisn : null;

        // Create a new user
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            // 'nisn' => $nisn,
            'password' => Hash::make($request->password),
            'level' => $request->level,
        ]);

        // Redirect to the users index page with a success message
        return redirect()->route('users.index')->with('success', 'Tambah user berhasil');
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
        $user = User::findOrFail($id);

        return view('pages.admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|in:admin,siswa',
            'username' => 'nullable|string|unique:users,username,' . $id,
            'nisn' => 'nullable|string|unique:users,nisn,' . $id,
            'password' => 'nullable|string|min:6',
        ]);

        // Update user fields based on level
        $user->name = $request->name;
        $user->level = $request->level;
        $user->username = $request->level === 'admin' ? $request->username : null;
        $user->username = $request->level === 'operator' ? $request->username : null;
        $user->nisn = $request->level === 'siswa' ? $request->nisn : null;

        // Update password only if it is provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Save changes
        $user->save();

        // Redirect with success message
        return redirect()->route('users.index')->with('success', 'Update user berhasil');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Delete the user
        $user->delete();

        // Redirect with success message
        return redirect()->route('users.index')->with('success', 'Hapus user berhasil');
    }

}
