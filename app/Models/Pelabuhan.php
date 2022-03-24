<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelabuhan extends Model
{
    use HasFactory;

    protected $table = 'pelabuhan';

    protected $fillable = [
        'nama', 'kode', 'keterangan'
    ];

    public function tersus_datang()
    {
        return $this->hasMany(Tersus::class, 'id_pelabuhan_datang');
    }

    public function tersus_berangkat()
    {
        return $this->hasMany(Tersus::class, 'id_pelabuhan_berangkat');
    }
}
