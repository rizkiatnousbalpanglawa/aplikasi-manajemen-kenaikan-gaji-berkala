<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $guarded = ['id'];

    public function satuanKerja()
    {
        return $this->belongsTo(Satuankerja::class,'satuankerjas_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
