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
        Schema::create('cash', function (Blueprint $table) {
            $table->string('cash_kode')->primary();
            $table->string('pembeli_ktp');
            $table->string('motor_kode');
            $table->double('cash_bayar');
            $table->date('cash_tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beli_cashes');
    }
};
