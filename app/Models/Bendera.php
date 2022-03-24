<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bendera extends Model
{
    use HasFactory;

    protected $table = 'bendera';

    protected $fillable = [
        'nama', 'keterangan'
    ];

    public function tersus()
    {
        return $this->hasMany(Bendera::class, 'id_bendera');
    }
}
