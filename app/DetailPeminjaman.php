<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPeminjaman extends Model
{
	protected $table = 'detail__peminjaman';
	
    protected $fillable = [
    	'id_inventaris','id_peminjaman','jumlah'];

}
