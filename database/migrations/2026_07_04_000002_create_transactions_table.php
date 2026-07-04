<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_kegiatan', function (Blueprint $table) {
            $table->increments('idkegiatan');
            $table->string('namakegiatan');
            $table->string('lembagapenyelenggara');
            $table->string('lembagamitra')->nullable();
            $table->string('lokasikegiatan');
            $table->date('tglmulai');
            $table->date('tglakhir');
            $table->integer('jmlpenceramah')->default(0)->nullable();
            $table->integer('jmlpengajar')->default(0)->nullable();
            $table->integer('jmlpeserta')->default(0)->nullable();
            $table->integer('jmlpenerjemah')->default(0)->nullable();
            $table->integer('totalpanitia')->default(0)->nullable();
            $table->unsignedInteger('idjenisprogram');
            $table->unsignedInteger('idnondiklat')->nullable();
            $table->unsignedInteger('idmodakegiatan');
            $table->integer('jmlpengarah')->default(0)->nullable();
            $table->integer('jmlpenanggungjawab')->default(0)->nullable();
            $table->integer('jmlketua')->default(0)->nullable();
            $table->integer('jmlanggotapenjabakademik')->default(0)->nullable();
            $table->integer('jmlanggotapanitiakelas')->default(0)->nullable();
            $table->integer('jmladmindigital')->default(0)->nullable();
            $table->integer('jmlpetugaskeuangan')->default(0)->nullable();
            $table->integer('jmlnotulen')->default(0)->nullable();
            $table->integer('jmlmoderator')->default(0)->nullable();
            $table->integer('jmlpanitialainnya')->default(0)->nullable();
            $table->integer('jmlpanitia')->default(0)->nullable();
            $table->integer('jmljamkegiatan')->default(0)->nullable();
            $table->integer('waktuperjp')->default(0)->nullable();
            $table->integer('jmlatkpanitia')->default(0)->nullable();
            $table->integer('jmlatkkegiatan')->default(0)->nullable();
            $table->integer('jmlhapd')->default(0)->nullable();
            $table->integer('jmlperlengkapan')->default(0)->nullable();
            $table->integer('jmlkonsumsi')->default(0)->nullable();
            $table->integer('jmlsertifikat')->default(0)->nullable();
            $table->integer('jmlspanduk')->default(0)->nullable();
            $table->integer('jmlfotocopybahan')->default(0)->nullable();
            $table->integer('jmlmodul')->default(0)->nullable();
            $table->string('pengirimanmodul')->nullable();
            $table->integer('jmlkendaraan')->default(0)->nullable();
            $table->integer('jmlaula')->default(0)->nullable();
            $table->integer('jmlruangkelas')->default(0)->nullable();
            $table->integer('jmlorangfullboard')->default(0)->nullable();
            $table->integer('jmlkamarfullboard')->default(0)->nullable();
            $table->integer('jmlorangperkamar')->default(0)->nullable();
            $table->integer('jmlorangfullday')->default(0)->nullable();
            $table->text('deskripsikegiatan')->nullable();
            $table->text('tujuankegiatan')->nullable();
            $table->text('persyaratanpeserta')->nullable();
            $table->text('informasitahapankegiatan')->nullable();
            $table->unsignedInteger('idpegawai')->nullable();
            $table->unsignedInteger('idkodekegiatan')->nullable();
            $table->unsignedInteger('idkoderokro')->nullable();
            $table->string('kodesubkro')->nullable();
            $table->string('kodekomponen')->nullable();
            $table->string('kodeakun')->nullable();
            $table->unsignedInteger('idgambar')->nullable();
            $table->string('status')->default('menunggu');
            $table->timestamps();

            $table->foreign('idjenisprogram')->references('idjenisprogram')->on('tbl_jenisprogram')->onDelete('cascade');
            $table->foreign('idnondiklat')->references('idnondiklat')->on('tbl_nondiklat')->onDelete('set null');
            $table->foreign('idmodakegiatan')->references('idmodakegiatan')->on('tbl_modakegiatan')->onDelete('cascade');
        });

        Schema::create('tbl_rencanabelanja', function (Blueprint $table) {
            $table->increments('idbelanjabarang');
            $table->string('namakegiatanbb');
            $table->string('lembagapenyelenggarabb');
            $table->string('lembagamitrabb')->nullable();
            $table->string('lokasikegiatanbb');
            $table->date('tglmulaibb');
            $table->date('tglakhirbb');
            $table->integer('jmlketua')->default(0)->nullable();
            $table->integer('jmlsekretaris')->default(0)->nullable();
            $table->integer('jmlanggota')->default(0)->nullable();
            $table->integer('jmlpetugaskeuangan')->default(0)->nullable();
            $table->text('deskripsiprogrambb')->nullable();
            $table->text('tujuanprogrambb')->nullable();
            $table->text('persyaratanvendorbb')->nullable();
            $table->text('informasitahapanprogrambb')->nullable();
            $table->unsignedInteger('idjenisbarang');
            $table->unsignedInteger('idjenisbelanjainventaris')->nullable();
            $table->unsignedInteger('idmodapengadaan');
            $table->string('status')->default('menunggu');
            $table->timestamps();

            $table->foreign('idjenisbarang')->references('idjenisbarang')->on('tbl_jenisbarang')->onDelete('cascade');
            $table->foreign('idjenisbelanjainventaris')->references('idjenisbelanjainventaris')->on('tbl_jenisbelanjainventaris')->onDelete('set null');
            $table->foreign('idmodapengadaan')->references('idmodapengadaan')->on('tbl_modapengadaan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_rencanabelanja');
        Schema::dropIfExists('tbl_kegiatan');
    }
};
