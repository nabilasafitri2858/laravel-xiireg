<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tarif;
use App\Models\AreaParkir;
use App\Models\Kendaraan;

class AdminDashboardController extends Controller
{
    public function index(Request $request)
    {
        $menu = $request->get('menu', 'dashboard');

        // Data User
        $users = User::all();

        // Data Tarif
        $tarifs = Tarif::all();

        // Data Area Parkir
        $areas = AreaParkir::all();

        // Data Kendaraan
        $kendaraans = Kendaraan::all();

        // Jumlah data
        $jumlahUser = User::count();
        $jumlahTarif = Tarif::count();
        $jumlahArea = AreaParkir::count();
        $jumlahKendaraan = Kendaraan::count();

        return view('admin.dashboard', compact(
            'menu',
            'users',
            'tarifs',
            'areas',
            'kendaraans',
            'jumlahUser',
            'jumlahTarif',
            'jumlahArea',
            'jumlahKendaraan'
        ));
    }
}