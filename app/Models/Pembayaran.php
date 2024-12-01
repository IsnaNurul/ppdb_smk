<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    //
    protected $guarded = '';

    public function siswa_register()
    {
        return $this->belongsTo(SiswaRegister::class, 'id_register');
    }
}
