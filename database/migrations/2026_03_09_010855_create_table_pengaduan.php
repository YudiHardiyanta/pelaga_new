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
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->string('pengaduan_nama');
            $table->string('pengaduan_email');
            $table->string('pengaduan_telepon');
            $table->string('pengaduan_alamat');
            $table->string('pengaduan_subjek');
            $table->text('pengaduan_uraian');
            $table->boolean('is_tindak_lanjut')->default(false);
            $table->text('tindak_lanjut')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};
