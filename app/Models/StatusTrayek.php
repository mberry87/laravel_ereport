<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusTrayek extends Model
{
    use HasFactory;

    protected $table = 'status_trayek';

    protected $fillable = [
        'nama', 'keterangan'
    ];
}
