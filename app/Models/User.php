<?php

namespace App\Models;

use App\Enums\LevelUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'idpegawai';
    protected $fillable = [
        'nip',
        'namapegawai',
        'email',
        'password',
        'level',
        'tgllahir',
        'idpangkat',
        'idjabatan',
        'periodeawal',
        'periodeakhir',
        'statusaktif',
        'idunit'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'level' => LevelUser::class,
    ];
}
