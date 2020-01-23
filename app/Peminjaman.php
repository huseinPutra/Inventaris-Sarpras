<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $fillable = ['id_pegawai','tanggal_pinjam','tanggal_kembali','tanggal_max_kembali','id_petugas','status_peminjaman'];
    protected $table ='peminjaman';
}
