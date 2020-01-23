<?php

namespace App\Http\Controllers\Admin\MasterData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Level;

class LevelController extends Controller
{
    public function index()
    {
    	$data = Level::get();
    	return view('Admin.MasterData.Level.index',compact('data'));

    }
    public function store(Request $request){
    	$Level = $request->all();

    	$create = Level::create($Level);

    	 if ($create) {
            return redirect()->route('Admin.MasterData.Level.index')->with(['message' => 'Data Level berhasil diinput','type' => 'success']);
        }else{
            return back()->with(['message' => 'Data Level gagal diinput','type' => 'danger']);
        }
	}

	public function edit($id)
	{
		$edit = Level::where('id',$id)->first();
		$data = Level::get();
		return view('Admin.MasterData.Level.edit',compact('edit','data'));
	}

	public function update(Request $request,$id){
		$Level = $request->all();
		unset($Level['_method']);
		unset($Level['_token']);
    	$update = Level::where('id',$id)->update($Level);

    	 if ($update) {
            return redirect()->route('Admin.MasterData.Level.index')->with(['message' => 'Data Level berhasil Update','type' => 'success']);
        }else{
            return back()->with(['message' => 'Data Level gagal Update','type' => 'danger']);
        }
	}
    
	public function delete($id){
		$delete = Level::where('id',$id)->delete();
    	 
    	 if ($delete) {
            return redirect()->route('Admin.MasterData.Level.index')->with(['message' => 'Data Level berhasil Dihapus','type' => 'success']);
        }else{
            return back()->with(['message' => 'Data Level gagal Dihapus','type' => 'danger']);
        }
	}
}
