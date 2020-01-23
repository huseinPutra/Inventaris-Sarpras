<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Petugas extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'nama_petugas', 'username', 'password','id_level'
    ];

    
    protected $hidden = [
        'password', 'remember_token',
    ];

   
}
