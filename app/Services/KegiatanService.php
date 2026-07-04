<?php

namespace App\Services;

use App\Models\Kegiatan;
use App\Models\MatrixKegiatan;
use App\Models\PembiayaanDetail;
use App\Models\Penceramah;
use App\Models\Pengajar;
use App\Models\Penerjemah;
use App\Models\ApdDetail;
use App\Models\PerlengkapanDetail;
use App\Models\KonsumsiDetail;
use Illuminate\Support\Facades\DB;

class KegiatanService
{
    /**
     * Simpan kegiatan baru beserta seluruh detailnya dalam satu transaksi.
     *
     * @param array $data
     * @return Kegiatan
     */
    public function createKegiatan(array $data): Kegiatan
    {
        return DB::transaction(function () use ($data) {
            // Buat kegiatan utama
            $kegiatan = Kegiatan::create([
                'namakegiatan'             => $data['namakegiatan'],
                'lembagapenyelenggara'     => $data['lembagapenyelenggara'],
                'lembagamitra'             => $data['lembagamitra'] ?? null,
                'lokasikegiatan'           => $data['lokasikegiatan'],
                'tglmulai'                 => $data['tglmulai'],
                'tglakhir'                 => $data['tglakhir'],
                'jmlpenceramah'            => $data['jmlpenceramah'] ?? 0,
                'jmlpengajar'              => $data['jmlpengajar'] ?? 0,
                'jmlpeserta'               => $data['jmlpeserta'] ?? 0,
                'jmlpenerjemah'            => $data['jmlpenerjemah'] ?? 0,
                'totalpanitia'             => $data['totalpanitia'] ?? 0,
                'idjenisprogram'           => $data['idjenisprogram'],
                'idnondiklat'              => $data['idnondiklat'] ?? null,
                'idmodakegiatan'           => $data['idmodakegiatan'],
                'jmlpengarah'              => $data['jmlpengarah'] ?? 0,
                'jmlpenanggungjawab'       => $data['jmlpenanggungjawab'] ?? 0,
                'jmlketua'                 => $data['jmlketua'] ?? 0,
                'jmlanggotapenjabakademik' => $data['jmlanggotapenjabakademik'] ?? 0,
                'jmlanggotapanitiakelas'   => $data['jmlanggotapanitiakelas'] ?? 0,
                'jmladmindigital'          => $data['jmladmindigital'] ?? 0,
                'jmlpetugaskeuangan'       => $data['jmlpetugaskeuangan'] ?? 0,
                'jmlnotulen'               => $data['jmlnotulen'] ?? 0,
                'jmlmoderator'             => $data['jmlmoderator'] ?? 0,
                'jmlpanitialainnya'        => $data['jmlpanitialainnya'] ?? 0,
                'jmlpanitia'               => $data['jmlpanitia'] ?? 0,
                'jmljamkegiatan'           => $data['jmljamkegiatan'] ?? 0,
                'waktuperjp'               => $data['waktuperjp'] ?? 0,
                'jmlatkpanitia'            => $data['jmlatkpanitia'] ?? 0,
                'jmlatkkegiatan'           => $data['jmlatkkegiatan'] ?? 0,
                'jmlhapd'                  => $data['jmlhapd'] ?? 0,
                'jmlperlengkapan'          => $data['jmlperlengkapan'] ?? 0,
                'jmlkonsumsi'              => $data['jmlkonsumsi'] ?? 0,
                'jmlsertifikat'            => $data['jmlsertifikat'] ?? 0,
                'jmlspanduk'               => $data['jmlspanduk'] ?? 0,
                'jmlfotocopybahan'         => $data['jmlfotocopybahan'] ?? 0,
                'jmlmodul'                 => $data['jmlmodul'] ?? 0,
                'pengirimanmodul'          => $data['pengirimanmodul'] ?? null,
                'jmlkendaraan'             => $data['jmlkendaraan'] ?? 0,
                'jmlaula'                  => $data['jmlaula'] ?? 0,
                'jmlruangkelas'            => $data['jmlruangkelas'] ?? 0,
                'jmlorangfullboard'        => $data['jmlorangfullboard'] ?? 0,
                'jmlkamarfullboard'        => $data['jmlkamarfullboard'] ?? 0,
                'jmlorangperkamar'         => $data['jmlorangperkamar'] ?? 0,
                'jmlorangfullday'          => $data['jmlorangfullday'] ?? 0,
                'deskripsikegiatan'        => $data['deskripsikegiatan'] ?? null,
                'tujuankegiatan'           => $data['tujuankegiatan'] ?? null,
                'persyaratanpeserta'       => $data['persyaratanpeserta'] ?? null,
                'informasitahapankegiatan' => $data['informasitahapankegiatan'] ?? null,
                'status'                   => 'menunggu',
            ]);

            $idkegiatan = $kegiatan->idkegiatan;

            // Simpan matrix kegiatan
            if (isset($data['tanggal']) && is_array($data['tanggal'])) {
                foreach ($data['tanggal'] as $d => $tanggalVal) {
                    for ($s = 0; $s < 4; $s++) {
                        $index = $d * 4 + $s;
                        $startVal = $data['waktumulai'][$index] ?? '';
                        $agendaVal = $data['agenda'][$index] ?? '';

                        if (!empty($startVal) || !empty($agendaVal)) {
                            MatrixKegiatan::create([
                                'idkegiatan'   => $idkegiatan,
                                'tanggal'      => $tanggalVal,
                                'waktumulai'   => $startVal,
                                'waktuselesai' => $data['waktuselesai'][$index] ?? null,
                                'agenda'       => $agendaVal,
                                'pic'          => $data['pic'][$index] ?? null,
                                'jamperjp'     => $data['jamperjp'][$index] ?? null,
                                'lokasi'       => $data['lokasi'][$index] ?? null,
                            ]);
                        }
                    }
                }
            }

            // Simpan pembiayaan detail
            if (isset($data['idpembiayaan']) && is_array($data['idpembiayaan'])) {
                foreach ($data['idpembiayaan'] as $idpembiayaan) {
                    PembiayaanDetail::create([
                        'idpembiayaan' => $idpembiayaan,
                        'idkegiatan'   => $idkegiatan,
                    ]);
                }
            }

            // Simpan penceramah
            if (isset($data['namapenceramah']) && is_array($data['namapenceramah'])) {
                foreach ($data['namapenceramah'] as $namapenceramah) {
                    Penceramah::create([
                        'namapenceramah' => $namapenceramah,
                        'idkegiatan'     => $idkegiatan,
                    ]);
                }
            }

            // Simpan pengajar
            if (isset($data['namapengajar']) && is_array($data['namapengajar'])) {
                foreach ($data['namapengajar'] as $namapengajar) {
                    Pengajar::create([
                        'namapengajar' => $namapengajar,
                        'idkegiatan'   => $idkegiatan,
                    ]);
                }
            }

            // Simpan penerjemah
            if (isset($data['namapenerjemah']) && is_array($data['namapenerjemah'])) {
                foreach ($data['namapenerjemah'] as $namapenerjemah) {
                    if (!empty($namapenerjemah)) {
                        Penerjemah::create([
                            'namapenerjemah' => $namapenerjemah,
                            'idkegiatan'     => $idkegiatan,
                        ]);
                    }
                }
            }

            // Simpan APD detail
            if (isset($data['idapd']) && is_array($data['idapd'])) {
                foreach ($data['idapd'] as $idapd) {
                    ApdDetail::create([
                        'idapd'      => $idapd,
                        'idkegiatan' => $idkegiatan,
                    ]);
                }
            }

            // Simpan perlengkapan detail
            if (isset($data['idperlengkapan']) && is_array($data['idperlengkapan'])) {
                foreach ($data['idperlengkapan'] as $idperlengkapan) {
                    PerlengkapanDetail::create([
                        'idperlengkapan' => $idperlengkapan,
                        'idkegiatan'     => $idkegiatan,
                    ]);
                }
            }

            // Simpan konsumsi detail
            if (isset($data['idkonsumsi']) && is_array($data['idkonsumsi'])) {
                foreach ($data['idkonsumsi'] as $idkonsumsi) {
                    KonsumsiDetail::create([
                        'idkonsumsi' => $idkonsumsi,
                        'idkegiatan' => $idkegiatan,
                    ]);
                }
            }

            return $kegiatan;
        });
    }
}
