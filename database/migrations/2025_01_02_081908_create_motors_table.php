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
        Schema::create('motors', function (Blueprint $table) {
            $table->string('motor_kode')->primary();
            $table->string('motor_merk');
            $table->string('motor_tipe');
            $table->string('motor_warna');
            $table->double('motor_harga');
            $table->string('motor_gambar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motors');
    }
};
