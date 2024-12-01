<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SiswaRegister;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    //
    public function showLoginForm()
    {
        return view('pages.admin.auth.login'); // Update this to your actual login view
    }

    public function login(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string'],
        ]);

        // Check if the user is an admin or a siswa
        if ($request->has('username')) {
            // Admin login: Authenticate using username and password
            $user = User::where('username', $request->username)->first();

            if (!$user || !Hash::check($request->password, $user->password) || $user->level !== 'admin' && $user->level !== 'operator') {
                throw ValidationException::withMessages([
                    'username' => ['Invalid credentials or user is not an admin.'],
                ]);
            }

            // Login the admin user
            Auth::login($user);

            return redirect()->route('dashboard.admin')->with('success','Selamat Datang Admin/Operator');
        } elseif ($request->has('nisn')) {
            // Siswa login: Authenticate using nisn and password
            $user = User::where('nisn', $request->nisn)->first();

            if (!$user || !Hash::check($request->password, $user->password) || $user->level !== 'siswa') {
                throw ValidationException::withMessages([
                    'nisn' => ['Invalid credentials or user is not a student.'],
                ]);
            }

            // Login the siswa user
            Auth::login($user);
            return redirect()->route('data-siswa.index')->with('success','Selamat Datang Calon Siswa');
        } else {
            throw ValidationException::withMessages([
                'credentials' => ['Both username/nisn and password are required.'],
            ]);
            return redirect()->back()->with('errors','Gagal Login');
        }
    }

    public function daftarSiswa(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nisn' => ['required','unique:users,nisn'],
            'nohp' => ['required'],
            'password' => 'required',
        ]);
        $creatAkun = User::create([
            'name' => $request->name,
            'nisn' => $request->nisn,
            'nohp' => $request->hohp,
            'password' => bcrypt($request->password),
            'level' => 'siswa'
        ]);
        if ($creatAkun) {
            if ($request->confirm_password == $request->password) {
                $id_user = $creatAkun->id;
                $siswaRegister = SiswaRegister::create(
                    [
                        'id_user' => $id_user,
                        'nama' => $request->name,
                        'nisn' => $request->nisn,
                        'nohp_siswa' => $request->hohp,
                    ]
                );
                if ($siswaRegister) {
                    return redirect()->route('login.siswa')->with('success', 'Berhasil membuat akun');
                }else{
                    return back()->with('errors', 'Gagal membuat akun');
                }
            }else{
                return back()->with('errors', 'Pastikan password dan konfirmasi password sama');
            }
        } else {
            return back()->with('errors', 'Gagal membuat akun');
        }
    }

    public function logout()
    {
        if (Auth::user()->level == 'admin') {
            Auth::logout();
            return redirect()->route('login.admin')->with('success', 'Logout Berhasil'); // Update to your login route
            # code...
        }

        if (Auth::user()->level == 'operator') {
            Auth::logout();
            return redirect()->route('login.admin')->with('success', 'Logout Berhasil'); // Update to your login route
            # code...
        }

        if (Auth::user()->level == 'siswa') {
            Auth::logout();
            return redirect()->route('login.siswa')->with('success', 'Logout Berhasil'); // Update to your login route
            # code...
        }
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'nullable|unique:users,username,' . $user->id,
            'nisn' => 'nullable|unique:users,nisn,' . $user->id,
            'level' => 'required',
        ]);

        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'nisn' => $request->nisn,
            'level' => $request->level,
        ]);

        return redirect()->back()->with('success', 'Update user berhasil');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'Hapus user berhasil');
    }
}
