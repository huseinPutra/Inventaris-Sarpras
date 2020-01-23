<?php

namespace App\Http\Controllers\Admin\MasterData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Petugas;
use App\Level;
use Hash;

class PetugasController extends Controller
{
    public function index()
    {	
    	$data = Petugas::get();
    	$level = Level::get();
    	return view('Admin.MasterData.Petugas.index',compact('data','level'));
    }

    public function store(Request $req){
    	$input = $req->all();

        $input['password'] = Hash::make($input['password']);
		$check = Petugas::where('username',$input['username'])->first();

        if ($check) {
            return back()->with(['message' => 'Username sudah digunakan','type' => 'warning']);
        }

        $create = Petugas::create($input);

        if ($create) {
            return back()->with(['message' => 'Data Petugas berhasil diinput','type' => 'success']);
        }else{
            return back()->with(['message' => 'Data Petugas gagal diinput','type' => 'danger']);
        }
    }

    public function edit($id){
    	$edit = Petugas::where('id',$id)->first();
        $level = Level::get();

        return view('Admin.MasterData.Petugas.edit',compact('edit','level'));
    }
    
    public function update(Request $req,$id){
    	$input = $req->all();

        if (!$input['password']) {
            unset($input['password']);
            }else{
                $input['password'] = Hash::make($input['password']);
            }

        unset($input['_method']);
        unset($input['_token']);

        $update = Petugas::where('id',$id)->update($input);

        if ($update) {
            return back()->with(['message' => 'Data Petugas berhasil diupdate','type' => 'success']);
        }else{
            return back()->with(['message' => 'Data Petugas gagal diupdate','type' => 'danger']);
        }
    }

    public function delete($id){
    	$delete = Petugas::where('id',$id)->delete();

        if ($delete) {
            return back()->with(['message' => 'Data Petugas berhasil didelete','type' => 'success']);
        }else{
            return back()->with(['message' => 'Data Petugas gagal didelete','type' => 'danger']);
        }
    }
}
