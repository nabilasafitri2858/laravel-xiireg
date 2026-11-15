<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $tanggalMulai = $request->input(
            'tanggal_mulai',
            Carbon::today()->toDateString()
        );

        $tanggalSelesai = $request->input(
            'tanggal_selesai',
            Carbon::today()->toDateString()
        );

        $query = Transaksi::query()
            ->leftJoin(
                'tb_kendaraan',
                'tb_transaksi.id_kendaraan',
                '=',
                'tb_kendaraan.id_kendaraan'
            )
            ->leftJoin(
                'tb_user',
                'tb_transaksi.id_user',
                '=',
                'tb_user.id_user'
            )
            ->select(
                'tb_transaksi.*',
                'tb_kendaraan.jenis_kendaraan',
                'tb_kendaraan.warna',
                'tb_kendaraan.pemilik',
                'tb_user.nama_lengkap'
            )
            ->whereDate(
                'tb_transaksi.waktu_masuk',
                '>=',
                $tanggalMulai
            )
            ->whereDate(
                'tb_transaksi.waktu_masuk',
                '<=',
                $tanggalSelesai
            )
            ->orderBy('tb_transaksi.waktu_masuk', 'desc');

        $transaksi = $query->get();

        $totalTransaksi = $transaksi->count();

        $totalPendapatan = $transaksi
            ->where('status', 'keluar')
            ->sum('biaya_total');

        $kendaraanSelesai = $transaksi
            ->where('status', 'keluar')
            ->count();

        $kendaraanMasihParkir = $transaksi
            ->where('status', 'masuk')
            ->count();

        return view('owner.laporan.index', compact(
            'transaksi',
            'tanggalMulai',
            'tanggalSelesai',
            'totalTransaksi',
            'totalPendapatan',
            'kendaraanSelesai',
            'kendaraanMasihParkir'
        ));
    }

    public function cetak(Request $request)
    {
        $request->validate([
            'tanggal_mulai' => ['required', 'date'],
            'tanggal_selesai' => [
                'required',
                'date',
                'after_or_equal:tanggal_mulai',
            ],
        ]);

        $tanggalMulai = $request->tanggal_mulai;
        $tanggalSelesai = $request->tanggal_selesai;

        $transaksi = Transaksi::query()
            ->leftJoin(
                'tb_kendaraan',
                'tb_transaksi.id_kendaraan',
                '=',
                'tb_kendaraan.id_kendaraan'
            )
            ->leftJoin(
                'tb_user',
                'tb_transaksi.id_user',
                '=',
                'tb_user.id_user'
            )
          ->select(
                'tb_transaksi.*',
                'tb_kendaraan.jenis_kendaraan',
                'tb_kendaraan.warna',
                'tb_kendaraan.pemilik',
                'tb_user.nama_lengkap'
            )
            ->whereDate(
                'tb_transaksi.waktu_masuk',
                '>=',
                $tanggalMulai
            )
            ->whereDate(
                'tb_transaksi.waktu_masuk',
                '<=',
                $tanggalSelesai
            )
            ->orderBy('tb_transaksi.waktu_masuk', 'desc')
            ->get();

        $totalPendapatan = $transaksi
            ->where('status', 'keluar')
            ->sum('biaya_total');

        return view('owner.laporan.cetak', compact(
            'transaksi',
            'tanggalMulai',
            'tanggalSelesai',
            'totalPendapatan'
        ));
    }
}
