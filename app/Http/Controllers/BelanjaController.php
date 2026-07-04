<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRencanaBelanjaRequest;
use App\Http\Requests\UpdateStatusRequest;
use App\Models\JenisBarang;
use App\Models\BarangInventaris;
use App\Models\Pembiayaan;
use App\Models\ModaPengadaan;
use App\Models\RencanaBelanja;
use App\Services\RencanaBelanjaService;
use Barryvdh\DomPDF\Facade\Pdf;

class BelanjaController extends Controller
{
    /**
     * Tampilkan daftar rencana belanja dengan statistik.
     */
    public function index()
    {
        return view('page.belanja', [
            'belanja'           => RencanaBelanja::orderBy('idbelanjabarang', 'DESC')->paginate(10),
            'totalbelanja'      => RencanaBelanja::count(),
            'rencanabbmenunggu' => RencanaBelanja::where('status', 'menunggu')->count(),
            'rencanabbditerima' => RencanaBelanja::where('status', 'diterima')->count(),
            'rencanabbditolak'  => RencanaBelanja::where('status', 'ditolak')->count(),
        ]);
    }

    /**
     * Tampilkan form tambah rencana belanja baru.
     */
    public function create()
    {
        return view('page.form_belanja', [
            'jenbar'     => JenisBarang::all(),
            'inventaris' => BarangInventaris::all(),
            'pembiayaan' => Pembiayaan::all(),
            'pengadaan'  => ModaPengadaan::all(),
        ]);
    }

    /**
     * Simpan rencana belanja baru beserta detail pembiayaan dalam satu transaksi via Service.
     */
    public function store(StoreRencanaBelanjaRequest $request, RencanaBelanjaService $rencanaBelanjaService)
    {
        $rencanaBelanjaService->createRencanaBelanja($request->validated());

        return redirect('/home')->with('success', 'Rencana belanja berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail rencana belanja.
     */
    public function show($idbelanjabarang)
    {
        $belanja = RencanaBelanja::withPembiayaan()->findOrFail($idbelanjabarang);

        return view('page.detail_rencana_belanja', [
            'belanja'    => collect([$belanja]),
            'pembiayaan' => $belanja->pembiayaanDetailBB,
        ]);
    }

    /**
     * Cetak rencana belanja (view browser untuk print).
     */
    public function cetak($idbelanjabarang)
    {
        $belanja = RencanaBelanja::withPembiayaan()->findOrFail($idbelanjabarang);

        return view('page.cetak_rencana_belanja', [
            'belanja'    => collect([$belanja]),
            'pembiayaan' => $belanja->pembiayaanDetailBB,
        ]);
    }

    /**
     * Unduh rencana belanja sebagai PDF.
     */
    public function unduhPDF($idbelanjabarang)
    {
        $belanja = RencanaBelanja::withPembiayaan()->findOrFail($idbelanjabarang);

        $pdf = Pdf::loadView('page.cetak_rencana_belanja', [
            'belanja'    => collect([$belanja]),
            'pembiayaan' => $belanja->pembiayaanDetailBB,
        ]);

        return $pdf->download("rencana_belanja_{$idbelanjabarang}.pdf");
    }

    /**
     * Update status rencana belanja (diterima/ditolak) — hanya SuperAdmin.
     */
    public function updateStatus(UpdateStatusRequest $request, $idbelanjabarang)
    {
        $belanja = RencanaBelanja::findOrFail($idbelanjabarang);
        $belanja->status = $request->status;
        $belanja->save();

        return redirect()
            ->back()
            ->with('success', "Status rencana belanja berhasil diperbarui menjadi {$request->status}.");
    }
}
