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
        Schema::create('siswa_registers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users');
            $table->string('nama');
            $table->string('jenis_kelamin')->nullable();
            $table->string('nisn')->unique();
            $table->string('nik')->unique()->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('agama')->nullable();
            $table->string('kebutuhan_khusus')->nullable();
            $table->text('alamat_siswa')->nullable();
            $table->string('tempat_tinggal')->nullable();
            $table->string('anak_ke')->nullable();
            $table->string('nohp_siswa')->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->bigInteger('kode_sekolah')->nullable()->unsigned();
            $table->foreign('kode_sekolah')->references('kode_sekolah')->on('asal_sekolahs');
            $table->string('tahun_lulus')->nullable();
            $table->string('peringkat')->nullable();
            $table->string('jurusan1')->nullable();
            $table->string('jurusan2')->nullable();
            $table->foreignId('gelombang')->nullable()->constrained('gelombangs');
            $table->string('tinggi_badan')->nullable();
            $table->string('berat_badan')->nullable();
            $table->string('jarak')->nullable();
            $table->string('ket_jarak')->nullable();
            $table->string('waktu')->nullable();
            $table->string('transportasi')->nullable();
            $table->string('jumlah_saudara')->nullable();
            $table->date('tanggal_register')->nullable();
            $table->string('hobi')->nullable();
            $table->string('minat_ekskul')->nullable();
            $table->string('foto')->nullable();
            $table->string('ijazah')->nullable();
            $table->string('no_kipksp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa_registers');
    }
};
