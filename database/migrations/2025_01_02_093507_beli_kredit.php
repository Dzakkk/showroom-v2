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
        Schema::create('kredit', function (Blueprint $table) {
            $table->string('kredit_kode')->primary();
            $table->string('motor_kode');
            $table->string('pembeli_ktp');
            $table->string('paket_kode');
            $table->date('kredit_tanggal');
            $table->string('photo_ktp')->nullable();
            $table->string('photo_kk')->nullable();
            $table->string('photo_slip_gaji')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kredits');

    }
};
