<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasien'; 
    protected $fillable = ['nama','kamar_id','penyakit']; 

    public function nama_kamar()
    {
        return $this->belongsTo(Nama_Kamar::class, 'kamar_id');
    }
}
