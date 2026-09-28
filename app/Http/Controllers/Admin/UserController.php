<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
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
            'id_user' => 'required|unique:tb_user,id_user',
            'nama_lengkap' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:tb_user,username',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,petugas,owner',
            'status_aktif' => 'required|boolean',
        ]);


        User::create([
            'id_user' => $request->id_user,
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status_aktif' => $request->status_aktif,
        ]);


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
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'role' => $request->role,
            'status_aktif' => $request->status_aktif,
        ];


        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }


        $user->update($data);


        return redirect()
            ->route('admin.dashboard', ['menu' => 'user'])
            ->with('success', 'User berhasil diperbarui.');
    }


    // Menghapus user
    public function destroy($id_user)
    {
        $user = User::findOrFail($id_user);

        $user->delete();


        return redirect()
            ->route('admin.dashboard', ['menu' => 'user'])
            ->with('success', 'User berhasil dihapus.');
    }
}