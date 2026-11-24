<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\Admin\KendaraanController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TarifController;
use App\Http\Controllers\Admin\AreaParkirController;
use App\Http\Controllers\Admin\LogAktivitasController;

use App\Http\Controllers\Petugas\PetugasDashboardController;
use App\Http\Controllers\Petugas\TransaksiController;

use App\Http\Controllers\Owner\OwnerDashboardController;
use App\Http\Controllers\Owner\LaporanController;

use App\Http\Middleware\CheckRole;


// INDEX
Route::get('/index', function () {
    return view('Index');
});


// LOGIN DAN LOGOUT
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


// =============================
// ADMIN
// =============================

Route::middleware(['auth', CheckRole::class . ':admin'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('admin.dashboard');

            // CRUD USER
        Route::resource('/user', UserController::class)
            ->names('admin.user');
        Route::patch('/user/{id}/activate', [UserController::class, 'activate'])
            ->name('admin.user.activate');
        // CRUD TARIF
        Route::prefix('tarif')
            ->name('admin.tarif.')
            ->group(function () {

                Route::get('/', [TarifController::class, 'index'])->name('index');
                Route::get('/create', [TarifController::class, 'create'])->name('create');
                Route::post('/', [TarifController::class, 'store'])->name('store');
                Route::get('/{id_tarif}/edit', [TarifController::class, 'edit'])->name('edit');
                Route::put('/{id_tarif}', [TarifController::class, 'update'])->name('update');
                Route::delete('/{id_tarif}', [TarifController::class, 'destroy'])->name('destroy');
            });

        // CRUD AREA PARKIR
        Route::prefix('area')
            ->name('admin.area.')
            ->group(function () {

                Route::get('/', [AreaParkirController::class, 'index'])->name('index');
                Route::get('/create', [AreaParkirController::class, 'create'])->name('create');
                Route::post('/', [AreaParkirController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [AreaParkirController::class, 'edit'])->name('edit');
                Route::put('/{id}', [AreaParkirController::class, 'update'])->name('update');
                Route::delete('/{id}', [AreaParkirController::class, 'destroy'])->name('destroy');
                Route::patch('/{id}/activate', [AreaParkirController::class, 'activate'])->name('activate');

            });

        // CRUD KENDARAAN
        Route::prefix('kendaraan')
            ->name('admin.kendaraan.')
            ->group(function () {

                Route::get('/', [KendaraanController::class, 'index'])->name('index');
                Route::get('/create', [KendaraanController::class, 'create'])->name('create');
                Route::post('/', [KendaraanController::class, 'store'])->name('store');
                Route::get('/{id_kendaraan}/edit', [KendaraanController::class, 'edit'])->name('edit');
                Route::put('/{id_kendaraan}', [KendaraanController::class, 'update'])->name('update');
                Route::delete('/{id_kendaraan}', [KendaraanController::class, 'destroy'])->name('destroy');
                Route::patch('/{id_kendaraan}/activate', [KendaraanController::class, 'activate'])->name('activate');
            });

        // LOG AKTIVITAS
        Route::get('/log-aktivitas', [LogAktivitasController::class, 'index'])
            ->name('admin.log');
    });


// =============================
// PETUGAS
// =============================

Route::middleware(['auth', CheckRole::class . ':petugas'])
    ->prefix('petugas')
    ->group(function () {

        Route::get('/dashboard', [PetugasDashboardController::class, 'index'])
            ->name('petugas.dashboard');

        Route::get('/transaksi', [TransaksiController::class, 'index'])
            ->name('petugas.transaksi');

        Route::post('/transaksi', [TransaksiController::class, 'store'])
            ->name('petugas.transaksi.store');

        Route::post('/transaksi/{id}/keluar', [TransaksiController::class, 'keluar'])
            ->name('petugas.transaksi.keluar');

        Route::get('/transaksi/{id}/struk', [TransaksiController::class, 'struk'])
            ->name('petugas.transaksi.struk');
    });


// =============================
// OWNER
// =============================

Route::middleware(['auth', CheckRole::class . ':owner'])
    ->prefix('owner')
    ->group(function () {

        Route::get('/dashboard', [OwnerDashboardController::class, 'index'])
            ->name('owner.dashboard');

        Route::get('/laporan', [LaporanController::class, 'index'])
            ->name('owner.laporan.index');

        Route::get('/laporan/cetak', [LaporanController::class, 'cetak'])
            ->name('owner.laporan.cetak');
    });
