<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiswaRegister extends Model
{
    //
    protected $guarded = '';

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function asalSekolah()
    {
        return $this->belongsTo(AsalSekolah::class, 'kode_sekolah');
    }

    public function gelombang()
    {
        return $this->belongsTo(Gelombang::class, 'gelombang');
    }

    public function ortuRegister()
    {
        return $this->hasOne(OrtuRegister::class, 'id_register');
    }

    public function peserta()
    {
        return $this->hasOne(Peserta::class, 'id_register');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'id_register');
    }
}
