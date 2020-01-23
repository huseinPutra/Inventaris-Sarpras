
@extends('layouts.template')

@section('content')

    @if(Session::has('message'))
        <div class="sufee-alert alert with-close alert-{{Session::get('type')}} alert-dismissible fade show">
            <span class="badge badge-pill badge-{{Session::get('type')}}">{{Session::get('type')}}</span>

                {{Session::get('message')}}

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        @endif
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Laporan</a></li>
                            <li class="active">Peminjaman</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            
                            <div class="card-header">
                                <strong class="card-title">laporan Pengembalian</strong> 
                            </div>
                            
                            <div class="card-body"> 
							@if(count($pengembalian))
								<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
							@else
								<table class="table table-bordered table-striped mb-none">
							@endif
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Atas nama</th>
										<th class="text-center">Kode Barang</th>
										<th class="text-center">Nama Barang</th>
										<th class="text-center">Barang yang masih Baik</th>
										<th class="text-center">Barang yang sudah Rusak</th>
										<th class="text-center">Tanggal pengembalian</th>
									</tr>
								</thead>
								<tbody>
									@if(count($pengembalian))
										@foreach($pengembalian as $key => $val)
											<tr class="gradeA">
												<td class="text-center">{{ $key+1 }}</td>
												<td class="text-center">{{ NamaPegawai($val->id_pegawai) }}</td>
												<td class="text-center">{{ KodeBarang($val->id_inventaris) }}</td>
												<td class="text-center">{{ NamaBarang($val->id_inventaris) }}</td>
												<td class="text-center">{{ $val->barang_baik }}</td>
												<td class="text-center">{{ $val->barang_rusak }}</td>
												<td class="text-center">{{ changedate($val->created_at) }}</td>
											</tr>
										@endforeach
									@else
										<tr align="center" class="gradeA">
											<td colspan="8">Belum ada data :)</td>
										</tr>
									@endif
								</tbody>
							</table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div>
@endsection










                    


