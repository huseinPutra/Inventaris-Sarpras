<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pegawai extends Authenticatable
{
    use Notifiable;

     protected $table = 'pegawai';

    protected $fillable = ['id','nama_pegawai', 'nip','alamat','username','password'
    ];
}
