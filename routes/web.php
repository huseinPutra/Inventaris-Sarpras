	<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');




Route::group(['namespace' => 'Admin','prefix' => 'admin','middleware' =>'Admin'],function(){

	Route::group(['namespace'=>'MasterData','prefix' => 'masterdata'],function(){
		
		Route::group(['prefix' => 'pegawai'],function(){
			Route::get('/index',['as' => 'Admin.MasterData.Pegawai.index','uses' => 'PegawaiController@index']);
			Route::get('/create',['as' => 'Admin.MasterData.Pegawai.create','uses' => 'PegawaiController@create']);
			Route::post('/store',['as' => 'Admin.MasterData.Pegawai.store','uses' => 'PegawaiController@store']);
			Route::get('/edit/{id}',['as' => 'Admin.MasterData.Pegawai.edit','uses' => 'PegawaiController@edit']);
			Route::patch('/update/{id}',['as' => 'Admin.MasterData.Pegawai.update','uses' => 'PegawaiController@update']);
			Route::get('/delete/{id}',['as' => 'Admin.MasterData.Pegawai.delete','uses' => 'PegawaiController@delete']);
		});
		Route::group(['prefix' => 'petugas'],function(){
			Route::get('/index',['as' => 'Admin.MasterData.Petugas.index','uses' => 'PetugasController@index']);
			Route::get('/create',['as' => 'Admin.MasterData.Petugas.create','uses' => 'PetugasController@create']);
			Route::post('/store',['as' => 'Admin.MasterData.Petugas.store','uses' => 'PetugasController@store']);
			Route::get('/edit/{id}',['as' => 'Admin.MasterData.Petugas.edit','uses' => 'PetugasController@edit']);
			Route::patch('/update/{id}',['as' => 'Admin.MasterData.Petugas.update','uses' => 'PetugasController@update']);
			Route::get('/delete/{id}',['as' => 'Admin.MasterData.Petugas.delete','uses' => 'PetugasController@delete']);
		});

		Route::group(['prefix' => 'jenis'],function(){
			Route::get('/index',['as' => 'Admin.MasterData.Jenis.index','uses' => 'JenisController@index']);
			Route::get('/create',['as' => 'Admin.MasterData.Jenis.create','uses' => 'JenisController@create']);
			Route::post('/store',['as' => 'Admin.MasterData.Jenis.store','uses' => 'JenisController@store']);
			Route::get('/edit/{id}',['as' => 'Admin.MasterData.Jenis.edit','uses' => 'JenisController@edit']);
			Route::patch('/update/{id}',['as' => 'Admin.MasterData.Jenis.update','uses' => 'JenisController@update']);
			Route::get('/delete/{id}',['as' => 'Admin.MasterData.Jenis.delete','uses' => 'JenisController@delete']);
		});
		Route::group(['prefix' => 'ruangan'],function(){
			Route::get('/index',['as' => 'Admin.MasterData.Ruangan.index','uses' => 'RuanganController@index']);
			Route::get('/create',['as' => 'Admin.MasterData.Ruangan.create','uses' => 'RuanganController@create']);
			Route::post('/store',['as' => 'Admin.MasterData.Ruangan.store','uses' => 'RuanganController@store']);
			Route::get('/edit/{id}',['as' => 'Admin.MasterData.Ruangan.edit','uses' => 'RuanganController@edit']);
			Route::patch('/update/{id}',['as' => 'Admin.MasterData.Ruangan.update','uses' => 'RuanganController@update']);
			Route::get('/delete/{id}',['as' => 'Admin.MasterData.Ruangan.delete','uses' => 'RuanganController@delete']);
		});
		Route::group(['prefix' => 'level'],function(){
			Route::get('/index',['as' => 'Admin.MasterData.Level.index','uses' => 'LevelController@index']);
			Route::get('/create',['as' => 'Admin.MasterData.Level.create','uses' => 'LevelController@create']);
			Route::post('/store',['as' => 'Admin.MasterData.Level.store','uses' => 'LevelController@store']);
			Route::get('/edit/{id}',['as' => 'Admin.MasterData.Level.edit','uses' => 'LevelController@edit']);
			Route::patch('/update/{id}',['as' => 'Admin.MasterData.Level.update','uses' => 'LevelController@update']);
			Route::get('/delete/{id}',['as' => 'Admin.MasterData.Level.delete','uses' => 'LevelController@delete']);
		});


	});

	Route::group(['prefix'=>'PerbaikanData'],function(){
		Route::get('/barang',['as'=>'Admin.Inventaris.Perbaikan.index','uses'=>'PerbaikanController@index']);
		Route::post('/store',['as' => 'Admin.Inventaris.Perbaikan.store','uses' => 'PerbaikanController@store']);
		Route::get('/edit/{id}',['as' => 'Admin.Inventaris.Perbaikan.Ubah','uses' => 'PerbaikanController@edit']);
		Route::patch('/update/{id}',['as' => 'Admin.Inventaris.Perbaikan.update','uses' => 'PerbaikanController@update']);
		Route::get('/delete/{id}',['as' => 'Admin.Inventaris.Perbaikan.delete','uses' => 'PerbaikanController@delete']);
	});

//INPUTAN INVENTARIS DITIDAK MASUK KE DALAM MASTERDATA TETAPI MASUK KEDALAM CONTROLLER ADMIN
	Route::group(['prefix' => 'inventaris'],function(){
			Route::get('/index',['as' => 'Admin.Inventaris.index','uses' => 'InventarisController@index']);
			Route::get('/create',['as' => 'Admin.Inventaris.create','uses' => 'InventarisController@create']);
			Route::post('/store',['as' => 'Admin.Inventaris.store','uses' => 'InventarisController@store']);
			Route::get('/edit/{id}',['as' => 'Admin.Inventaris.edit','uses' => 'InventarisController@edit']);
			Route::patch('/update/{id}',['as' => 'Admin.Inventaris.update','uses' => 'InventarisController@update']);
			Route::get('/delete/{id}',['as' => 'Admin.Inventaris.delete','uses' => 'InventarisController@delete']);
		});

	Route::group(['prefix' => 'peminjaman'],function(){

			Route::get('/index',['as' => 'Admin.Peminjaman.index','uses' => 'PeminjamanController@index']);
			Route::post('/store',['as' => 'Admin.Peminjaman.store','uses' => 'PeminjamanController@store']);
			Route::get('/edit/{id}',['as' => 'Admin.Peminjaman.edit','uses' => 'PeminjamanController@edit']);
			Route::patch('/update/{id}',['as' => 'Admin.Peminjaman.update','uses' => 'PeminjamanController@update']);
			Route::get('/delete/{id}',['as' => 'Admin.Peminjaman.delete','uses' => 'PeminjamanController@delete']);
			Route::get('/view/{id}',['as' => 'Admin.Peminjaman.view','uses' => 'PeminjamanController@view']);

			Route::patch('/approve/{id}',['as' => 'Admin.Peminjaman.approve','uses' => 'PeminjamanController@approvep']);
			Route::get('/denied/{id}',['as' => 'Admin.Peminjaman.denied','uses' => 'PeminjamanController@denied']);
			Route::get('/maxkembali/{id}',['as' => 'Admin.Peminjaman.tanggalmaxkembali','uses' => 'PeminjamanController@maxkembali']);

			});

		Route::group(['prefix' => 'pengembalian'],function(){

			Route::get('/index',['as' => 'Admin.Pengembalian.index','uses' => 'PengembalianController@index']);
			Route::get('/kembali/{id}',['as' => 'Admin.Pengembalian.kembali','uses' => 'PengembalianController@kembali']);
			Route::patch('/prosesburuk/{id}',['as' => 'Admin.Pengembalian.prosesbarangrusak','uses' => 'PengembalianController@prosesbarangrusak']);
			Route::get('/delete/{id}',['as' => 'Admin.Pengembalian.delete','uses' => 'PengembalianController@delete']);
			Route::get('/view/{id}',['as' => 'Admin.Pengembalian.view','uses' => 'PengembalianController@view']);

			Route::group(['middleware' => 'prosesbarangbaik'],function(){
				Route::patch('/prosesbarangbaik/{id}',['as' => 'Admin.Pengembalian.prosesbarangbaik','uses' => 'PengembalianController@prosesbarangbaik']);
			});
		});

		Route::group(['prefix' => 'Laporan'],function(){
			Route::get('/peminjaman',['as' => 'Admin.Laporan.peminjaman','uses' => 'PeminjamanController@laporanpeminjaman']);
			Route::get('/pengembalian',['as' => 'Admin.Laporan.pengembalian','uses' => 'PengembalianController@pengembalian']);
			Route::get('/barang',['as' => 'Admin.Laporan.barang','uses' => 'ReportController@barang']);
		});

});

