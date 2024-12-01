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
        Schema::create('pesertas', function (Blueprint $table) {
            $table->string('no_peserta')->primary();
            $table->foreignId('id_register')->constrained('siswa_registers');
            $table->foreignId('id_gelombang')->constrained('gelombangs');
            $table->boolean('daftar_ulang')->default(false);
            $table->foreignId('id_jadwal')->references('id')->on('jadwals');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesertas');
    }
};
