<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Bisa login menggunakan username ATAU nama lengkap
        $user = User::where(function ($query) use ($request) {
            $query->where('username', $request->username)
                  ->orWhere('nama_lengkap', $request->username);
        })
        ->where('status_aktif', 1)
        ->first();

        // Jika username/nama tidak ditemukan
        if (!$user) {
            return back()
                ->withInput($request->only('username'))
                ->with('error', 'Username atau nama lengkap tidak ditemukan atau akun tidak aktif.');
        }

        // Jika password salah
        if (!Hash::check($request->password, $user->password)) {
            return back()
                ->withInput($request->only('username'))
                ->with('error', 'Password yang kamu masukkan salah.');
        }

        // Login user
        auth()->login(
            $user,
            $request->boolean('remember')
        );

        // Regenerate session
        $request->session()->regenerate();

        // Redirect berdasarkan role
        switch ($user->role) {

            case 'admin':
                return redirect('/admin/dashboard');

            case 'petugas':
                return redirect('/petugas/dashboard');

            case 'owner':
                return redirect('/owner/dashboard');

            default:
                auth()->logout();

                return redirect('/login')
                    ->with('error', 'Role pengguna tidak valid.');
        }
    }


    // Logout
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}