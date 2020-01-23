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
                            <li><a href="#">Ruangan</a></li>
                            <li class="active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

    
        <div class="content mt-3">

            
            <!--/.col-->

            <div class="card">
                <div class="card-header">
                   <strong>ruangan</strong> Form
                </div>
                <div class="card-body card-block">
                    <form action="{{ route('Pegawai.Peminjaman.update',[$id]) }}" method="post" class="form-horizontal">
                        @csrf
                        @method('patch')
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label  class=" form-control-label">Nama ruangan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                 @if(count($barang) > 0)
														<select name="id_inventaris" required="" data-plugin-selectTwo class="form-control populate selecttwo">
															@foreach($barang as $key => $v)
															
																@if($v->id == $data->id_inventaris)
																	<option selected="" value="{{ $v->id }}">{{ $v->nama_inventaris }}</option>
																@else
																	<option value="{{ $v->id }}">{{ $v->nama_inventaris }}</option>
																@endif
															@endforeach
														</select>
													@else
														<select class="form-control mb-md" required="" disabled="">
															<option>input data barang terlebih dahulu</option>
														</select>
														<span class="help-block">Data barang masih kosong.</span>
													@endif
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label  class=" form-control-label">Jumlah Barang Yang Di Pinjam</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="number" min="0" name="jumlah" required="" placeholder="contoh : 10" title="" data-toggle="tooltip" data-trigger="hover" class="form-control" data-original-title="Masukan jumlah barang yang akan dipinjam" id="inputTooltip" value="{{ $data->jumlah_peminjaman }}">
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Update
                    </button>
                    <a href="{{ route('Pegawai.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
            </div>
            <!--/.col-->
        </div> <!-- .content -->
@endsection