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
        Schema::create('upload_log_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('upload_log_id');
            $table->integer('row_number');
            $table->text('error_message');
            $table->text('row_data');
            $table->foreign('upload_log_id')->references('id')->on('upload_logs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upload_log_details');
    }
};
