<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelra extends Model
{
    use HasFactory;
    protected $table = 'pelra';

    protected $guarded = [];

    public function bendera()
    {
        return $this->belongsTo(Bendera::class, 'id_bendera');
    }


    public function pelabuhan_datang()
    {
        return $this->belongsTo(Terminal::class, 'id_pelabuhan_datang');
    }


    public function pelabuhan_berangkat()
    {
        return $this->belongsTo(Terminal::class, 'id_pelabuhan_berangkat');
    }

    public function status_trayek()
    {
        return $this->belongsTo(StatusTrayek::class, 'id_status_trayek');
    }

    public function status_kapal()
    {
        return $this->belongsTo(StatusKapal::class, 'id_status_kapal');
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
