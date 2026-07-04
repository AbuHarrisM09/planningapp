<?php

use App\Http\Controllers\BelanjaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MasterData\ApdController;
use App\Http\Controllers\MasterData\JenisBarangController;
use App\Http\Controllers\MasterData\BarangInventarisController;
use App\Http\Controllers\MasterData\PerlengkapanController;
use App\Http\Controllers\MasterData\JenisProgramController;
use App\Http\Controllers\MasterData\ModaPengadaanController;
use App\Http\Controllers\MasterData\JenisNonDiklatController;
use App\Http\Controllers\MasterData\PembiayaanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Guest Routes
Route::middleware('guest')->group(function () {
    Route::get("/", [LogController::class, "login"])->name("login");
    Route::post("/", [LogController::class, "authenticate"]);
    Route::get("/register", function () {
        return view("register");
    });
    Route::post("/register", [LogController::class, "store"]);
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::get("/logout", [LogController::class, "logout"]);
    Route::get("/home", [DashboardController::class, "index"])->name("home");

    // Rencana Kegiatan
    Route::get("/rencana-kegiatan", [KegiatanController::class, "index"]);
    Route::get("/tambah-kegiatan", [KegiatanController::class, "create"]);
    Route::post("/tambah-kegiatan", [KegiatanController::class, "store"]);
    Route::get("/detail-rencana-kegiatan/{idkegiatan}", [KegiatanController::class, "show"]);
    Route::get("/cetak-kegiatan/{idkegiatan}", [KegiatanController::class, "cetak"]);
    Route::get("/unduh-kegiatan/{idkegiatan}", [KegiatanController::class, "unduhPDF"]);

    // Rencana Belanja
    Route::get("/rencana-belanja", [BelanjaController::class, "index"]);
    Route::get("/tambah-rencana-belanja", [BelanjaController::class, "create"]);
    Route::post("/tambah-rencana-belanja", [BelanjaController::class, "store"]);
    Route::get("/detail-rencana-belanja/{idbelanjabarang}", [BelanjaController::class, "show"]);
    Route::get("/cetak-rencana-belanja/{idbelanjabarang}", [BelanjaController::class, "cetak"]);
    Route::get("/unduh-rencana-belanja/{idbelanjabarang}", [BelanjaController::class, "unduhPDF"]);

    // Profile
    Route::get("/profil", [ProfileController::class, "index"]);

    // SuperAdmin Routes
    Route::middleware('superadmin')->group(function () {
        Route::post("/detail-rencana-kegiatan/{idkegiatan}/status", [KegiatanController::class, "updateStatus"]);
        Route::post("/detail-rencana-belanja/{idbelanjabarang}/status", [BelanjaController::class, "updateStatus"]);

        // Master Data Resources
        Route::resource("/apd", ApdController::class);
        Route::resource("/jenis-program", JenisProgramController::class);
        Route::resource("/jen-keg-non-diklat", JenisNonDiklatController::class);
        Route::resource("/jenis-pembiayaan", PembiayaanController::class);
        Route::resource("/jenis-perlengkapan", PerlengkapanController::class);
        Route::resource("/jenis-barang", JenisBarangController::class);
        Route::resource("/jenis-belanja-inventaris", BarangInventarisController::class);
        Route::resource("/jenis-pengadaan", ModaPengadaanController::class);
    });
});
