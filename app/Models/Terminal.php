<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terminal extends Model
{
    use HasFactory;

    protected $table = 'terminal';

    protected $fillable = [
        'nama', 'kode', 'keterangan'
    ];

    public function tersus_datang()
    {
        return $this->hasMany(Tersus::class, 'id_terminal_datang');
    }

    public function tersus_berangkat()
    {
        return $this->hasMany(Tersus::class, 'id_terminal_berangkat');
    }
}
