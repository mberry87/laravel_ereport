<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeagenanKapal extends Model
{
    use HasFactory;
    protected $table = 'keagenan_kapal';

    protected $guarded = [];

    public function bendera()
    {
        return $this->belongsTo(Bendera::class, 'id_bendera');
    }

    public function terminal_datang()
    {
        return $this->belongsTo(Terminal::class, 'id_terminal_datang');
    }


    public function terminal_berangkat()
    {
        return $this->belongsTo(Terminal::class, 'id_terminal_berangkat');
    }

    public function status_trayek()
    {
        return $this->belongsTo(StatusTrayek::class, 'id_status_trayek');
    }

    public function status_kapal()
    {
        return $this->belongsTo(StatusKapal::class, 'id_status_kapal');
    }

    public function jenis_kapal()
    {
        return $this->belongsTo(JenisKapal::class, 'id_jenis_kapal');
    }

    public function getDatangAttribute()
    {
        if (!$this->tgl_datang == null) {
            $date = strtotime($this->tgl_datang);
            return date('d-M-Y', $date);
        } else {
            return "Belum datang";
        }
    }

    public function getBerangkatAttribute()
    {
        if (!$this->tgl_berangkat == null) {
            $date = strtotime($this->tgl_berangkat);
            return date('d-M-Y', $date);
        } else {
            return "Belum berangkat";
        }
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
