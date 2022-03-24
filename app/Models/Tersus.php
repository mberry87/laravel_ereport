<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tersus extends Model
{
    use HasFactory;
    protected $table = 'tersus';

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
}
