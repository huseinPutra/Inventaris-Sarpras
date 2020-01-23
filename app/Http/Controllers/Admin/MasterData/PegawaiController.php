<?php

namespace App\Http\Controllers\Admin\MasterData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pegawai;
use Hash;

class PegawaiController extends Controller
{
    public function index(){
        $data = Pegawai::get();
        return view('Admin.MasterData.Pegawai.index',compact('data'));
    }
    
    public function create(){
    	return view('Admin.MasterData.Pegawai.create');
    }

    public function store( Request $req){
    	$input = $req->all();
        
        $input['password'] = Hash::make($input['password']);
        $check = Pegawai::where('username',$input['username'])->first();

        if ($check) {
            return back()->with(['message' => 'Username sudah digunakan','type' => 'warning']);
        }

        $create = Pegawai::create($input);

        if ($create) {
            return redirect()->route('Admin.MasterData.Pegawai.index')->with(['message' => 'Data pegawai berhasil diinput','type' => 'success']);
        }else{
            return back()->with(['message' => 'Data pegawai gagal diinput','type' => 'danger']);
        }
    }

    public function edit($id){
    	$data = Pegawai::where('id',$id)->first();

        return view('Admin.MasterData.Pegawai.edit',compact('data'));
    }

    public function update(Request $req,$id){
    	$input = $req->all();

        unset($input['_method']);
        unset($input['_token']);
        
        if (!$input['password']) {
            unset($input['password']);
            }else{
                $input['password'] = Hash::make($input['password']);
            }

        $update = Pegawai::where('id',$id)->update($input);

        if ($update) {
            return redirect()->route('Admin.MasterData.Pegawai.index')->with(['message' => 'Data pegawai berhasil diupdate','type' => 'success']);
        }else{
            return back()->with(['message' => 'Data pegawai gagal diupdate','type' => 'danger']);
        }

    }
    
    public function delete($id){
    	$delete = pegawai::where('id',$id)->delete();

    	if($delete){
    	return redirect()->route('Admin.MasterData.Pegawai.index')->with(['message' => 'Data pegawai berhasil Di Hapus','type' => 'success']);
        }else{
            return back()->with(['message' => 'Data pegawai gagal di Hapus','type' => 'danger']);
        }
    }
}
