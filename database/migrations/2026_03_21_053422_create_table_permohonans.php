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
        Schema::create('permohonans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemohon');
            $table->string('nik_pemohon');
            $table->string('telepon_pemohon');
            $table->string('alamat_pemohon');
            $table->unsignedBigInteger('surat_id');
            $table->json('data_pemohon')->nullable();
            $table->json('dokumen_pemohon')->nullable();
            $table->text('uraian_pemohon');
            $table->foreign('surat_id')->references('id')->on('jenis_surats');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permohonans');
    }
};
