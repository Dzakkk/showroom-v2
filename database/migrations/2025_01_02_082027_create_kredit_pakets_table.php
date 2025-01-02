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
        Schema::create('paket', function (Blueprint $table) {
            $table->string('paket_kode')->primary();
            $table->string('paket_nama')->nullable();
            $table->double('paket_harga_cash')->nullable();
            $table->double('paket_uang_muka')->nullable();
            $table->integer('paket_jumlah_cicilan')->nullable();
            $table->double('paket_nilai_cicilan')->nullable();
            $table->double('paket_bunga')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kredit_pakets');
    }
};
