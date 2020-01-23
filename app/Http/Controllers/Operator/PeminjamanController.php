<?php

namespace App\Http\Controllers\Operator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pegawai;
use App\Inventaris;
use App\Peminjaman;
use App\DetailPeminjaman;
use auth;

class PeminjamanController extends Controller
{
    public function index()
    {
    	$Pegawai = Pegawai::get();
    	$Inventaris = Inventaris::get();
    	$Peminjaman = Peminjaman::orderBy('created_at','DESC')->get();
    	return view('Operator.Peminjaman.index',compact('Pegawai','Inventaris','Peminjaman'));
    }

    public function store(Request $request)
    {
    	$input = $request->all();

    	if ($input['jumlah'] <= 0) {
            return back()->with(['message' => 'Jumlah harus diisi lebih dari 0','type' => 'warning']);
    	}

    	$CheckBarang = CheckBarang($request->id_inventaris,$request->jumlah);

    	if (!$CheckBarang) {
            return back()->with(['message' => 'Jumlah  '.NamaBarang($request->id_inventaris).'  tidak boleh lebih dari '.BarangBaik($request->id_inventaris),'type' => 'warning']);
    	}

    	$peminjaman = Peminjaman::create([
    		'tanggal_pinjam' => date('Y-m-d H:i:s'),
    		'status_peminjaman' => 1,
            'tanggal_max_kembali' => $input['tanggal_max_kembali'],
    		'id_pegawai' => $input['id_pegawai'],
    		'id_petugas' => Auth::user()->id,
    	]);

    	$detail = DetailPeminjaman::create([
    		'id_peminjaman' => $peminjaman->id,
    		'id_inventaris' => $input['id_inventaris'],
    		'jumlah' => $input['jumlah'],

    	]);

    	$read = Inventaris::where('id',$input['id_inventaris'])->first();

    	$update = Inventaris::where('id',$input['id_inventaris'])->update([
    		'barang_baik' => $read['barang_baik'] - $input['jumlah'],
    		'jumlah' => ($read['barang_baik'] + $read['barang_rusak']) - $input['jumlah'],
    	]);

    	if ($peminjaman) {
    		if (!$update) {
	            return back()->with(['message' => 'Data Stok Inventaris gagal terupdate tapi peminjaman berhasil','type' => 'success']);
	    	}

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
        $peminjam = Pegawai::get();

        return view('Operator.Peminjaman.edit',compact('data','barang','peminjam','id'));
    }

    public function update(Request $req,$id){
        $input = $req->all();

        if ($input['jumlah'] <= 0) {
            return back()->with(['message' => 'Jumlah harus diisi lebih dari 0','type' => 'warning']);
        }

        $CheckBarang = CheckBarang($input['id_inventaris'],$input['jumlah']);

        if (!$CheckBarang) {
            return back()->with(['message' => 'Jumlah  '.NamaBarang($input['id_inventaris']).'  tidak boleh lebih dari '.BarangBaik($input['id_inventaris']),'type' => 'warning']);
        }

        if ($input['id_inventaris_before']) {
            $readrollback = Inventaris::where('id',$input['id_inventaris_before'])->first();

            $rollback = Inventaris::where('id',$input['id_inventaris_before'])->update([
                'barang_baik' => $readrollback['barang_baik'] + $input['jumlah_before'],
                'jumlah' => $readrollback['barang_baik'] + $readrollback['buruk'] + $input['jumlah_before']
            ]); 
        }

        $peminjaman = Peminjaman::where('id',$id)->update([
            'tanggal_pinjam' => date('Y-m-d H:i:s'),
            'status_peminjaman' => 1,
            'id_pegawai' => $input['id_pegawai'],
            'id_petugas' => Auth::user()->id,
        ]);

        $detail = DetailPeminjaman::where('id_peminjaman',$id)->update([
            'id_inventaris' => $input['id_inventaris'],
            'jumlah' => $input['jumlah'],

        ]);

        $read = Inventaris::where('id',$input['id_inventaris'])->first();

        $update = Inventaris::where('id',$input['id_inventaris'])->update([
            'barang_baik' => $read['barang_baik'] - $input['jumlah'],
            'jumlah' => ($read['barang_baik'] + $read['buruk']) - $input['jumlah'],
        ]);

        if ($peminjaman) {
            if (!$update) {
                return back()->with(['message' => 'Data Stok Inventaris gagal terupdate tapi peminjaman berhasil','type' => 'success']);
            }

            if ($detail) {
                return back()->with(['message' => 'Data Peminjaman berhasil diupdate','type' => 'success']);
            }else{
                return back()->with(['message' => 'Data Detail Peminjaman gagal diupdate','type' => 'danger']);
            }
        }else{
            return back()->with(['message' => 'Data Peminjaman gagal diupdate','type' => 'danger']);
        }
    }

    public function delete($id){
        $delete['peminjaman'] = Peminjaman::where('id',$id)->delete();
        $delete['detailpeminjaman'] = DetailPeminjaman::where('id_peminjaman',$id)->delete();
        $delete['detailpengembalian'] = DetailPengembalian::where('id_peminjaman',$id)->delete();

        if (count($delete) > 2) {
            return back()->with(['message' => 'Data Peminjaman berhasil didelete','type' => 'success']);
        }else{
            return back()->with(['message' => 'Data Detail Peminjaman gagal didelete','type' => 'danger']);
        }
    }

    public function view($id){
        $data = viewPeminjaman($id);

        return view('Operator.Peminjaman.view',compact('data'));
    }   

    public function approvep(Request $req, $id){
        $update = Peminjaman::where('id',$id)->update([
            'status_peminjaman' => 1,
            'tanggal_pinjam' => date('Y-m-d H:i:s'),
            'id_petugas' => Auth::user()->id,
            'tanggal_max_kembali' => $req->tanggal_max_kembali
        ]);

        $datadetail = DetailPeminjaman::where('id_peminjaman',$id)->first(); 

        $read = Inventaris::where('id',$datadetail['id_inventaris'])->first();
        $barang = Inventaris::where('id',$datadetail['id_inventaris'])->update([
            'barang_baik' => $read['barang_baik'] - $datadetail['jumlah'],
            'jumlah' => $read['barang_baik'] + $read['buruk']  - $datadetail['jumlah'],
        ]);

        if ($barang) {
            return redirect()->route('Operator.Peminjaman.index')->with(['message' => 'Data Peminjaman berhasil diapprove','type' => 'success']);
        }else{
            return back()->with(['message' => 'Data Peminjaman gagal diapprove','type' => 'danger']);
        }
    }

    public function denied($id){
        $update = Peminjaman::where('id',$id)->update([
            'status_peminjaman' => 2,
            'id_petugas' => Auth::user()->id
        ]);

        if ($update) {
            return back()->with(['message' => 'Data Peminjaman berhasil ditolak','type' => 'success']);
        }else{
            return back()->with(['message' => 'Data Peminjaman gagal ditolak','type' => 'danger']);
        }
    }

    public function tanggalmaxkembali($id){    
        return view('Operator.Peminjaman.tanggal_max_kembali',compact('id'));
    }
}
