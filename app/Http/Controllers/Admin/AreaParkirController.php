<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AreaParkir;
use App\Models\LogAktivitas;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AreaParkirController extends Controller
{
    // Mencatat aktivitas pengguna
    private function catatAktivitas($aktivitas)
    {
        $user = auth()->user();

        if (!$user) {
            return;
        }

        LogAktivitas::create([
            'id_log' => 'LOG' . strtoupper(Str::random(7)),
            'id_user' => $user->id_user,
            'aktivitas' => $aktivitas,
            'waktu_aktivitas' => now(),
        ]);
    }

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
            'id_area' => 'required|string|max:10|unique:tb_area_parkir,id_area',
            'nama_area' => 'required|string|max:50',
            'kapasitas' => 'required|integer|min:1',
            'terisi' => 'required|integer|min:0|lte:kapasitas',
        ], [
            'id_area.required' => 'ID Area wajib diisi.',
            'id_area.unique' => 'ID Area sudah digunakan.',
            'nama_area.required' => 'Nama Area wajib diisi.',
            'kapasitas.min' => 'Kapasitas minimal harus 1.',
            'terisi.min' => 'Jumlah terisi tidak boleh negatif.',
            'terisi.lte' => 'Jumlah terisi tidak boleh melebihi kapasitas.',
        ]);

        AreaParkir::create([
            'id_area' => $request->id_area,
            'nama_area' => $request->nama_area,
            'kapasitas' => $request->kapasitas,
            'terisi' => $request->terisi,
        ]);

        $this->catatAktivitas(
            'Menambahkan area parkir ' . $request->nama_area .
            ' (' . $request->id_area . ')'
        );

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
        $area = AreaParkir::findOrFail($id);

        $request->validate([
            'nama_area' => 'required|string|max:50',
            'kapasitas' => 'required|integer|min:1|gte:terisi',
            'terisi' => 'required|integer|min:0|lte:kapasitas',
        ], [
            'nama_area.required' => 'Nama Area wajib diisi.',
            'kapasitas.min' => 'Kapasitas minimal harus 1.',
            'kapasitas.gte' => 'Kapasitas tidak boleh lebih kecil dari jumlah terisi.',
            'terisi.min' => 'Jumlah terisi tidak boleh negatif.',
            'terisi.lte' => 'Jumlah terisi tidak boleh melebihi kapasitas.',
        ]);

        $area->update([
            'nama_area' => $request->nama_area,
            'kapasitas' => $request->kapasitas,
            'terisi' => $request->terisi,
        ]);

        $this->catatAktivitas(
            'Memperbarui area parkir ' . $area->nama_area .
            ' (' . $area->id_area . ')'
        );

        return redirect()
            ->route('admin.dashboard', ['menu' => 'area'])
            ->with('success', 'Area parkir berhasil diperbarui!');
    }

    // Menonaktifkan area parkir
    public function destroy($id)
    {
        $area = AreaParkir::findOrFail($id);

        $area->status_aktif = 0;
        $area->save();

        $this->catatAktivitas(
            'Menonaktifkan area parkir ' . $area->nama_area .
            ' (' . $area->id_area . ')'
        );

        return redirect()
            ->route('admin.dashboard', ['menu' => 'area'])
            ->with('success', 'Area parkir berhasil dinonaktifkan!');
    }

    // Mengaktifkan kembali area parkir
        public function activate($id)
        {
            $area = AreaParkir::findOrFail($id);

            $area->status_aktif = 1;
            $area->save();

            $this->catatAktivitas(
                'Mengaktifkan kembali area parkir ' . $area->nama_area .
                ' (' . $area->id_area . ')'
            );

            return redirect()
                ->route('admin.dashboard', ['menu' => 'area'])
                ->with('success', 'Area parkir berhasil diaktifkan kembali!');
        }
}
