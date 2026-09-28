<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tarif;
use Illuminate\Http\Request;

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

    // Menyimpan tarif baru
    public function store(Request $request)
    {
        $request->validate([
            'id_tarif' => 'required',
            'jenis_kendaraan' => 'required',
            'tarif_per_jam' => 'required|numeric',
        ]);

        Tarif::create([
            'id_tarif' => $request->id_tarif,
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'tarif_per_jam' => $request->tarif_per_jam,
        ]);

       return redirect()->route('admin.dashboard', ['menu' => 'tarif'])
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

        $tarif->update([
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'tarif_per_jam' => $request->tarif_per_jam,
        ]);

        return redirect()->route('admin.tarif.index')
            ->with('success', 'Tarif parkir berhasil diperbarui!');
    }

    // Menghapus tarif
   public function destroy($id_tarif)
{
    $tarif = Tarif::findOrFail($id_tarif);
    $tarif->delete();

    return redirect()->route('admin.dashboard', ['menu' => 'tarif'])
        ->with('success', 'Tarif parkir berhasil dihapus!');
}
}