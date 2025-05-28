<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// Owner Controllers
use App\Http\Controllers\Owner\DashboardController as OwnerDashboardController;
use App\Http\Controllers\Owner\MitraController as OwnerMitraController;
use App\Http\Controllers\Owner\PengajuanMitraController as OwnerPengajuanMitraController;
use App\Http\Controllers\Owner\PegawaiController as OwnerPegawaiController;
use App\Http\Controllers\Owner\AkunController as OwnerAkunController;
use App\Http\Controllers\Owner\LaporanController as OwnerLaporanController;

// Petani Controllers
use App\Http\Controllers\Petani\MitraController as PetaniMitraController;
use App\Http\Controllers\Petani\DashboardController as PetaniDashboardController;
use App\Http\Controllers\Petani\AkunController as PetaniAkunController;
use App\Http\Controllers\Petani\LaporanController as PetaniLaporanController;


// Pegawai Controllers
use App\Http\Controllers\Pegawai\DashboardController as PegawaiDashboardController;
use App\Http\Controllers\Pegawai\MitraController as PegawaiMitraController;
use App\Http\Controllers\Pegawai\LaporanController as PegawaiLaporanController;
use App\Http\Controllers\Pegawai\AkunController as PegawaiAkunController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    // Owner Routes
    Route::middleware(['role:owner'])->prefix('owner')->name('owner.')->group(function () {
        // Dashboard
        Route::get('/dashboard', [OwnerDashboardController::class, 'index'])->name('dashboard');

        // Mitra Management
        Route::prefix('mitra')->name('mitra.')->group(function () {
            Route::get('/', [OwnerMitraController::class, 'index'])->name('index');
            Route::get('/create', [OwnerMitraController::class, 'create'])->name('create');
            Route::post('/', [OwnerMitraController::class, 'store'])->name('store');
            Route::get('/pengajuan', [OwnerMitraController::class, 'pengajuan'])->name('pengajuan');
            Route::get('/{mitra}', [OwnerMitraController::class, 'show'])->name('show');
            Route::get('/{mitra}/edit', [OwnerMitraController::class, 'edit'])->name('edit');
            Route::put('/{mitra}', [OwnerMitraController::class, 'update'])->name('update');
            Route::delete('/{mitra}', [OwnerMitraController::class, 'destroy'])->name('destroy');
            Route::put('/{mitra}/approve', [OwnerMitraController::class, 'approve'])->name('approve');
            Route::put('/{mitra}/reject', [OwnerMitraController::class, 'reject'])->name('reject');
            Route::get('/laporan', [OwnerMitraController::class, 'laporan'])->name('laporan');
            Route::get('/search/mitra', [OwnerMitraController::class, 'search'])->name('search');
            Route::put('/{mitra}/update-status', [OwnerMitraController::class, 'updateStatus'])->name('updateStatus');
        });
        // Pegawai Management
        Route::prefix('pegawai')->name('pegawai.')->group(function () {
            Route::get('/', [OwnerPegawaiController::class, 'index'])->name('index');
            Route::get('/create', [OwnerPegawaiController::class, 'create'])->name('create');
            Route::post('/', [OwnerPegawaiController::class, 'store'])->name('store');
            Route::get('/{pegawai}', [OwnerPegawaiController::class, 'show'])->name('show');
            Route::get('/{pegawai}/edit', [OwnerPegawaiController::class, 'edit'])->name('edit');
            Route::put('/{pegawai}', [OwnerPegawaiController::class, 'update'])->name('update');
        });
        // Route untuk profil owner
        Route::get('/akun', [App\Http\Controllers\Owner\AkunController::class, 'index'])->name('akun.index');
        Route::put('/akun', [App\Http\Controllers\Owner\AkunController::class, 'update'])->name('akun.update');

         //Laporan management
         Route::prefix('laporan')->name('laporan.')->group(function () {
            Route::get('/', [OwnerLaporanController::class, 'index'])->name('index');
            Route::get('/search', [OwnerLaporanController::class, 'search'])->name('search');
            Route::get('/create', [OwnerLaporanController::class, 'create'])->name('create');
            Route::post('/', [OwnerLaporanController::class, 'store'])->name('store');
            Route::get('/select-mitra', [OwnerLaporanController::class, 'selectMitra'])->name('select-mitra');
            Route::get('/search-mitra-select', [OwnerLaporanController::class, 'searchMitraSelect'])->name('search-mitra-select');
            Route::get('/search-mitra-index', [OwnerLaporanController::class, 'searchMitraIndex'])->name('search-mitra-index');
            Route::get('/{laporan}', [OwnerLaporanController::class, 'show'])->name('show');
            Route::get('/{laporan}/edit', [OwnerLaporanController::class, 'edit'])->name('edit');
            Route::put('/{laporan}', [OwnerLaporanController::class, 'update'])->name('update');
            Route::delete('/{laporan}', [OwnerLaporanController::class, 'destroy'])->name('destroy');
            Route::get('/mitra/{mitra}', [OwnerLaporanController::class, 'laporanMitra'])->name('laporan-mitra');
            // Route::get('/mitra/{mitra}', [OwnerLaporanController::class, 'mitra'])->name('mitra');
        });
    });

    // Petani Routes
    Route::middleware(['role:petani'])->prefix('petani')->name('petani.')->group(function () {
        Route::get('dashboard', [PetaniDashboardController::class, 'index'])->name('dashboard');
        // Mitra Routes
        Route::prefix('mitra')->name('mitra.')->group(function () {
            Route::get('/', [PetaniMitraController::class, 'index'])->name('index');
            Route::get('/create', [PetaniMitraController::class, 'create'])->name('create');
            Route::post('/', [PetaniMitraController::class, 'store'])->name('store');
            Route::get('/search', [PetaniMitraController::class, 'search'])->name('search');
            Route::get('/{mitra}', [PetaniMitraController::class, 'show'])->name('show');
        });

        //akun petani management
        Route::prefix('akun')->name('akun.')->group(function () {
            Route::get('/', [PetaniAkunController::class, 'index'])->name('index');
            Route::put('/', [PetaniAkunController::class, 'update'])->name('update');
        });

         //Laporan management
         Route::prefix('laporan')->name('laporan.')->group(function () {
            Route::get('/', [PetaniLaporanController::class, 'index'])->name('index');
            Route::get('/search', [PetaniLaporanController::class, 'search'])->name('search');
            Route::get('/create', [PetaniLaporanController::class, 'create'])->name('create');
            Route::post('/', [PetaniLaporanController::class, 'store'])->name('store');
            Route::get('/select-mitra', [PetaniLaporanController::class, 'selectMitra'])->name('select-mitra');
            Route::get('/search-mitra-select', [PetaniLaporanController::class, 'searchMitraSelect'])->name('search-mitra-select');
            Route::get('/search-mitra-index', [PetaniLaporanController::class, 'searchMitraIndex'])->name('search-mitra-index');
            Route::get('/{laporan}', [PetaniLaporanController::class, 'show'])->name('show');
            Route::get('/{laporan}/edit', [PetaniLaporanController::class, 'edit'])->name('edit');
            Route::put('/{laporan}', [PetaniLaporanController::class, 'update'])->name('update');
            Route::delete('/{laporan}', [PetaniLaporanController::class, 'destroy'])->name('destroy');
            Route::get('/mitra/{mitra}', [PetaniLaporanController::class, 'laporanMitra'])->name('laporan-mitra');
        });

    });

    // Pegawai Routes
    Route::middleware(['role:pegawai'])->prefix('pegawai')->name('pegawai.')->group(function () {
        // Dashboard
        Route::get('/dashboard', [PegawaiDashboardController::class, 'index'])->name('dashboard');

        // Mitra Management
        Route::prefix('mitra')->name('mitra.')->group(function () {
            Route::get('/', [PegawaiMitraController::class, 'index'])->name('index');
            Route::get('/create', [PegawaiMitraController::class, 'create'])->name('create');
            Route::post('/', [PegawaiMitraController::class, 'store'])->name('store');
            Route::get('/pengajuan', [PegawaiMitraController::class, 'pengajuan'])->name('pengajuan');
            Route::get('/{mitra}', [PegawaiMitraController::class, 'show'])->name('show');
            Route::get('/{mitra}/edit', [PegawaiMitraController::class, 'edit'])->name('edit');
            Route::put('/{mitra}', [PegawaiMitraController::class, 'update'])->name('update');
            Route::delete('/{mitra}', [PegawaiMitraController::class, 'destroy'])->name('destroy');
            Route::put('/{mitra}/approve', [PegawaiMitraController::class, 'approve'])->name('approve');
            Route::put('/{mitra}/reject', [PegawaiMitraController::class, 'reject'])->name('reject');
            Route::get('/laporan', [PegawaiMitraController::class, 'laporan'])->name('laporan');
            Route::get('/search/mitra', [PegawaiMitraController::class, 'search'])->name('search');
            // Route::put('/{mitra}/update-status', [PegawaiMitraController::class, 'updateStatus'])->name('updateStatus');
            // Route untuk edit jumlah pohon mitra
            Route::get('/{mitra}/edit-jumlah-pohon', [PegawaiMitraController::class, 'editJumlahPohon'])->name('edit-jumlah-pohon');
            Route::put('/{mitra}/update-jumlah-pohon', [PegawaiMitraController::class, 'updateJumlahPohon'])->name('update-jumlah-pohon');
        });

        //Laporan management
        Route::prefix('laporan')->name('laporan.')->group(function () {
            Route::get('/', [PegawaiLaporanController::class, 'index'])->name('index');
            Route::get('/search', [PegawaiLaporanController::class, 'search'])->name('search');
            Route::get('/create', [PegawaiLaporanController::class, 'create'])->name('create');
            Route::post('/', [PegawaiLaporanController::class, 'store'])->name('store');
            Route::get('/select-mitra', [PegawaiLaporanController::class, 'selectMitra'])->name('select-mitra');
            Route::get('/search-mitra-select', [PegawaiLaporanController::class, 'searchMitraSelect'])->name('search-mitra-select');
            Route::get('/search-mitra-index', [PegawaiLaporanController::class, 'searchMitraIndex'])->name('search-mitra-index');
            Route::get('/{laporan}', [PegawaiLaporanController::class, 'show'])->name('show');
            Route::get('/{laporan}/edit', [PegawaiLaporanController::class, 'edit'])->name('edit');
            Route::put('/{laporan}', [PegawaiLaporanController::class, 'update'])->name('update');
            Route::delete('/{laporan}', [PegawaiLaporanController::class, 'destroy'])->name('destroy');
            Route::get('/mitra/{mitra}', [PegawaiLaporanController::class, 'laporanMitra'])->name('laporan-mitra');
        });

        // Route untuk profil owner
        Route::get('/akun', [App\Http\Controllers\Pegawai\AkunController::class, 'index'])->name('akun.index');
        Route::put('/akun', [App\Http\Controllers\Pegawai\AkunController::class, 'update'])->name('akun.update');
    });

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // API wilayah untuk form mitra (petani)
    Route::get('/api/kabupaten/{provinsi_id}', function($provinsi_id) {
        return \App\Models\Kabupaten::where('provinsi_id', $provinsi_id)->get();
    });
    Route::get('/api/kecamatan/{kabupaten_id}', function($kabupaten_id) {
        return \App\Models\Kecamatan::where('kabupaten_id', $kabupaten_id)->get();
    });
    Route::get('/api/desa/{kecamatan_id}', function($kecamatan_id) {
        return \App\Models\Desa::where('kecamatan_id', $kecamatan_id)->get();
    });
});

require __DIR__ . '/auth.php';