//INPUTAN PEGAWAI TIDAK MASUK KEDALAM MASTERDATA DAN TIDAK MASUK KEDALAM  CONTROLLER ADMIN TETAPI MASUK KEDALAM CONTROLLER PEGAWAI
Route::group(['namespace' => 'Pegawai','prefix' => 'pegawai','middleware'=>'Pegawai'],function(){

	Route::group(['prefix' => 'pegawai'],function(){
		Route::get('/index',['as' => 'Pegawai.index','uses' => 'PeminjamanController@index']);
		Route::post('/store',['as' => 'Pegawai.Peminjaman.store','uses' => 'PeminjamanController@store']);

		Route::get('/edit/{id}',['as' => 'Pegawai.Peminjaman.edit','uses' => 'PeminjamanController@edit']);
		Route::patch('/update/{id}',['as' => 'Pegawai.Peminjaman.update','uses' => 'PeminjamanController@update']);
		Route::get('/delete/{id}',['as' => 'Pegawai.Peminjaman.delete','uses' => 'PeminjamanController@delete']);
		Route::get('/view/{id}',['as' => 'Pegawai.Peminjaman.view','uses' => 'PeminjamanController@view']);
	});
});

Route::group(['namespace' => 'Operator','prefix' => 'operator','middleware' => 'Operator'],function(){
	
	Route::get('/home','HomeController@index')->name('Operator.home');

	Route::group(['prefix' => 'peminjaman'],function(){
		Route::get('/index',['as' => 'Operator.Peminjaman.index','uses' => 'PeminjamanController@index']);
		Route::get('/create',['as' => 'Operator.Peminjaman.create','uses' => 'PeminjamanController@create']);
		Route::post('/store',['as' => 'Operator.Peminjaman.store','uses' => 'PeminjamanController@store']);
		Route::get('/edit/{id}',['as' => 'Operator.Peminjaman.edit','uses' => 'PeminjamanController@edit']);
		Route::patch('/update/{id}',['as' => 'Operator.Peminjaman.update','uses' => 'PeminjamanController@update']);
		Route::get('/delete/{id}',['as' => 'Operator.Peminjaman.delete','uses' => 'PeminjamanController@delete']);
		Route::get('/view/{id}',['as' => 'Operator.Peminjaman.view','uses' => 'PeminjamanController@view']);

		Route::patch('/approve/{id}',['as' => 'Operator.Peminjaman.approve','uses' => 'PeminjamanController@approvep']);
		Route::get('/denied/{id}',['as' => 'Operator.Peminjaman.denied','uses' => 'PeminjamanController@denied']);
		Route::get('/maxkembali/{id}',['as' => 'Operator.Peminjaman.tanggalmaxkembali','uses' => 'PeminjamanController@tanggalmaxkembali']);
	});

	Route::group(['prefix' => 'pengembalian'],function(){

		Route::get('/index',['as' => 'Operator.Pengembalian.index','uses' => 'PengembalianController@index']);
		Route::get('/kembali/{id}',['as' => 'Operator.Pengembalian.kembali','uses' => 'PengembalianController@kembali']);
		Route::patch('/prosesburuk/{id}',['as' => 'Operator.Pengembalian.prosesbarangrusak','uses' => 'PengembalianController@prosesbarangrusak']);
		Route::get('/delete/{id}',['as' => 'Operator.Pengembalian.delete','uses' => 'PengembalianController@delete']);
		Route::get('/view/{id}',['as' => 'Operator.Pengembalian.view','uses' => 'PengembalianController@view']);

		Route::group(['middleware' => 'prosesbarangbaik'],function(){
				Route::patch('/prosesbarangbaik/{id}',['as' => 'Operator.Pengembalian.prosesbarangbaik','uses' => 'PengembalianController@prosesbarangbaik']);
		});

	});
});
