<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusKapal extends Model
{
    use HasFactory;

    protected $table = 'status_kapal';

    protected $fillable = [
        'nama', 'kode', 'keterangan'
    ];
}
