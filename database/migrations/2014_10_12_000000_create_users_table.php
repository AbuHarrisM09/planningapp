<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('idpegawai');
            $table->string('nip')->unique();
            $table->string('namapegawai');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('level');
            $table->date('tgllahir')->nullable();
            $table->unsignedInteger('idpangkat')->nullable();
            $table->unsignedInteger('idjabatan')->nullable();
            $table->date('periodeawal')->nullable();
            $table->date('periodeakhir')->nullable();
            $table->string('statusaktif')->default('aktif');
            $table->unsignedInteger('idunit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
