<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelnas extends Model
{
    use HasFactory;
    protected $table = 'pelnas';

    protected $fillable = [
        'nama_kapal',
        'id_bendera',
        'isi_kotor',
        'tgl_datang',
        'id_terminal_datang',
        'id_pelabuhan_datang',
        'jumlah_bongkar_datang',
        'jenis_muatan_datang',
        'tgl_berangkat',
        'id_terminal_berangkat',
        'id_pelabuhan_berangkat',
        'jumlah_muatan_berangkat',
        'jenis_muatan_berangkat',
        'id_status_trayek_datang',
        'id_status_trayek_berangkat',
        'id_status_kapal_datang',
        'id_status_kapal_berangkat',
        'id_jenis_kapal_datang',
        'id_jenis_kapal_berangkat',
        'id_user',
    ];

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
        return $this->belongsTo(Pelabuhan::class, 'id_pelabuhan_datang');
    }

    public function pelabuhan_berangkat()
    {
        return $this->belongsTo(Pelabuhan::class, 'id_pelabuhan_berangkat');
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
        return $this->belongsTo(JenisKapal::class, 'id_jenis_kapal_berankat');
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
