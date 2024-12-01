<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $primaryKey = 'no_peserta';  // Nama kolom primary key
    public $incrementing = false;  // Non-auto-increment
    protected $keyType = 'string'; // Tipe primary key string

    // Menentukan kolom yang boleh diisi massal (untuk menghindari mass assignment)
    protected $fillable = [
        'no_peserta',
        'id_register',
        'id_gelombang'
    ];

    // Relasi ke SiswaRegister (satu peserta hanya memiliki satu register)
    public function siswa_register()
    {
        return $this->belongsTo(SiswaRegister::class, 'id_register');
    }

    // Relasi ke Gelombang (satu peserta hanya memiliki satu gelombang)
    public function gelombang()
    {
        return $this->belongsTo(Gelombang::class, 'id_gelombang');
    }

    // Relasi ke Hasil (satu peserta memiliki satu hasil)
    public function hasil()
    {
        return $this->hasOne(Hasil::class, 'no_peserta');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal');
    }
}
