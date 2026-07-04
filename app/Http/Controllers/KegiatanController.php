<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKegiatanRequest;
use App\Http\Requests\UpdateStatusRequest;
use App\Models\Apd;
use App\Models\JenisProgram;
use App\Models\Kegiatan;
use App\Models\JenisNonDiklat;
use App\Models\Pembiayaan;
use App\Models\Perlengkapan;
use App\Models\ModaKegiatan;
use App\Models\Konsumsi;
use App\Services\KegiatanService;
use Barryvdh\DomPDF\Facade\Pdf;

class KegiatanController extends Controller
{
    /**
     * Tampilkan daftar rencana kegiatan dengan statistik.
     */
    public function index()
    {
        return view('page.kegiatan', [
            'kegiatan'         => Kegiatan::orderBy('idkegiatan', 'DESC')->paginate(10),
            'totalkegiatan'    => Kegiatan::count(),
            'kegiatanmenunggu' => Kegiatan::where('status', 'menunggu')->count(),
            'kegiatanditerima' => Kegiatan::where('status', 'diterima')->count(),
            'kegiatanditolak'  => Kegiatan::where('status', 'ditolak')->count(),
        ]);
    }

    /**
     * Tampilkan form tambah kegiatan baru.
     */
    public function create()
    {
        return view('page.create_activity', [
            'jenprog'      => JenisProgram::all(),
            'nondiklat'    => JenisNonDiklat::all(),
            'pembiayaan'   => Pembiayaan::all(),
            'apd'          => Apd::all(),
            'perlengkapan' => Perlengkapan::all(),
            'moda'         => ModaKegiatan::all(),
            'konsumsi'     => Konsumsi::all(),
        ]);
    }

    /**
     * Simpan kegiatan baru beserta seluruh detailnya dalam satu transaksi via Service.
     */
    public function store(StoreKegiatanRequest $request, KegiatanService $kegiatanService)
    {
        $kegiatanService->createKegiatan($request->validated());

        return redirect('/home')->with('success', 'Rencana kegiatan berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail kegiatan (view web).
     */
    public function show($idkegiatan)
    {
        $kegiatan = Kegiatan::withAllRelations()->findOrFail($idkegiatan);

        return view('page.detail_kegiatan', [
            'kegiatan'     => collect([$kegiatan]),
            'pembiayaan'   => $kegiatan->pembiayaanDetail,
            'penceramah'   => $kegiatan->penceramah,
            'pengajar'     => $kegiatan->pengajar,
            'penerjemah'   => $kegiatan->penerjemah,
            'apd'          => $kegiatan->apdDetail,
            'perlengkapan' => $kegiatan->perlengkapanDetail,
            'konsumsi'     => $kegiatan->konsumsiDetail,
        ]);
    }

    /**
     * Cetak kegiatan (view browser untuk print).
     */
    public function cetak($idkegiatan)
    {
        $kegiatan = Kegiatan::withAllRelations()->findOrFail($idkegiatan);

        return view('page.cetak_kegiatan', [
            'kegiatan'     => collect([$kegiatan]),
            'pembiayaan'   => $kegiatan->pembiayaanDetail,
            'penceramah'   => $kegiatan->penceramah,
            'pengajar'     => $kegiatan->pengajar,
            'penerjemah'   => $kegiatan->penerjemah,
            'apd'          => $kegiatan->apdDetail,
            'perlengkapan' => $kegiatan->perlengkapanDetail,
            'konsumsi'     => $kegiatan->konsumsiDetail,
        ]);
    }

    /**
     * Unduh kegiatan sebagai PDF.
     */
    public function unduhPDF($idkegiatan)
    {
        $kegiatan = Kegiatan::withAllRelations()->findOrFail($idkegiatan);

        $pdf = Pdf::loadView('page.cetak_kegiatan', [
            'kegiatan'     => collect([$kegiatan]),
            'pembiayaan'   => $kegiatan->pembiayaanDetail,
            'penceramah'   => $kegiatan->penceramah,
            'pengajar'     => $kegiatan->pengajar,
            'penerjemah'   => $kegiatan->penerjemah,
            'apd'          => $kegiatan->apdDetail,
            'perlengkapan' => $kegiatan->perlengkapanDetail,
            'konsumsi'     => $kegiatan->konsumsiDetail,
        ]);

        return $pdf->download("rencana_kegiatan_{$idkegiatan}.pdf");
    }

    /**
     * Update status kegiatan (diterima/ditolak) — hanya SuperAdmin.
     */
    public function updateStatus(UpdateStatusRequest $request, $idkegiatan)
    {
        $kegiatan = Kegiatan::findOrFail($idkegiatan);
        $kegiatan->status = $request->status;
        $kegiatan->save();

        return redirect()
            ->back()
            ->with('success', "Status rencana kegiatan berhasil diperbarui menjadi {$request->status}.");
    }
}
