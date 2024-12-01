<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsalSekolah extends Model
{
    //
    protected $primaryKey = 'kode_sekolah';
    protected $guarded = '';

    public function registers()
    {
        return $this->hasMany(SiswaRegister::class, 'kode_sekolah');
    }
}
