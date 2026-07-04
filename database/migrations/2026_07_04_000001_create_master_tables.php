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
        Schema::create('tbl_jenisprogram', function (Blueprint $table) {
            $table->increments('idjenisprogram');
            $table->string('jenisprogram');
        });

        Schema::create('tbl_apd', function (Blueprint $table) {
            $table->increments('idapd');
            $table->string('namaapd');
        });

        Schema::create('tbl_modakegiatan', function (Blueprint $table) {
            $table->increments('idmodakegiatan');
            $table->string('jenismodakegiatan');
        });

        Schema::create('tbl_konsumsi', function (Blueprint $table) {
            $table->increments('idkonsumsi');
            $table->string('namakonsumsi');
        });

        Schema::create('tbl_perlengkapan', function (Blueprint $table) {
            $table->increments('idperlengkapan');
            $table->string('namaperlengkapan');
        });

        Schema::create('tbl_modapengadaan', function (Blueprint $table) {
            $table->increments('idmodapengadaan');
            $table->string('jenismodapengadaan');
        });

        Schema::create('tbl_jenisbarang', function (Blueprint $table) {
            $table->increments('idjenisbarang');
            $table->string('jenisbarang');
            $table->timestamps();
        });

        Schema::create('tbl_jenisbelanjainventaris', function (Blueprint $table) {
            $table->increments('idjenisbelanjainventaris');
            $table->string('namajenisbelanjainventaris');
            $table->timestamps();
        });

        Schema::create('tbl_pembiayaan', function (Blueprint $table) {
            $table->increments('idpembiayaan');
            $table->string('jenispembiayaan');
        });

        Schema::create('tbl_nondiklat', function (Blueprint $table) {
            $table->increments('idnondiklat');
            $table->unsignedInteger('idjenisprogram');
            $table->string('namadiklat');

            $table->foreign('idjenisprogram')->references('idjenisprogram')->on('tbl_jenisprogram')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_nondiklat');
        Schema::dropIfExists('tbl_pembiayaan');
        Schema::dropIfExists('tbl_jenisbelanjainventaris');
        Schema::dropIfExists('tbl_jenisbarang');
        Schema::dropIfExists('tbl_modapengadaan');
        Schema::dropIfExists('tbl_perlengkapan');
        Schema::dropIfExists('tbl_konsumsi');
        Schema::dropIfExists('tbl_modakegiatan');
        Schema::dropIfExists('tbl_apd');
        Schema::dropIfExists('tbl_jenisprogram');
    }
};
