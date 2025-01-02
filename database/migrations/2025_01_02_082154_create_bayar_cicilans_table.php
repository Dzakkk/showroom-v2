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
        Schema::create('cicilan', function (Blueprint $table) {
            $table->string('cicilan_kode')->primary();
            $table->string('kredit_kode');
            $table->integer('cicilan_jumlah')->nullable();
            $table->date('cicilan_tanggal')->nullable();
            $table->integer('cicilan_ke')->nullable();
            $table->integer('cicilan_sisa_ke')->nullable();
            $table->double('cicilan_sisa_harga')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bayar_cicilans');
    }
};
