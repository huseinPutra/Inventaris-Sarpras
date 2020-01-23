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
                            <li><a href="#">Pegawai</a></li>
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
                   <strong>Pegawai</strong> Form
                </div>
                <div class="card-body card-block">
                    <form action="{{ route('Admin.MasterData.Pegawai.update',[$data->id])}}" method="post" class="form-horizontal">
                        @csrf
                        @method('patch')
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label  class=" form-control-label">NIP Pegawai</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="number"  name="nip" placeholder="Masukan NiP " class="form-control" required="" value="{{ $data->nip}}">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label  class=" form-control-label">Nama Pegawai</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text"  name="nama_pegawai" placeholder="Masukan Nama " class="form-control" required="" value="{{ $data->nama_pegawai}}">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label  class=" form-control-label">Alamat Pegawai</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea  name="alamat" placeholder="Masukan Alamat " class="form-control" required="">{{$data->alamat}}</textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label  class=" form-control-label">Username</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text"  name="username" placeholder="Masukan Username " class="form-control" required="" value="{{$data->username}}">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-password" class=" form-control-label">Password</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="password" id="hf-password" name="password" placeholder="Ini Jika Perlu..." class="form-control" value="" >
                            </div>
                        </div>
                        
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Update
                    </button>
                    <a href="{{ route('Admin.MasterData.Pegawai.index')}}" type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Cancel</a>
                </div>
            </form>
            </div>
            <!--/.col-->
        </div> <!-- .content -->
@endsection
