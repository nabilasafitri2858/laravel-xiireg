<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\LogAktivitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    // Mencatat aktivitas pengguna
    private function catatAktivitas($aktivitas)
    {
        $admin = auth()->user();

        if (!$admin) {
            return;
        }

        LogAktivitas::create([
            'id_log' => 'LOG' . strtoupper(Str::random(7)),
            'id_user' => $admin->id_user,
            'aktivitas' => $aktivitas,
            'waktu_aktivitas' => now(),
        ]);
    }

    // Menampilkan semua user
    public function index()
    {
        $users = User::all();

        return view('admin.user.index', compact('users'));
    }

    // Menampilkan form tambah user
    public function create()
    {
        return view('admin.user.create');
    }

    // Menyimpan user baru
    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|string|max:10|unique:tb_user,id_user',
            'nama_lengkap' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:tb_user,username',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,petugas,owner',
            'status_aktif' => 'required|boolean',
        ]);

        $user = User::create([
            'id_user' => $request->id_user,
            'nama' => $request->nama_lengkap,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status_aktif' => $request->status_aktif,
        ]);

        $this->catatAktivitas(
            'Menambahkan user ' . $user->nama .
            ' (' . $user->id_user . ')'
        );

        return redirect()
            ->route('admin.dashboard', ['menu' => 'user'])
            ->with('success', 'User berhasil ditambahkan.');
    }

    // Menampilkan form edit
    public function edit($id_user)
    {
        $user = User::findOrFail($id_user);

        return view('admin.user.edit', compact('user'));
    }

    // Mengubah data user
    public function update(Request $request, $id_user)
    {
        $user = User::findOrFail($id_user);

        $request->validate([
            'nama_lengkap' => 'required|string|max:255',

            'username' => 'required|string|max:255|unique:tb_user,username,' . $user->id_user . ',id_user',

            'password' => 'nullable|min:6',

            'role' => 'required|in:admin,petugas,owner',

            'status_aktif' => 'required|boolean',
        ]);

        $data = [
            'nama' => $request->nama_lengkap,
            'username' => $request->username,
            'role' => $request->role,
            'status_aktif' => $request->status_aktif,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        $this->catatAktivitas(
            'Memperbarui data user ' . $user->nama .
            ' (' . $user->id_user . ')'
        );

        return redirect()
            ->route('admin.dashboard', ['menu' => 'user'])
            ->with('success', 'User berhasil diperbarui.');
    }

    // Menonaktifkan user
    public function destroy($id_user)
    {
        $user = User::findOrFail($id_user);

        $user->update([
            'status_aktif' => 0
        ]);

        $this->catatAktivitas(
            'Menonaktifkan user ' . $user->nama .
            ' (' . $user->id_user . ')'
        );

        return redirect()
            ->route('admin.dashboard', ['menu' => 'user'])
            ->with('success', 'User berhasil dinonaktifkan.');
    }
}
