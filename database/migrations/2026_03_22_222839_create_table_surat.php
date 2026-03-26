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
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('permohonan_id')->nullable();
            $table->unsignedBigInteger('jenis_surat_id');
            $table->string('file');
            $table->string('nik_ttd_lv1')->nullable();
            $table->string('nik_ttd_lv2')->nullable();
            $table->string('nama_ttd_lv1')->nullable();
            $table->string('nama_ttd_lv2')->nullable();
            $table->string('jabatan_ttd_lv1')->nullable();
            $table->string('jabatan_ttd_lv2')->nullable();
            $table->dateTime('tanggal_ttd')->nullable();
            $table->integer('nomor_surat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
