<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
	protected $table = 'inventaris';
    protected $fillable = ['kode_inventaris','nama_inventaris','kondisi','barang_baik','barang_rusak','jumlah','id_jenis','id_ruangan','id_petugas','keterangan'];
}
