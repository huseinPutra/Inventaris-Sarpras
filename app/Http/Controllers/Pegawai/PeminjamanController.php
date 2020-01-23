<?php

namespace App\Http\Controllers\Pegawai;

use App\Peminjaman;
use App\DetailPeminjaman;
use App\Pegawai;
use App\Inventaris;
use App\DetailPengembalian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class PeminjamanController extends Controller
{
    public function index(){
    	$data = Peminjaman::where('id_pegawai',Auth::guard('pegawai')->user()->id)->orderBy('created_at','DESC')->get();
    	$Pegawai = Auth::guard('pegawai')->user()->nama_pegawai;
    	$Inventaris = Inventaris::get();
    	$barang = Inventaris::where('barang_baik','>','0')->get();
    	return view('Pegawai.peminjaman.index',compact('data','Pegawai','Inventaris','barang'));
    }

    public function store(Request $req){
    	$input = $req->all();

    	if ($input['jumlah'] <= 0) {
            return back()->with(['message' => 'Jumlah harus diisi lebih dari 0','type' => 'warning']);
    	}

    	$checkstock = CheckBarang($req->id_inventaris,$req->jumlah);

    	if (!$checkstock) {
            return back()->with(['message' => 'Jumlah untuk peminjaman '.NamaBarang($req->id_inventaris).'  tidak boleh lebih dari '.BarangBaik($req->id_inventaris),'type' => 'warning']);
    	}

    	$peminjaman = Peminjaman::create([
    		'status_peminjaman' => 0,
    		'id_pegawai' => Auth::guard('pegawai')->user()->id,
    	]);

    	$detail = DetailPeminjaman::create([
    		'id_peminjaman' => $peminjaman->id,
    		'id_inventaris' => $input['id_inventaris'],
    		'jumlah' => $input['jumlah'],

    	]);

    	if ($peminjaman) {
    		if ($detail) {
            	return back()->with(['message' => 'Data Peminjaman berhasil disave','type' => 'success']);
    		}else{
	            return back()->with(['message' => 'Data Detail Peminjaman gagal disave','type' => 'danger']);
    		}
        }else{
            return back()->with(['message' => 'Data Peminjaman gagal disave','type' => 'danger']);
        }
    }

    public function edit($id){
    	$data = viewPeminjaman($id);

		$barang = Inventaris::where('barang_baik','>','0')->get();

		return view('Pegawai.peminjaman.edit',compact('data','barang','id'));
    }

    public function update(Request $req,$id){
    	$input = $req->all();

    	if ($input['jumlah'] <= 0) {
            return back()->with(['message' => 'Jumlah harus diisi lebih dari 0','type' => 'warning']);
    	}

    	$peminjaman = Peminjaman::where('id',$id)->update([
    		'id_pegawai' => Auth::guard('pegawai')->user()->id
    	]);

    	$detail = DetailPeminjaman::where('id_peminjaman',$id)->update([
    		'id_inventaris' => $input['id_inventaris'],
    		'jumlah' => $input['jumlah'],
    	]);

    	if ($peminjaman) {
    		if ($detail) {
            	return redirect()->route('Pegawai.index')->with(['message' => 'Data Peminjaman berhasil diupdate','type' => 'success']);
    		}else{
	            return back()->with(['message' => 'Data Detail Peminjaman gagal diupdate','type' => 'danger']);
    		}
        }else{
            return back()->with(['message' => 'Data Peminjaman gagal diupdate','type' => 'danger']);
        }
    }

    public function view($id){
    	$data = viewPeminjaman($id);

    	return view('Pegawai.peminjaman.view',compact('data'));
    }

    public function delete($id){
        $delete['peminjaman'] = Peminjaman::where('id',$id)->delete();
        $delete['detailpinjam'] = DetailPeminjaman::where('id_peminjaman',$id)->delete();
        $delete['detailpengembalian'] = DetailPengembalian::where('id_peminjaman',$id)->delete();

        if (count($delete) > 2) {
            return back()->with(['message' => 'Data Peminjaman berhasil didelete','type' => 'success']);
        }else{
            return back()->with(['message' => 'Data Detail Peminjaman gagal didelete','type' => 'danger']);
        }
    }


}
