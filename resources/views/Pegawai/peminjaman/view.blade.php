
@extends('layouts.pegawai.tamplate')

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
                            <li><a href="#">Peminjaman</a></li>
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
                                <strong class="card-title mb-3">Detail Peminjaman</strong> 
								@if($data->status_peminjaman == 3)
								<a href="{{ route('Admin.Pengembalian.kembali',[$id]) }}" class="btn btn-primary pull-right">
									<i class="fa fa-check"></i>
									 Sudah Kembali
								</a>
								@endif

								<a href="{{ route('Admin.Pengembalian.index') }}" class="btn btn-secondary pull-right">Kembali</a>
							</div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <img class="rounded-circle mx-auto d-block" src="{{ asset('template/images/admin.jpg')}}" alt="Card image cap">
                                    <h5 class="text-sm-center mt-2 mb-1">{{ NamaPegawai($data->id_pegawai) }}</h5>
                                   
                                    <div class="col-md-4">
                               
                           			 </div>
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                    <a href="#"><i class="fa fa-facebook pr-1"></i></a>
                                    <a href="#"><i class="fa fa-twitter pr-1"></i></a>
                                    <a href="#"><i class="fa fa-linkedin pr-1"></i></a>
                                    <a href="#"><i class="fa fa-pinterest pr-1"></i></a>
                                </div>

                                <div class="panel-body" style="font-size: 15px;">
    		                        <div class="row">
    		                            
    		                            <div class="col-md-4">
    		                                <label class="control-label" for="inputDisabled">Tamggal Pinjam : <strong>{{ changedate($data->tanggal_pinjam) }}</strong></label>
    		                            </div>
    		                            <div class="col-md-4">
    		                                <label class="control-label" for="inputDisabled">
    		                                    Tanggal Kembali : 
    		                                    @if($data->tanggal_kembali)
    		                                        <strong>{{ changedate($data->tanggal_kembali) }}</strong>
    		                                    @else
    		                                        <span class="label label-warning">Belum dikembalikan</span>
    		                                    @endif
    		                                </label>
    		                            </div>
    		                            

    		                            <div class="col-md-4">
    		                                <label class="control-label" for="inputTooltip">Status Peminjaman : </label>
    		                                {!! statusPeminjaman($data->status_peminjaman) !!}
    		                            </div>
    		                        </div>
    		                        <br>

    		                        <div class="row">
    		                            <div class="col-md-4">
    		                                <label class="control-label" for="inputDisabled">Barang yang dipinjam : <strong>{{ $data->nama_inventaris }}</strong></label>
    		                            </div>
    		                            <div class="col-md-4">
    		                                <label class="control-label" for="inputTooltip">Jumlah Barang dipinjam : <strong>{{ $data->jumlah_peminjaman }}</strong> </label>
    		                            </div>
    		                            
    		                            <div class="col-md-4">
    		                                <div class="control-label">Di Approve  :<i class="fa fa-user"></i> 
    		                                {!! NamaPetugas($data->id_petugas) !!}</div>
    		                            </div>

    		                            
    		                        </div>
    		                        <br>

    		                        <div class="row">
    		                            <div class="col-md-6 offset-md-3">
    		                                
    		                            </div>
    		                        </div>
    		                    </div>
               		 	     </div>
              		    </div>
            	   </div>
       		    </div>
       	    </div>
        </div>
@endsection