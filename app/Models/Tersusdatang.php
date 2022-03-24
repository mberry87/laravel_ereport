<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tersusdatang extends Model
{
    use HasFactory;
    protected $table = 'tersus_datang';

    protected $fillable = [
        'nama_kapal', 'gt', 'tanggal_berangkat', 'terminal_berangkat', 'kegiatan_berangkat'
    ];
}
