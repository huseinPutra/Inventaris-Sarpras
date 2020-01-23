<?php

	function getname(){
		if (isset(Auth::user()->id_level)) {
			return Auth::user()->nama_petugas;
		}elseif(isset(Auth::guard('pegawai')->user()->nama_pegawai)){
			return Auth::guard('pegawai')->user()->nama_pegawai;
		}
	}

	function AmbilJabatan(){
	if (isset(Auth::user()->id_level)) {
		if (Auth::user()->id_level == 1) {
			return "Administrator";
		}else{
			return "Operator";
		}
	}elseif(isset(Auth::guard('pegawai')->user()->nama_pegawai)){
		return "Pegawai";
	}
}
	function AutoCode($code){
		if ($code == "KDJ") {
				$count = App\Jenis::orderBy('id','DESC')->first();
			}elseif($code == "KDR"){
				$count = App\Ruangan::orderBy('id','DESC')->first();
			}elseif($code == "KDI"){
				$count = App\Inventaris::orderBy('id','DESC')->first();
			}

			if ($count) {
				$id = $count->id + 1;
				$fix = $code.$id;
			}else{
				$fix = $code.'1';
			}

			return $fix;
		}

	function NamaJenis($id){
		$Jenis = App\Jenis::where('id',$id)->first();

		return $Jenis['nama_jenis'];
	}

	function NamaRuangan($id){
		$Ruangan = App\Ruangan::where('id',$id)->first();

		return $Ruangan['nama_ruangan'];
	}

	function NamaPegawai($id){
		$Pegawai = App\Pegawai::where('id',$id)->first();
		return $Pegawai['nama_pegawai'];
	}
	function AmbilNamaLevel($id_level){
		$level = App\Level::where('id',$id_level)->first();

		return $level['nama_level'];
	}

	function CheckBarang($id,$jumlah){
		$check = App\Inventaris::where('id',$id)->first();

		if ($jumlah  >  $check->barang_baik){
			return false;
		}else{
			return true;
		}
	}

	function CheckBarangPeminjaman($id,$jumlah){
		$check = App\DetailPeminjaman::where('id_peminjaman',$id)->first();

		if ($jumlah  >  $check->jumlah){
			return false;
		}else{
			return true;
		}
	}

	function BarangRusak($id,$jumlah){
		$checkk = App\Inventaris::where('id',$id)->first();

		if ($jumlah  >  $checkk->barang_rusak){
			return false;
		}else{
			return true;
		}
	}
	function countdate($fdate,$tdate){
		$datetime1 = new DateTime($fdate);
		$datetime2 = new DateTime($tdate);
		// dd($datetime1,$datetime2);
		$interval = $datetime1->diff($datetime2);
		$days = $interval->format('%H:%I:%S');
		return $days;
	}

	function CheckBarangBaik($id){
		$baik = App\DetailPeminjaman::where('id_peminjaman',$id)->first();

		return $baik['jumlah'];
	}

	function BarangBaik($id){
		$baik = App\Inventaris::where('id',$id)->first();

		return $baik['barang_baik'];
	}
	function NamaPetugas($id){
		$Petugas = App\Petugas::where('id',$id)->first();

		return $Petugas['nama_petugas'];
	}
	

	function NamaBarang($id)
	{
		$Nama = App\Inventaris::where('id',$id)->first();

		return $Nama['nama_inventaris'];
	}

	function KodeBarang($id)
	{
		$Nama = App\Inventaris::where('id',$id)->first();

		return $Nama['kode_inventaris'];
	}

	function changedate($date){
		if ($date) {
			return date(' d - F - Y',strtotime($date));	
		}else{
			return "-";
		}
	}
	function changedatemax($date){
		if ($date) {
			return date(' d - F - Y',strtotime($date));	
		}else{
			return "-";
		}
	}

	function statusPeminjaman($v){
		$data = [
			0 => '<span class="badge badge-warning">Belum Di Setujui</span>',
			1 => '<span class="badge badge-primary">Sudah Di Setujui</span>',
			2 => '<span class="badge badge-danger">Tidak Disetujui</span>',
			3 => '<span class="badge badge-info">Belum dikembalikan semua</span>',
			4 => '<span class="badge badge-success">Sudah Di Kembalikan</span>',
			5 => '<span class="btn social flickr">Sudah dikembalikan (TERLAMBAT)</span>',
		];

		return $data[$v];
	}	

	function viewPeminjaman($id = null){
	if ($id) {
		return App\Peminjaman::select('peminjaman.*','detail__peminjaman.*','inventaris.*','detail__peminjaman.jumlah as jumlah_peminjaman')
    					->where('peminjaman.id',$id)
						->join('detail__peminjaman','detail__peminjaman.id_peminjaman','=','peminjaman.id')
						->join('inventaris','inventaris.id','=','detail__peminjaman.id_inventaris')
						->first();
	}
}
