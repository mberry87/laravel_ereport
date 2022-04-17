<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pbm extends Model
{
    use HasFactory;
    protected $table = 'pbm';

    protected $fillable = [
        'nama_kapal',
        'id_bendera',
        'id_jenis_kapal',
        'agen',
        'ukuran_isi_kotor',
        'ukuran_dwt',
        'ukuran_loa',
        'tgl_muat',
        'muat_sistem',
        'muat_komoditi',
        'muat_jenis',
        'muat_ton',
        'muat_unit',
        'muat_m3',
        'id_terminal_muat',
        'tgl_bongkar',
        'bongkar_sistem',
        'bongkar_komoditi',
        'bongkar_jenis',
        'bongkar_ton',
        'bongkar_unit',
        'bongkar_m3',
        'id_terminal_bongkar',
        'id_user',
    ];

    public function bendera()
    {
        return $this->belongsTo(Bendera::class, 'id_bendera');
    }

    public function jenis_kapal()
    {
        return $this->belongsTo(JenisKapal::class, 'id_jenis_kapal');
    }

    public function terminal_muat()
    {
        return $this->belongsTo(Terminal::class, 'id_terminal_muat');
    }


    public function terminal_bongkar()
    {
        return $this->belongsTo(Terminal::class, 'id_terminal_bongkar');
    }


    public function getMuatAttribute()
    {
        if (!$this->tgl_muat == null) {
            $date = strtotime($this->tgl_muat);
            return date('d-M-Y', $date);
        } else {
            return "Belum muat";
        }
    }

    public function getBongkarAttribute()
    {
        if (!$this->tgl_bongkar == null) {
            $date = strtotime($this->tgl_bongkar);
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
