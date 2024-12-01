<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrtuRegister extends Model
{
    //
    protected $guarded = '';

    public function register()
    {
        return $this->belongsTo(SiswaRegister::class, 'id_register');
    }
}
