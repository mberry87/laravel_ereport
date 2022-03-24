<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userdata extends Model
{
    use HasFactory;

    protected $table = 'user_data';

    protected $fillable = [
        'nama', 'email', 'password'
    ];
}
