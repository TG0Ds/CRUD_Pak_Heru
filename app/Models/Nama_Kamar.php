<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class nama_kamar extends Model
{
    protected $table = 'nama_kamar';
    protected $fillable = ['nomor_kamar', 'jenis_kamar_id'];
    
    public function jenisKamar()
{
    return $this->belongsTo(Jenis_Kamar::class, 'jenis_kamar_id');
}

}
