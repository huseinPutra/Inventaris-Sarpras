<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ruangan;
use App\Pegawai;
use App\Jenis;
use App\Inventaris;
use Auth;

class InventarisController extends Controller
{
    public function index(){
    	$Ruangan = Ruangan::get();
    	$Jenis = jenis::get();
    	$Inventaris = Inventaris::get();
        $barang = Inventaris::where('barang_rusak','>','0')->get();

    	return view('Admin.Inventaris.index',compact('Ruangan','Jenis','Inventaris','barang'));
    }

    public function store(Request $request){

    	if($request->barang_baik == 0 && $request->barang_rusak == 0 ){
    		return back()->with(['message'=>'Isi Jumlah Barang Terlebih Dahulu','type'=>'warning']);
    	}

    	$Inventaris = $request->all();
    	$Inventaris['jumlah'] = $request->barang_baik + $request->barang_rusak;
    	$Inventaris['kode_inventaris'] = AutoCode('KDI');
    	$Inventaris['id_petugas'] = Auth::user()->id;
        $Inventaris['kondisi'] = 0;
        $Inventaris['barang_rusak'] = 0;

    	$create = Inventaris::create($Inventaris);

    	if ($create) {
    		return redirect()->route('Admin.Inventaris.index')->with(['message'=>'Berhasil Meng-input Data Inventaris','type'=>'success']);
    	}else{
    		return back()->with(['message'=>'Gagal Meng-input Inventaris','type'=>'danger']);
    	}
    }

    public function edit($id){
    	$edit = Inventaris::where('id',$id)->first();
    	$Jenis = Jenis::get();
    	$Ruangan = Ruangan::get();

    	return view('Admin.Inventaris.edit',compact('edit','Jenis','Ruangan'));
    }

    public function update(Request $request,$id){
    	$Inventaris = $request->all();
    	$Inventaris['jumlah'] = $request->barang_baik + $request->barang_rusak;
    	$Inventaris['id_petugas'] = Auth::user()->id;

    	unset($Inventaris['_method']);
    	unset($Inventaris['_token']);

    	$update = Inventaris::where('id',$id)->update($Inventaris);

    	if ($update) {
    		return redirect()->route('Admin.Inventaris.index')->with(['message','Berhasil Meng-Update Data Inventaris','type'=>'success']);
    	}else{
    		return back()->with(['message'=>'Gagal Meng-Update Data Inventaris','type'=>'danger']);
    	}
    }

    public function delete($id){
    	$delete = Inventaris::where('id',$id)->delete();

    	if ($delete) {
    		return redirect()->route('Admin.Inventaris.index')->with(['message'=>'Berhasil Meng-Hapus Data Inventaris','type'=>'success']);
    	}else{
    		return back()->with(['message'=>'Gagal Meng-Hapus Inventaris','type'=>'danger']);
    	}
    }
}
