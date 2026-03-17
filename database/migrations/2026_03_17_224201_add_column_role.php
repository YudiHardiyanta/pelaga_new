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
        Schema::table('roles', function (Blueprint $table) {
            //
            $table->boolean('penduduk_all')->default(false);
            $table->boolean('penduduk')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('roles', function (Blueprint $table) {
            //
            $table->dropColumn('penduduk_all');
            $table->dropColumn('penduduk');
        });
    }
};
