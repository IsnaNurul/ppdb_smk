<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gelombang extends Model
{
    //
    protected $guarded = '';

    public function registers()
    {
        return $this->hasMany(SiswaRegister::class);
    }

    public function peserta()
    {
        return $this->hasMany(Peserta::class);
    }

    public function tahun_ajaran() {
        return $this->belongsTo(TahunAjaran::class, 'id_tahun_ajaran', 'id');
    }
}
