<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    // Menampilkan data kendaraan
    public function index()
    {
        $kendaraans = Kendaraan::all();

        return view('admin.dashboard', [
            'menu' => 'kendaraan',
            'kendaraans' => $kendaraans
        ]);
    }

    // Menampilkan form tambah kendaraan
    public function create()
    {
        return view('admin.kendaraan.create');
    }

    // Menyimpan data kendaraan
    public function store(Request $request)
    {
        $request->validate([
            'id_kendaraan' => 'required|string|max:20|unique:tb_kendaraan,id_kendaraan',
            'jenis_kendaraan' => 'required|string|max:50',
            'warna' => 'required|string|max:30',
            'pemilik' => 'required|string|max:100',
            'id_user' => 'required|string|max:20',
        ]);

        Kendaraan::create([
            'id_kendaraan' => $request->id_kendaraan,
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'warna' => $request->warna,
            'pemilik' => $request->pemilik,
            'id_user' => $request->id_user,
        ]);

        return redirect()
            ->route('admin.dashboard', ['menu' => 'kendaraan'])
            ->with('success', 'Data kendaraan berhasil ditambahkan!');
    }

    // Menampilkan form edit kendaraan
    public function edit($id_kendaraan)
    {
        $kendaraan = Kendaraan::findOrFail($id_kendaraan);

        return view('admin.kendaraan.edit', compact('kendaraan'));
    }

    // Mengubah data kendaraan
    public function update(Request $request, $id_kendaraan)
    {
        $kendaraan = Kendaraan::findOrFail($id_kendaraan);

        $request->validate([
            'jenis_kendaraan' => 'required|string|max:50',
            'warna' => 'required|string|max:30',
            'pemilik' => 'required|string|max:100',
            'id_user' => 'required|string|max:20',
        ]);

        $kendaraan->update([
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'warna' => $request->warna,
            'pemilik' => $request->pemilik,
            'id_user' => $request->id_user,
        ]);

        return redirect()
            ->route('admin.dashboard', ['menu' => 'kendaraan'])
            ->with('success', 'Data kendaraan berhasil diubah!');
    }

    // Menghapus data kendaraan
    public function destroy($id_kendaraan)
    {
        $kendaraan = Kendaraan::findOrFail($id_kendaraan);

        $kendaraan->delete();

        return redirect()
            ->route('admin.dashboard', ['menu' => 'kendaraan'])
            ->with('success', 'Data kendaraan berhasil dihapus!');
    }
}