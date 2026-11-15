<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use App\Models\LogAktivitas;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            'id_kendaraan' => 'required|string|max:10|unique:tb_kendaraan,id_kendaraan',
            'plat_nomor' => 'required_if:jenis_kendaraan,Motor,Mobil,Truk|nullable|string|max:20',
            'jenis_kendaraan' => 'required|string|max:100',
            'warna' => 'required|string|max:20',
            'pemilik' => 'required|string|max:100',
            'id_user' => 'required|string|max:10',
        ]);

        $kendaraan = new Kendaraan();

        $kendaraan->id_kendaraan = $request->id_kendaraan;
        $kendaraan->plat_nomor = $request->plat_nomor ?: null;
        $kendaraan->jenis_kendaraan = $request->jenis_kendaraan;
        $kendaraan->warna = $request->warna;
        $kendaraan->pemilik = $request->pemilik;
        $kendaraan->id_user = $request->id_user;
        $kendaraan->status_aktif = 1;

        $kendaraan->save();

        LogAktivitas::create([
            'id_log' => 'LOG' . strtoupper(Str::random(7)),
            'id_user' => auth()->id(),
            'aktivitas' => 'Menambahkan data kendaraan ' . $request->id_kendaraan,
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
            'plat_nomor' => 'required_if:jenis_kendaraan,Motor,Mobil,Truk|nullable|string|max:20',
            'jenis_kendaraan' => 'required|string|max:100',
            'warna' => 'required|string|max:20',
            'pemilik' => 'required|string|max:100',
            'id_user' => 'required|string|max:10',
        ]);

        $kendaraan->plat_nomor = $request->plat_nomor ?: null;
        $kendaraan->jenis_kendaraan = $request->jenis_kendaraan;
        $kendaraan->warna = $request->warna;
        $kendaraan->pemilik = $request->pemilik;
        $kendaraan->id_user = $request->id_user;

        $kendaraan->save();

        return redirect()
            ->route('admin.dashboard', ['menu' => 'kendaraan'])
            ->with('success', 'Data kendaraan berhasil diubah!');
    }

    // Menonaktifkan kendaraan
    public function destroy($id_kendaraan)
    {
        $kendaraan = Kendaraan::findOrFail($id_kendaraan);

        $kendaraan->status_aktif = 0;
        $kendaraan->save();

        return redirect()
            ->route('admin.dashboard', ['menu' => 'kendaraan'])
            ->with('success', 'Kendaraan berhasil dinonaktifkan!');
    }

    // Mengaktifkan kembali kendaraan
    public function activate($id_kendaraan)
    {
        $kendaraan = Kendaraan::findOrFail($id_kendaraan);

        $kendaraan->status_aktif = 1;
        $kendaraan->save();

        return redirect()
            ->route('admin.dashboard', ['menu' => 'kendaraan'])
            ->with('success', 'Kendaraan berhasil diaktifkan kembali!');
    }
}
