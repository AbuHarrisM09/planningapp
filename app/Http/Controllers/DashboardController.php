<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\RencanaBelanja;

class DashboardController extends Controller
{
    public function index()
    {
        return view('page.home', [
            'kegiatan'            => Kegiatan::orderBy('idkegiatan', 'DESC')->paginate(10),
            'belanja'             => RencanaBelanja::orderBy('idbelanjabarang', 'DESC')->paginate(10),
            'totalkegiatan'       => Kegiatan::count(),
            'kegiatanmenunggu'    => Kegiatan::where('status', 'menunggu')->count(),
            'kegiatanditerima'    => Kegiatan::where('status', 'diterima')->count(),
            'kegiatanditolak'     => Kegiatan::where('status', 'ditolak')->count(),
            'totalrencanabb'      => RencanaBelanja::count(),
            'rencanabbmenunggu'   => RencanaBelanja::where('status', 'menunggu')->count(),
            'rencanabbditerima'   => RencanaBelanja::where('status', 'diterima')->count(),
            'rencanabbditolak'    => RencanaBelanja::where('status', 'ditolak')->count(),
        ]);
    }
}
