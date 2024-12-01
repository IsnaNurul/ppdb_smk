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
        Schema::create('asal_sekolahs', function (Blueprint $table) {
            $table->bigInteger('kode_sekolah')->unsigned()->primary();
            $table->string('nama_sekolah');
            $table->integer('npsn')->nullable();
            $table->float('index_sekolah')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asal_sekolahs');
    }
};
