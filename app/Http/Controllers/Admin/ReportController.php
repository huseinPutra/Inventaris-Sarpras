<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Inventaris;

class ReportController extends Controller
{
   public function barang(){
    	$barang = Inventaris::get();
    	$filter = 0;

    	  return view('Admin.Laporan.Barang',compact('barang','filter'));
    }
    
    
   
}
