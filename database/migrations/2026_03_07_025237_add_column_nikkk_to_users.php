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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('nik',16)->unique();
            $table->string('kk',16)->nullable();
            $table->string('is_active',16)->default(true);
            $table->string('jk',1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('nik');
            $table->dropColumn('kk');
            $table->dropColumn('is_active');
            $table->dropColumn('jk');
        });
    }
};
