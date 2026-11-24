<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tarif;
use Illuminate\Http\Request;
use App\Models\LogAktivitas;
use Illuminate\Support\Str;

class TarifController extends Controller
{
    // Menampilkan semua data tarif
    public function index()
    {
        $tarifs = Tarif::all();

        return view('admin.tarif.index', compact('tarifs'));
    }

    // Menampilkan form tambah tarif
    public function create()
    {
        return view('admin.tarif.create');
    }

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

   // Menyimpan tarif baru
    public function store(Request $request)
    {
        $request->validate([
            'id_tarif' => 'required',
            'jenis_kendaraan' => 'required|string|max:100',
            'jenis_kendaraan_lainnya' => 'required_if:jenis_kendaraan,Lainnya|nullable|string|max:100',
            'tarif_per_jam' => 'required|numeric|min:0',
        ]);

        // Menentukan jenis kendaraan
        $jenisKendaraan = $request->jenis_kendaraan;

        if ($jenisKendaraan === 'Lainnya') {
            $jenisKendaraan = trim($request->jenis_kendaraan_lainnya);
        }

        Tarif::create([
            'id_tarif' => $request->id_tarif,
            'jenis_kendaraan' => $jenisKendaraan,
            'tarif_per_jam' => $request->tarif_per_jam,
        ]);

        $this->catatAktivitas(
            'Menambahkan tarif ' . $jenisKendaraan .
            ' (' . $request->id_tarif . ')'
        );

        return redirect()
            ->route('admin.dashboard', ['menu' => 'tarif'])
            ->with('success', 'Tarif parkir berhasil ditambahkan!');
    }
    // Menampilkan form edit tarif
    public function edit($id_tarif)
    {
        $tarif = Tarif::findOrFail($id_tarif);

        return view('admin.tarif.edit', compact('tarif'));
    }

    // Mengubah data tarif
    public function update(Request $request, $id_tarif)
    {
        $tarif = Tarif::findOrFail($id_tarif);

        $request->validate([
            'jenis_kendaraan' => 'required',
            'tarif_per_jam' => 'required|numeric',
        ]);

        $jenisLama = $tarif->jenis_kendaraan;

        $tarif->update([
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'tarif_per_jam' => $request->tarif_per_jam,
        ]);

        $this->catatAktivitas(
            'Memperbarui tarif ' . $jenisLama .
            ' menjadi ' . $tarif->jenis_kendaraan .
            ' (' . $tarif->id_tarif . ')'
        );

        return redirect()
            ->route('admin.dashboard', ['menu' => 'tarif'])
            ->with('success', 'Tarif parkir berhasil diperbarui!');
    }
   // Menghapus tarif
    public function destroy($id_tarif)
    {
        $tarif = Tarif::findOrFail($id_tarif);

        $jenisKendaraan = $tarif->jenis_kendaraan;
        $idTarif = $tarif->id_tarif;

        $tarif->delete();

        $this->catatAktivitas(
            'Menghapus tarif ' . $jenisKendaraan .
            ' (' . $idTarif . ')'
        );

        return redirect()
            ->route('admin.dashboard', ['menu' => 'tarif'])
            ->with('success', 'Tarif parkir berhasil dihapus!');
    }
}