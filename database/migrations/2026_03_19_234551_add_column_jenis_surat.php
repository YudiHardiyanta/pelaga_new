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
        //
        Schema::table('jenis_surats', function (Blueprint $table) {
            //
            $table->boolean('kelian_ttd')->default(false);
            $table->boolean('kepala_desa_ttd')->default(true);
            $table->text('template_surat')->nullable();
            $table->text('parameter_penduduk')->nullable();
            $table->text('parameter_lain')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('jenis_surats', function (Blueprint $table) {
            //
            $table->dropColumn('kelian_ttd');
            $table->dropColumn('kepala_desa_ttd');
            $table->dropColumn('template_surat');
            $table->dropColumn('parameter_penduduk');
            $table->dropColumn('parameter_lain');
        });
    }
};
