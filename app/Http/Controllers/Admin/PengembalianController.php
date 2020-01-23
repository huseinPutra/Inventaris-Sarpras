<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DetailPengembalian;
use App\Peminjaman;
use App\Inventaris;
use Session;

class PengembalianController extends Controller
{
    public function index(){
    	$data = Peminjaman::orderBy('created_at','DESC')->get();
    	return view('Admin.Pengembalian.index',compact('data'));
    }
    
     public function view($id){
    	$data = viewPeminjaman($id);

    	$pengembalian = DetailPengembalian::where('id_peminjaman',$id)->get();

    	return view('Admin.Pengembalian.view',compact('data','id','pengembalian'));
    }

    public function kembali($id){
    	$data = viewPeminjaman($id);
    	Session::put('cannotbaik',null);

    	$check = DetailPengembalian::where('id_peminjaman',$id)->get();

    	if ($check) {
    		$sudahdikembalikan = 0;
    		foreach($check as $key => $val){
    			$sudahdikembalikan += $val['barang_baik'] + $val['barang_rusak'];
    		}
    	}else{
    		$sudahdikembalikan = 0;
    	}
    	
    	return view('Admin.Pengembalian.masukan_barang_baik',compact('id','data','sudahdikembalikan'));
    }

    public function prosesbarangbaik(Request $req,$id){

    	Session::put('cannotbaik','You cant go back dude');
        if($req->barang_baik > $req->jumlahtotal){
            return back()->with(['message' => 'Jumlah  Barang yang Anda Pinjam Hanya '.$req->jumlahtotal.'  ','type' => 'warning']);
        }
    	
    	if ($req->barang_baik == $req->jumlahtotal) {

            $read = Inventaris::where('id',$req->id_inventaris)->first();

            $update = Inventaris::where('id',$req->id_inventaris)->update([
                'barang_baik' => $read['barang_baik'] + $req->barang_baik,
                'jumlah' => $read['barang_baik'] + $read['barang_rusak'] + $req->barang_baik
            ]);

            $create = DetailPengembalian::create([
                'id_peminjaman' => $id,
                'id_inventaris' => $req->id_inventaris,
                'barang_baik' => $req->barang_baik,
                'barang_rusak' => 0
            ]);

            $cekdate = Peminjaman::where('id',$id)->first();
            if ($cekdate->tanggal_max_kembali < date('Y-m-d H:i:s')) {
                $kembali = Peminjaman::where('id',$id)->update([
                    'status_peminjaman' => 5,
                    'tanggal_kembali' => date('Y-m-d H:i:s')
                ]); 
            }else{
                $kembali = Peminjaman::where('id',$id)->update([
                    'status_peminjaman' => 4,
                    'tanggal_kembali' => date('Y-m-d H:i:s')
                ]); 
            }
            

            session('cannotbaik',null);
            
            return redirect()->Route('Admin.Pengembalian.index')->with(['message' => 'Proses Pengembalian sukses','type' => 'success']);
        }else{
            return view('Admin.Pengembalian.masukan_barang_rusak')
                    ->with('id',$id)
                    ->with('id_inventaris',$req->id_inventaris)
                    ->with('barang_baik',$req->barang_baik)
                    ->with('jumlahtotal',$req->jumlahtotal);
        }
    }

    public function prosesbarangrusak(Request $req,$id){

        if($req->barang_rusak > 0){
            $update = DetailPengembalian::where('id',$id)->first();
            $kondisi = Inventaris::where('id',$update['id_inventaris'])->update([
                'kondisi' => 1
            ]);
        }
        $read = Inventaris::where('id',$req->id_inventaris)->first();

        $update = Inventaris::where('id',$req->id_inventaris)->update([
            'barang_baik' => $read['barang_baik'] + $req->barang_baik,
            'barang_rusak' => $read['barang_rusak'] + $req->barang_rusak,
            'jumlah' => $read['barang_baik'] + $read['barang_rusak'] + $req->barang_baik + $req->barang_rusak 
        ]);

        $create = DetailPengembalian::create([
            'id_peminjaman' => $id,
            'id_inventaris' => $req->id_inventaris,
            'barang_baik' => $req->barang_baik,
            'barang_rusak' => $req->barang_rusak
        ]);

        if ($req->barang_baik + $req->barang_rusak < $req->jumlahtotal) {
            $kembali = Peminjaman::where('id',$id)->update([
                'tanggal_kembali' => date('Y-m-d H:i:s'),
                'status_peminjaman' => 3
            ]);
        }elseif($req->barang_baik + $req->barang_rusak = $req->jumlahtotal){
            $cekdate = Peminjaman::where('id',$id)->first();
            if ($cekdate->tanggal_max_kembali < date('Y-m-d H:i:s')) {
                $kembali = Peminjaman::where('id',$id)->update([
                    'tanggal_kembali' => date('Y-m-d H:i:s'),
                    'status_peminjaman' => 5
                ]);

            }else{
                $kembali = Peminjaman::where('id',$id)->update([
                    'tanggal_kembali' => date('Y-m-d H:i:s'),
                    'status_peminjaman' => 4
                ]);
            } 
        }
        
        session('cannotbarang_baik',null);

        return redirect()->Route('Admin.Pengembalian.index')->with(['message' => 'Proses Pengembalian sukses','type' => 'success']);
    }

    public function pengembalian()
    {
        $pengembalian = DetailPengembalian::join('peminjaman','peminjaman.id','=','detail_pengembalian.id_peminjaman')->get();

        return view('Admin.Laporan.pengembalian',compact('pengembalian'));
    }
}
