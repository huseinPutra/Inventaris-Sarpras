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
                            <li><a href="#">Level</a></li>
                            <li class="active">index</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="content mt-3">
            <div class="animated fadeIn">

                
                <div class="row">
                    <div class="col-xs-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <strong>Masked Input</strong> <small> Small Text Mask</small>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{ route('Admin.MasterData.Level.update',[$edit->id])}}" method="post" novalidate="novalidate">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Nama Level</label>
                                            <input type="text"  name="nama_level" placeholder="Masukan Nama Level " class="form-control" required="" value="{{$edit->nama_level}}">
                                        <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Update
                                        </button>
                                        <a href="{{ route('Admin.MasterData.Level.index')}}" type="reset" class="btn btn-danger btn-sm">
                                        <i class="fa fa-ban"></i> Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                

                    <div class="col-xs-6 col-sm-6">
                        <div class="card"> 
                            <div class="card-body">
                                
                            @if(count($data))
                                <table  id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            @else
                                <table class="table table-bordered table-striped mb-none">
                            @endif
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Level</th>
                                        <th>Tanggal Register</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        @if(count($data))
                                            @foreach($data as  $val)
                                                <tr class="gradeA">
                                                    <td>{{ $val->id }}</td>
                                                    <td>{{ $val->nama_level }}</td>
                                                     <td>{{ $val->created_at }}</td>
                                                    <td>
                                                        <a href="{{ route('Admin.MasterData.Level.edit',[$val->id]) }}" class="btn btn-warning">Edit</a>
                                                        <a onclick="return confirm('Apa anda yakin?')" href="{{ route('Admin.MasterData.Level.delete',[$val->id]) }}" class="btn btn-danger">Delete</a>
                                                    </td>
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
