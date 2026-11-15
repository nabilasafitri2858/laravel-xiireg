<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\Kendaraan;
use App\Models\Tarif;
use App\Models\AreaParkir;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    /**
     * Menampilkan daftar transaksi
     */
    public function index()
    {
        $transaksi = Transaksi::orderBy('waktu_masuk', 'desc')->get();

        $kendaraan = Kendaraan::all();
        $tarif = Tarif::all();
        $area = AreaParkir::all();

        return view('petugas.transaksi', compact(
            'transaksi',
            'kendaraan',
            'tarif',
            'area'
        ));
    }

    /**
     * Menyimpan transaksi kendaraan masuk
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_kendaraan' => 'required',
            'id_tarif' => 'required',
            'id_area' => 'required',
        ]);

        $kendaraan = Kendaraan::find($request->id_kendaraan);

        if (!$kendaraan) {
            return back()->with('error', 'Kendaraan tidak ditemukan.');
        }

        $area = AreaParkir::find($request->id_area);

        if (!$area) {
            return back()->with('error', 'Area parkir tidak ditemukan.');
        }

        // Cek kapasitas area
        if ($area->terisi >= $area->kapasitas) {
            return back()->with('error', 'Area parkir sudah penuh.');
        }

        // ID transaksi
        $idParkir = 'TRX-' . strtoupper(Str::random(6));

        Transaksi::create([
            'id_parkir' => $idParkir,
            'id_kendaraan' => $request->id_kendaraan,
            'waktu_masuk' => Carbon::now(),
            'waktu_keluar' => null,
            'id_tarif' => $request->id_tarif,
            'durasi_jam' => null,
            'biaya_total' => 0,
            'status' => 'masuk',
            'id_user' => auth()->user()->id_user,
            'id_area' => $request->id_area,
        ]);

        // Tambah jumlah kendaraan di area
        $area->increment('terisi');

        return redirect()
            ->route('petugas.transaksi')
            ->with('success', 'Transaksi kendaraan masuk berhasil disimpan.');
    }

    /**
     * Memproses kendaraan keluar
     */
    public function keluar($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        if ($transaksi->status === 'keluar') {
            return back()->with('error', 'Kendaraan ini sudah keluar.');
        }

        // Waktu kendaraan keluar
        $waktuKeluar = Carbon::now();

        // Hitung durasi dalam jam
        $waktuMasuk = Carbon::parse($transaksi->waktu_masuk);

        $durasiMenit = $waktuMasuk->diffInMinutes($waktuKeluar);

        // Minimal dihitung 1 jam
        $durasiJam = max(1, ceil($durasiMenit / 60));

        // Ambil tarif parkir
        $tarif = Tarif::find($transaksi->id_tarif);

        if (!$tarif) {
            return back()->with('error', 'Tarif parkir tidak ditemukan.');
        }

        // Hitung biaya
        $biayaTotal = $durasiJam * $tarif->tarif_per_jam;

        // Simpan transaksi
        $transaksi->update([
            'waktu_keluar' => $waktuKeluar,
            'durasi_jam' => $durasiJam,
            'biaya_total' => $biayaTotal,
            'status' => 'keluar',
        ]);

        // Kurangi jumlah kendaraan di area parkir
        $area = AreaParkir::find($transaksi->id_area);

        if ($area && $area->terisi > 0) {
            $area->decrement('terisi');
        }

        return back()->with(
            'success',
            'Kendaraan berhasil keluar. Total biaya: Rp ' .
            number_format($biayaTotal, 0, ',', '.')
        );
    }

    public function struk($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        if ($transaksi->status !== 'keluar') {
            return back()->with(
                'error',
                'Struk hanya dapat dicetak setelah kendaraan keluar.'
            );
        }

        $kendaraan = Kendaraan::find($transaksi->id_kendaraan);
        $tarif = Tarif::find($transaksi->id_tarif);
        $area = AreaParkir::find($transaksi->id_area);

        return view('petugas.struk', compact(
            'transaksi',
            'kendaraan',
            'tarif',
            'area'
        ));
    }
}