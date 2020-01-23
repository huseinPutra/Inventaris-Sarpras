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
                    <form action="{{ route('Admin.MasterData.Ruangan.update',[$edit->id])}}" method="post" class="form-horizontal">
                        @csrf
                        @method('patch')
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label  class=" form-control-label">Nama ruangan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text"  name="nama_ruangan" placeholder="Masukan Nama " class="form-control" required="" value="{{ $edit->nama_ruangan}}">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label  class=" form-control-label">Nomor Ruangan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="number"  name="nomor_ruangan" placeholder="Masukan Nomor Ruangan " class="form-control" required="" value="{{ $edit->nomor_ruangan}}">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label  class=" form-control-label">Keterangan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea  name="keterangan" placeholder="Masukan Keterangan " class="form-control" required="">{{$edit->keterangan}}</textarea>
                            </div>
                        </div>
                       
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Update
                    </button>
                    <a href="{{ route('Admin.MasterData.Ruangan.index')}}" type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Cancel</a>
                </div>
            </form>
            </div>
            <!--/.col-->
        </div> <!-- .content -->
@endsection
