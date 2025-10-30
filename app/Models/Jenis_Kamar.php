<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_Kamar extends Model
{
    protected $table = 'jenis_kamar';
    protected $fillable = ['nama_jenis', 'harga_per_malam'];
}
