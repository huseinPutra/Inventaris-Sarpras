
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
                            <li><a href="#">Pengembalian</a></li>
                            <li class="active">index</li>
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
                                <strong class="card-title">Data Pengembalian</strong> <a href="{{route('Admin.Peminjaman.index')}}"" type="button" class="btn btn-primary mb-1 pull-right"> <i class="fa fa-magic"></i>&nbsp; Input Peminjaman</a></button>
                            </div>
                                <div class="card-body">
                                    @if(count($data))
								<table class="table table-bordered table-striped mb-none" id="datatable-default">
									@else
										<table class="table table-bordered table-striped mb-none">
									@endif
										<thead>
											<tr>
												<th>No</th>
												<th>Peminjam</th>
												<th>Tanggal Pinjam</th>
												<th>Tanggal Max Kembali</th>
												<th>Status Peminjaman</th>
												<th>Tanggal Register</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											@if(count($data))
												@foreach($data as $key => $val)
													<tr class="gradeA">
														<td>{{ $key+1 }}</td>
														<td>{{ NamaPegawai($val->id_pegawai) }}</td>
														<td class="center hidden-phone">{{ changedatemax($val->tanggal_pinjam) }}</td>
														<td class="center hidden-phone">{{ changedatemax($val->tanggal_max_kembali) }}</td>
														<td class="center hidden-phone">{!! statusPeminjaman($val->status_peminjaman) !!}</td>
														<td class="center hidden-phone">{{ changedate($val->created_at) }}</td>
														<td>
														@if($val->status_peminjaman == 3 || $val->status_peminjaman == 1)
															<a href="{{ route('Admin.Pengembalian.kembali',[$val->id]) }}" class="btn btn-success">
																<i class="fa fa-check"></i>
																kembalikan Barang
															</a>
															@endif

															<a href="{{ route('Admin.Pengembalian.view',[$val->id]) }}" class="btn btn-primary">Detail</a>
														</td>
													</tr>
												@endforeach
											@else
												<tr align="center" class="gradeA">
													<td colspan="11">Belum ada data :)</td>
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
