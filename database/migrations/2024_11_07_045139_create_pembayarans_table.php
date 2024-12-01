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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peserta');
            $table->string('jenis_pembayaran')->nullable();
            $table->string('via')->nullable();
            $table->datetime('tanggal')->nullable();
            $table->string('bukti')->nullable();
            $table->boolean('status')->default(0);
            $table->foreignId('id_register')->constrained('siswa_registers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
