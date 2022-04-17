<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jpt extends Model
{
    use HasFactory;
    protected $table = 'jpt';

    protected $fillable = [
        'nama_kapal',
        'id_bendera',
        'id_jenis_kapal',
        'agen',
        'ukuran_isi_kotor',
        'ukuran_dwt',
        'ukuran_loa',
        'muat_sistem',
        'muat_komoditi',
        'muat_jenis',
        'muat_ton',
        'muat_unit',
        'muat_m3',
        'id_terminal_muat',
        'bongkar_sistem',
        'bongkar_komoditi',
        'bongkar_jenis',
        'bongkar_ton',
        'bongkar_unit',
        'bongkar_m3',
        'id_terminal_bongkar',
        'id_user',
        'tgl_mulai_muat',
        'tgl_selesai_muat',
        'tgl_mulai_bongkar',
        'tgl_selesai_bongkar',
        'perusahaan_muat_pengirim',
        'perusahaan_muat_penerima',
        'perusahaan_bongkar_pengirim',
        'perusahaan_bongkar_penerima',
    ];

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
