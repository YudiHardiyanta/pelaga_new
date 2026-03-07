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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('admin')->default(false); //untuk halaman admin
            $table->boolean('berita')->default(false); //untuk konten berita
            $table->boolean('galery')->default(false); //untuk konten galery
            $table->boolean('ettd')->default(false); //untuk konten ettd
            $table->boolean('users')->default(false); //untuk manajemen user
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
