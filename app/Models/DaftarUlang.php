<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarUlang extends Model
{
    //
    protected $guarded = '';

    public function peserta()
    {
        return $this->belongsTo(Peserta::class, 'no_peserta', 'no_peserta');
    }
}
