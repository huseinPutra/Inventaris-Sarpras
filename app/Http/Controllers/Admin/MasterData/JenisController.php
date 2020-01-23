<?php

namespace App\Http\Controllers\Admin\MasterData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jenis;
use Hash;

class JenisController extends Controller
{
    public function index()
    {
    	$data = Jenis::get();
    	return view('Admin.MasterData.Jenis.index',compact('data'));
    }

    public function store(Request $request){
    	$jenis = $request->all();

    	$jenis['kode_jenis'] = AutoCode('KDJ');

    	$create = Jenis::create($jenis);

    	if($create){
    		return redirect()->route('Admin.MasterData.Jenis.index')->with(['message'=>' Berhasil Input Jenis ', 'type'=>'success']);
    	}else{
    		return back()->with(['message'=>' Gagal Input Jenis ', 'type'=>'danger']);
    	}
    }

    public function delete($id){
    	$Djenis = Jenis::where('id',$id)->delete();
    	if($Djenis){
    		return redirect()->route('Admin.MasterData.Jenis.index')->with(['message'=>' Berhasil Meng-Hapus Jenis ', 'type'=>'success']);
    	}else{
    		return back()->with(['message'=>' Gagal Meng-Hapus Jenis ', 'type'=>'danger']);
    	}
    }

    public function edit($id){
    	$edit = Jenis::where('id',$id)->first();
    	return view('Admin.MasterData.Jenis.edit',compact('edit'));
    }
    
    public function update(Request $request, $id){
    	$jenis = $request->all();

		unset($jenis['_method']);
    	unset($jenis['_token']);
    	

    	$update = Jenis::where('id',$id)->update($jenis);

    	if($update){
			return redirect()->route('Admin.MasterData.Jenis.index')->with(['message'=>' Berhasil Update Jenis ', 'type'=>'success']);
    	}else{
    		return back()->with(['message'=>' Gagal Update Jenis ', 'type'=>'danger']);
    	}
    }
}
