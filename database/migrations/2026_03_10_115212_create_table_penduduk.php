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
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nik',16);
            $table->text('alamat')->nullable(true);
            $table->string('tempat_lahir')->nullable(true);
            $table->date('tanggal_lahir')->nullable(true);
            $table->string('agama')->nullable(true);
            $table->string('pendidikan')->nullable(true);
            $table->string('pekerjaan')->nullable(true);
            $table->string('gol_darah')->nullable(true);
            $table->string('status_perkawinan')->nullable(true);
            $table->date('tanggal_perkawinan')->nullable(true);
            $table->string('status_dalam_hubungan_keluarga')->nullable(true);
            $table->date('kewarganegaraan')->nullable(true);
            $table->unsignedBigInteger('banjar_id');
            $table->foreign('nik')->references('nik')->on('users');
            $table->foreign('banjar_id')->references('id')->on('banjars');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduks');
    }
};
