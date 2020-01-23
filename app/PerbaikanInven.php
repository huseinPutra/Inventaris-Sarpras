<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerbaikanInven extends Model
{
    protected $fillable =['id_inventaris','id_pengembalian','barang_rusak','jumlah_barang'];
    protected $table ='perbaikan_inven';
}
