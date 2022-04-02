<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeagenanKapal extends Model
{
    use HasFactory;
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

    public function pelabuhan_datang()
    {
        return $this->belongsTo(Terminal::class, 'id_pelabuhan_datang');
    }


    public function pelabuhan_berangkat()
    {
        return $this->belongsTo(Terminal::class, 'id_pelabuhan_berangkat');
    }

    public function status_trayek_datang()
    {
        return $this->belongsTo(StatusTrayek::class, 'id_status_trayek_datang');
    }

    public function status_kapal_datang()
    {
        return $this->belongsTo(StatusKapal::class, 'id_status_kapal_datang');
    }

    public function status_trayek_berangkat()
    {
        return $this->belongsTo(StatusTrayek::class, 'id_status_trayek_berangkat');
    }

    public function status_kapal_berangkat()
    {
        return $this->belongsTo(StatusKapal::class, 'id_status_kapal_berangkat');
    }

    public function jenis_kapal_datang()
    {
        return $this->belongsTo(JenisKapal::class, 'id_jenis_kapal_datang');
    }

    public function jenis_kapal_berangkat()
    {
        return $this->belongsTo(JenisKapal::class, 'id_jenis_kapal_berangkat');
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
}