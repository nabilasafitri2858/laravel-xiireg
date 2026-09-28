<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AreaParkir;
use Illuminate\Http\Request;

class AreaParkirController extends Controller
{
    // Menampilkan data area parkir
    public function index()
    {
        $areas = AreaParkir::all();

        return view('admin.area.index', compact('areas'));
    }


    // Menampilkan form tambah area
    public function create()
    {
        return view('admin.area.create');
    }


    // Menyimpan area baru
    public function store(Request $request)
    {
        $request->validate([
            'id_area' => 'required|unique:tb_area_parkir,id_area',
            'nama_area' => 'required',
            'kapasitas' => 'required|integer',
            'terisi' => 'required|integer',
        ], [
            'id_area.unique' => 'ID Area sudah digunakan. Silakan gunakan ID Area lain.',
        ]);


        AreaParkir::create([
            'id_area' => $request->id_area,
            'nama_area' => $request->nama_area,
            'kapasitas' => $request->kapasitas,
            'terisi' => $request->terisi,
        ]);


        return redirect()
            ->route('admin.dashboard', ['menu' => 'area'])
            ->with('success', 'Area parkir berhasil ditambahkan!');
    }


    // Menampilkan form edit
    public function edit($id)
    {
        $area = AreaParkir::findOrFail($id);

        return view('admin.area.edit', compact('area'));
    }


    // Memperbarui data area
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_area' => 'required',
            'kapasitas' => 'required|integer',
            'terisi' => 'required|integer',
        ]);


        $area = AreaParkir::findOrFail($id);


        $area->update([
            'nama_area' => $request->nama_area,
            'kapasitas' => $request->kapasitas,
            'terisi' => $request->terisi,
        ]);


        return redirect()
            ->route('admin.dashboard', ['menu' => 'area'])
            ->with('success', 'Area parkir berhasil diperbarui!');
    }


    // Menghapus area
    public function destroy($id)
    {
        $area = AreaParkir::findOrFail($id);

        $area->delete();


        return redirect()
            ->route('admin.dashboard', ['menu' => 'area'])
            ->with('success', 'Area parkir berhasil dihapus!');
    }
}