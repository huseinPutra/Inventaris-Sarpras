<?php

namespace App\Http\Controllers\Admin\MasterData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ruangan;

class RuanganController extends Controller
{
    public function index(){
    	$data = Ruangan::get();
    	return view('Admin.MasterData.Ruangan.index',compact('data'));
    }
    public function store(Request $request){
    	$Ruangan = $request->all();

    	$Ruangan['kode_ruangan'] = AutoCode('KDR');

    	$create = Ruangan::create($Ruangan);

    	if($create){
    		return redirect()->route('Admin.MasterData.Ruangan.index')->with(['message' => ' Berhasil Input Ruangan', 'type' => 'success']);
    	}else{
    		return back()->with(['message' => ' Gagal Input Ruangan', 'type' => 'danger']);
    	}
    }
    
    public function edit($id){
    	$edit = Ruangan::where('id',$id)->first();
    	return view('Admin.MasterData.Ruangan.edit',compact('edit'));
    }

    public function update(Request $request, $id){
    	$Ruangan = $request->all();
    	
    	unset($Ruangan['_method']);
    	unset($Ruangan['_token']);

    	$update = Ruangan::where('id',$id)->update($Ruangan);

    	if ($Ruangan) {
    		return redirect()->route('Admin.MasterData.Ruangan.index')->with(['message'=>'Berhasil Update Data Ruangan', 'type' => 'success']);
    	}else{
    		return back()->with(['message' => ' Gagal Update Data Ruangan', 'type' => 'danger']);
    	}
    }

    public function delete($id){
        $Ruangan = Ruangan::where('id',$id)->delete();
        if($Ruangan){
            return redirect()->route('Admin.MasterData.Ruangan.index')->with(['message'=>' Berhasil Meng-Hapus Ruangan ', 'type'=>'success']);
        }else{
            return back()->with(['message'=>' Gagal Meng-Hapus Ruangan ', 'type'=>'danger']);
        }
    }
}
