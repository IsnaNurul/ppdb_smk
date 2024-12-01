<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    //
    protected $guarded = '';
    public function jurusan()
    {
        return $this->hasMany(Jurusan::class, 'id_tahun_ajaran');
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id_tahun_ajaran');
    }

}
