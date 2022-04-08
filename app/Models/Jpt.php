<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jpt extends Model
{
    use HasFactory;
    protected $table = 'jpt';

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

    public function getMuatAttribute()
    {
        if (!$this->tgl_selesai_muat == null) {
            $date = strtotime($this->tgl_selesai_muat);
            return date('d-M-Y', $date);
        } else {
            return "Belum Muat";
        }
    }

    public function getBongkarAttribute()
    {
        if (!$this->tgl_selesai_bongkar == null) {
            $date = strtotime($this->tgl_selesai_bongkar);
            return date('d-M-Y', $date);
        } else {
            return "Belum bongkar";
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
