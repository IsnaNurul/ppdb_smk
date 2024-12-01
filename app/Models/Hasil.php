<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    //
    protected $guarded = '';

    public function peserta()
    {
        return $this->belongsTo(Peserta::class, 'no_peserta');
    }
}
