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
                            <li><a href="#">Petugas</a></li>
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
                   <strong>Petugas</strong> Form
                </div>
                <div class="card-body card-block">
                    <form action="{{ route('Admin.MasterData.Petugas.update',[$edit->id])}}" method="post" class="form-horizontal">
                        @csrf
                        @method('patch')
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label  class=" form-control-label">Nama Petugas</label>
                            </div>

                            <div class="col-12 col-md-9">
                                <input type="text"  name="nama_petugas" placeholder="Masukan Username " class="form-control" required="" value="{{$edit->nama_petugas}}">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label  class=" form-control-label">Level</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select data-placeholder="Choose a Country..." class="standardSelect" name="id_level" tabindex="1">
                                    @foreach($level as $row)
                                        @if($edit->id == $row->id_level)
                                            <option value="{{$row->id}}" selected="">{{$row->nama_level}}</option>
                                        @else
                                            <option value="{{$row->id}}" >{{$row->nama_level}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label  class=" form-control-label">Username</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text"  name="username" placeholder="Masukan Username " class="form-control" required="" value="{{$edit->username}}">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-password" class=" form-control-label">Password</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="password" id="hf-password" name="password" placeholder="Masukan Bila Perlu" class="form-control"  >
                            </div>
                        </div>
                        
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Update
                    </button>
                    <a href="{{ route('Admin.MasterData.Petugas.index')}}" type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Cancel</a>
                </div>
            </form>
            </div>
            <!--/.col-->
        </div> <!-- .content -->
@endsection
