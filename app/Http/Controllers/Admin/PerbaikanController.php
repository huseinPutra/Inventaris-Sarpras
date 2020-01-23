<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Inventaris;
use App\PerbaikanInven;

class PerbaikanController extends Controller
{
    public function index()
    {
    	$barang = Inventaris::Where('barang_rusak','>','0')->get();

    	return view('Admin.Inventaris.Perbaikan.index',compact('barang'));
    }

    public function edit($id)
    {
    	$edit = Inventaris::Where('id',$id)->first();
    	return view('Admin.Inventaris.Perbaikan.edit',compact('edit'));
    }

    public function update(Request $req,$id){
        $input = $req->all();

        $CheckBarang = BarangRusak($input['id_inventaris'],$input['barang_rusak']);

    	if (!$CheckBarang) {
           return back()->with(['message' => 'Jumlah  '.NamaBarang($req->id_inventaris).'  tidak boleh lebih dari '.BarangBaik($req->id_inventaris),'type' => 'warning']);
    	}

    	$inven = Inventaris::Where('id',$req->id_inventaris)->first();


       $data = $inven['barang_baik'] + $input['barang_rusak'];
       $jumlah = $inven['jumlah'] + $data;
       $update = Inventaris::Where('id',$req->id_inventaris)->update([
       				'barang_rusak' => $input['barang_rusak_before'] - $input['barang_rusak'],
       				'Barang_baik'=> $inven['barang_baik'] + $input['barang_rusak']
       			]);
       $update = PerbaikanInven::create([
       			'id_inventaris' => $req->id_inventaris,
       			'barang_rusak' => $input['barang_rusak_before'] - $input['barang_rusak']
       		]);

       if ($update) {
       		 return redirect()->route('Admin.Inventaris.Perbaikan.index')->with(['message' => 'Data Stok Barang Rusak Berhasil DiUpdate semua','type' => 'success']);
       }else{
       	 	return back()->with(['message' => 'Data Stok Barang Rusak Gagal DiUpdate semua','type' => 'danger']);
       }

    }
}
