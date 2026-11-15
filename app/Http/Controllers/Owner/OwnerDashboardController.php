<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Carbon\Carbon;

class OwnerDashboardController extends Controller
{
    public function index()
    {
        // Total seluruh transaksi
        $totalTransaksi = Transaksi::count();

        // Total transaksi hari ini
        $transaksiHariIni = Transaksi::whereDate(
            'waktu_masuk',
            Carbon::today()
        )->count();

        // Total pendapatan dari transaksi yang sudah selesai
        $totalPendapatan = Transaksi::where('status', 'keluar')
            ->sum('biaya_total');

        return view('owner.dashboard', compact(
            'totalTransaksi',
            'transaksiHariIni',
            'totalPendapatan'
        ));
    }
}
