<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'email',
        'password',
        'last_login_time',
        'last_login_ip',
        'role',
        'avatar',
        'no_hp',
        'alamat',
        'status',
        'nama_perusahaan'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tersus()
    {
        return $this->hasMany(Tersus::class, 'id_user');
    }

    public function bup()
    {
        return $this->hasMany(Bup::class, 'id_user');
    }

    public function pelnas()
    {
        return $this->hasMany(Pelnas::class, 'id_user');
    }

    public function keagenan_kapal()
    {
        return $this->hasMany(KeagenanKapal::class, 'id_user');
    }

    public function pbm()
    {
        return $this->hasMany(Pbm::class, 'id_user');
    }

    public function jpt()
    {
        return $this->hasMany(Jpt::class, 'id_user');
    }

    public function pelra()
    {
        return $this->hasMany(Pelra::class, 'id_user');
    }
}
