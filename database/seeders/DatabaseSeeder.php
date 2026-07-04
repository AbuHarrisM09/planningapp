<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Enums\LevelUser;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Jenis Program
        DB::table('tbl_jenisprogram')->insert([
            ['idjenisprogram' => 1, 'jenisprogram' => 'Program Akademik'],
            ['idjenisprogram' => 2, 'jenisprogram' => 'Program Non-Akademik'],
        ]);

        // 2. APD
        DB::table('tbl_apd')->insert([
            ['idapd' => 1, 'namaapd' => 'Masker Medis'],
            ['idapd' => 2, 'namaapd' => 'Hand Sanitizer'],
            ['idapd' => 3, 'namaapd' => 'Face Shield'],
        ]);

        // 3. Moda Kegiatan
        DB::table('tbl_modakegiatan')->insert([
            ['idmodakegiatan' => 1, 'jenismodakegiatan' => 'Tatap Muka (Luring)'],
            ['idmodakegiatan' => 2, 'jenismodakegiatan' => 'Daring (Online)'],
            ['idmodakegiatan' => 3, 'jenismodakegiatan' => 'Hybrid'],
        ]);

        // 4. Konsumsi
        DB::table('tbl_konsumsi')->insert([
            ['idkonsumsi' => 1, 'namakonsumsi' => 'Nasi Box'],
            ['idkonsumsi' => 2, 'namakonsumsi' => 'Snack Box'],
            ['idkonsumsi' => 3, 'namakonsumsi' => 'Prasmanan / Buffet'],
        ]);

        // 5. Perlengkapan
        DB::table('tbl_perlengkapan')->insert([
            ['idperlengkapan' => 1, 'namaperlengkapan' => 'ATK Peserta'],
            ['idperlengkapan' => 2, 'namaperlengkapan' => 'Spanduk / Backdrop'],
            ['idperlengkapan' => 3, 'namaperlengkapan' => 'Sertifikat Peserta'],
        ]);

        // 6. Moda Pengadaan
        DB::table('tbl_modapengadaan')->insert([
            ['idmodapengadaan' => 1, 'jenismodapengadaan' => 'Pembelian Langsung'],
            ['idmodapengadaan' => 2, 'jenismodapengadaan' => 'Penunjukan Langsung'],
            ['idmodapengadaan' => 3, 'jenismodapengadaan' => 'E-Purchasing'],
        ]);

        // 7. Jenis Barang
        DB::table('tbl_jenisbarang')->insert([
            ['idjenisbarang' => 1, 'jenisbarang' => 'Barang Habis Pakai', 'created_at' => now(), 'updated_at' => now()],
            ['idjenisbarang' => 2, 'jenisbarang' => 'Barang Inventaris / Aset', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // 8. Barang Inventaris
        DB::table('tbl_jenisbelanjainventaris')->insert([
            ['idjenisbelanjainventaris' => 1, 'namajenisbelanjainventaris' => 'Laptop / Komputer', 'created_at' => now(), 'updated_at' => now()],
            ['idjenisbelanjainventaris' => 2, 'namajenisbelanjainventaris' => 'Proyektor LCD', 'created_at' => now(), 'updated_at' => now()],
            ['idjenisbelanjainventaris' => 3, 'namajenisbelanjainventaris' => 'Printer / Scanner', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // 9. Pembiayaan
        DB::table('tbl_pembiayaan')->insert([
            ['idpembiayaan' => 1, 'jenispembiayaan' => 'RM (Rupiah Murni)'],
            ['idpembiayaan' => 2, 'jenispembiayaan' => 'PNBP'],
            ['idpembiayaan' => 3, 'jenispembiayaan' => 'PHLN (Hibah Luar Negeri)'],
        ]);

        // 10. Jenis Non Diklat
        DB::table('tbl_nondiklat')->insert([
            ['idnondiklat' => 1, 'idjenisprogram' => 2, 'namadiklat' => 'Rapat Koordinasi'],
            ['idnondiklat' => 2, 'idjenisprogram' => 2, 'namadiklat' => 'Fokus Group Diskusi (FGD)'],
        ]);

        // 11. User Default (SuperAdmin)
        DB::table('users')->insert([
            'nip'          => '199001012020011001',
            'namapegawai'  => 'Super Admin',
            'email'        => 'admin@example.com',
            'password'     => Hash::make('password'),
            'level'        => LevelUser::SuperAdmin->value,
            'statusaktif'  => 'aktif',
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);
    }
}
