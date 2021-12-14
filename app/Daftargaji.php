<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Daftargaji extends Model
{
    protected $guarded = ['id'];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class,'pegawais_id');
    }

    
}
