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
        Schema::create('tbl_apddetail', function (Blueprint $table) {
            $table->increments('idapddetail');
            $table->unsignedInteger('idapd');
            $table->unsignedInteger('idkegiatan');
            $table->integer('jmlhapd')->default(0)->nullable();

            $table->foreign('idapd')->references('idapd')->on('tbl_apd')->onDelete('cascade');
            $table->foreign('idkegiatan')->references('idkegiatan')->on('tbl_kegiatan')->onDelete('cascade');
        });

        Schema::create('tbl_perlengkapandetail', function (Blueprint $table) {
            $table->increments('idperlengkapandetail');
            $table->unsignedInteger('idperlengkapan');
            $table->unsignedInteger('idkegiatan');
            $table->integer('jmlperlengkapan')->default(0)->nullable();

            $table->foreign('idperlengkapan')->references('idperlengkapan')->on('tbl_perlengkapan')->onDelete('cascade');
            $table->foreign('idkegiatan')->references('idkegiatan')->on('tbl_kegiatan')->onDelete('cascade');
        });

        Schema::create('tbl_konsumsidetail', function (Blueprint $table) {
            $table->increments('idkonsumsidetail');
            $table->unsignedInteger('idkonsumsi');
            $table->unsignedInteger('idkegiatan');
            $table->integer('jmlkonsumsi')->default(0)->nullable();

            $table->foreign('idkonsumsi')->references('idkonsumsi')->on('tbl_konsumsi')->onDelete('cascade');
            $table->foreign('idkegiatan')->references('idkegiatan')->on('tbl_kegiatan')->onDelete('cascade');
        });

        Schema::create('tbl_pembiayaandetail', function (Blueprint $table) {
            $table->increments('idpembiayaandetail');
            $table->unsignedInteger('idpembiayaan');
            $table->unsignedInteger('idkegiatan');

            $table->foreign('idpembiayaan')->references('idpembiayaan')->on('tbl_pembiayaan')->onDelete('cascade');
            $table->foreign('idkegiatan')->references('idkegiatan')->on('tbl_kegiatan')->onDelete('cascade');
        });

        Schema::create('tbl_pembiayaandetailbb', function (Blueprint $table) {
            $table->increments('idpembiayaandetailbb');
            $table->unsignedInteger('idpembiayaan');
            $table->unsignedInteger('idbelanjabarang');

            $table->foreign('idpembiayaan')->references('idpembiayaan')->on('tbl_pembiayaan')->onDelete('cascade');
            $table->foreign('idbelanjabarang')->references('idbelanjabarang')->on('tbl_rencanabelanja')->onDelete('cascade');
        });

        Schema::create('tbl_matrix_kegiatan', function (Blueprint $table) {
            $table->increments('idmatrixkegiatan');
            $table->unsignedInteger('idkegiatan');
            $table->date('tanggal');
            $table->string('waktumulai');
            $table->string('waktuselesai')->nullable();
            $table->string('agenda');
            $table->string('pic')->nullable();
            $table->integer('jamperjp')->nullable();
            $table->string('lokasi')->nullable();

            $table->foreign('idkegiatan')->references('idkegiatan')->on('tbl_kegiatan')->onDelete('cascade');
        });

        Schema::create('tbl_penceramah', function (Blueprint $table) {
            $table->increments('idpenceramah');
            $table->unsignedInteger('idkegiatan');
            $table->string('namapenceramah');
            $table->string('keterangan')->nullable();

            $table->foreign('idkegiatan')->references('idkegiatan')->on('tbl_kegiatan')->onDelete('cascade');
        });

        Schema::create('tbl_penerjemah', function (Blueprint $table) {
            $table->increments('idpenerjemah');
            $table->unsignedInteger('idkegiatan');
            $table->string('namapenerjemah');
            $table->string('keterangan')->nullable();

            $table->foreign('idkegiatan')->references('idkegiatan')->on('tbl_kegiatan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_penerjemah');
        Schema::dropIfExists('tbl_penceramah');
        Schema::dropIfExists('tbl_matrix_kegiatan');
        Schema::dropIfExists('tbl_pembiayaandetailbb');
        Schema::dropIfExists('tbl_pembiayaandetail');
        Schema::dropIfExists('tbl_konsumsidetail');
        Schema::dropIfExists('tbl_perlengkapandetail');
        Schema::dropIfExists('tbl_apddetail');
    }
};
