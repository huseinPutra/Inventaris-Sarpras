<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPengembalian extends Model
{
    protected $table = 'detail_pengembalian';
    protected $fillable = ['id_peminjaman','id_inventaris','barang_baik','barang_rusak'];
}
