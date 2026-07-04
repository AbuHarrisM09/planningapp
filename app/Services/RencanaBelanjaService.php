<?php

namespace App\Services;

use App\Models\RencanaBelanja;
use App\Models\PembiayaanDetailBelanja;
use Illuminate\Support\Facades\DB;

class RencanaBelanjaService
{
    /**
     * Simpan rencana belanja baru beserta detail pembiayaan dalam satu transaksi.
     *
     * @param array $data
     * @return RencanaBelanja
     */
    public function createRencanaBelanja(array $data): RencanaBelanja
    {
        return DB::transaction(function () use ($data) {
            $belanja = RencanaBelanja::create([
                'namakegiatanbb'             => $data['namaprogram'],
                'lembagapenyelenggarabb'     => $data['namalembaga'],
                'lembagamitrabb'             => $data['namamitra'] ?? null,
                'lokasikegiatanbb'           => $data['lokasi'],
                'tglmulaibb'                 => $data['tglmulaibb'],
                'tglakhirbb'                 => $data['tglakhirbb'],
                'jmlketua'                   => $data['jmlketua'] ?? 0,
                'jmlsekretaris'              => $data['jmlsekretaris'] ?? 0,
                'jmlanggota'                 => $data['jmlanggota'] ?? 0,
                'jmlpetugaskeuangan'         => $data['jmlpetugaskeuangan'] ?? 0,
                'deskripsiprogrambb'         => $data['deskripsiprogrambb'] ?? null,
                'tujuanprogrambb'            => $data['tujuanprogrambb'] ?? null,
                'persyaratanvendorbb'        => $data['persyaratanvendorbb'] ?? null,
                'informasitahapanprogrambb'  => $data['informasitahapanprogrambb'] ?? null,
                'idjenisbarang'              => $data['idjenisbarang'],
                'idjenisbelanjainventaris'   => $data['idjenisbelanjainventaris'] ?? null,
                'idmodapengadaan'            => $data['idmodapengadaan'],
                'status'                     => 'menunggu',
            ]);

            $idbelanja = $belanja->idbelanjabarang;

            if (isset($data['idpembiayaan']) && is_array($data['idpembiayaan'])) {
                foreach ($data['idpembiayaan'] as $idpembiayaan) {
                    PembiayaanDetailBelanja::create([
                        'idpembiayaan'    => $idpembiayaan,
                        'idbelanjabarang' => $idbelanja,
                    ]);
                }
            }

            return $belanja;
        });
    }
}
