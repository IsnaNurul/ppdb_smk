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
        Schema::create('gelombangs', function (Blueprint $table) {
            $table->id();
            $table->string('gelombang')->nullable();
            $table->date('tgl_awal_pendaftaran');
            $table->date('tgl_akhir_pendaftaran');
            $table->date('tgl_pemetaan_jurusan');
            $table->date('tgl_pengumuman_hasil');
            $table->date('tgl_awal_daftarulang');
            $table->date('tgl_akhir_daftarulang');
            $table->foreignId('id_tahun_ajaran')->constrained('tahun_ajarans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gelombangs');
    }
};
