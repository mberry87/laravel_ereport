<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pbm extends Model
{
    use HasFactory;
    protected $table = 'pbm';

    protected $guarded = [];

    public function bendera()
    {
        return $this->belongsTo(Bendera::class, 'id_bendera');
    }

    public function terminal_muat()
    {
        return $this->belongsTo(Terminal::class, 'id_terminal_muat');
    }


    public function terminal_bongkar()
    {
        return $this->belongsTo(Terminal::class, 'id_terminal_bongkar');
    }

    public function jenis_kapal()
    {
        return $this->belongsTo(JenisKapal::class, 'id_jenis_kapal');
    }
}
