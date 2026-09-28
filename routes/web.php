<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\Admin\KendaraanController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TarifController;
use App\Http\Controllers\Admin\AreaParkirController;

use App\Http\Controllers\Petugas\PetugasDashboardController;

use App\Http\Controllers\Owner\OwnerDashboardController;


// =========================
// INDEX
// =========================

Route::get('/index', function () {
    return view('Index');
});


// =========================
// LOGIN & LOGOUT
// =========================

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


// =========================
// DASHBOARD ADMIN
// =========================

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
    ->middleware('auth')
    ->name('admin.dashboard');


// =========================
// CRUD USER ADMIN
// =========================

Route::middleware('auth')->group(function () {

    Route::resource('/admin/user', UserController::class)
        ->names('admin.user');

});


// =========================
// CRUD TARIF PARKIR
// =========================

Route::middleware('auth')
    ->prefix('admin/tarif')
    ->name('admin.tarif.')
    ->group(function () {

        Route::get('/', [TarifController::class, 'index'])
            ->name('index');

        Route::get('/create', [TarifController::class, 'create'])
            ->name('create');

        Route::post('/', [TarifController::class, 'store'])
            ->name('store');

        Route::get('/{id_tarif}/edit', [TarifController::class, 'edit'])
            ->name('edit');

        Route::put('/{id_tarif}', [TarifController::class, 'update'])
            ->name('update');

        Route::delete('/{id_tarif}', [TarifController::class, 'destroy'])
            ->name('destroy');

    });


// =========================
// CRUD AREA PARKIR
// =========================

Route::prefix('admin/area')
    ->name('admin.area.')
    ->middleware('auth')
    ->group(function () {

        Route::get('/', [AreaParkirController::class, 'index'])
            ->name('index');

        Route::get('/create', [AreaParkirController::class, 'create'])
            ->name('create');

        Route::post('/', [AreaParkirController::class, 'store'])
            ->name('store');

        Route::get('/{id}/edit', [AreaParkirController::class, 'edit'])
            ->name('edit');

        Route::put('/{id}', [AreaParkirController::class, 'update'])
            ->name('update');

        Route::delete('/{id}', [AreaParkirController::class, 'destroy'])
            ->name('destroy');

    });

    // =========================
// CRUD KENDARAAN
// =========================

Route::prefix('admin/kendaraan')
    ->name('admin.kendaraan.')
    ->middleware('auth')
    ->group(function () {

        Route::get('/', [KendaraanController::class, 'index'])
            ->name('index');

        Route::get('/create', [KendaraanController::class, 'create'])
            ->name('create');

        Route::post('/', [KendaraanController::class, 'store'])
            ->name('store');

        Route::get('/{id_kendaraan}/edit', [KendaraanController::class, 'edit'])
            ->name('edit');

        Route::put('/{id_kendaraan}', [KendaraanController::class, 'update'])
            ->name('update');

        Route::delete('/{id_kendaraan}', [KendaraanController::class, 'destroy'])
            ->name('destroy');

    });


// =========================
// DASHBOARD PETUGAS
// =========================

Route::get('/petugas/dashboard', [PetugasDashboardController::class, 'index'])
    ->middleware('auth')
    ->name('petugas.dashboard');


// =========================
// DASHBOARD OWNER
// =========================

Route::get('/owner/dashboard', [OwnerDashboardController::class, 'index'])
    ->middleware('auth')
    ->name('owner.dashboard');