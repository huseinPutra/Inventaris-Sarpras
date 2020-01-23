
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
                            <li><a href="#">Barang</a></li>
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
                                <strong class="card-title">Data Barang</strong> 
                            </div>
                            
                           
                            
                            <div class="card-body">
                                
                            @if(count($barang))
                                <table  id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            @else
                                <table class="table table-bordered table-striped mb-none">
                            @endif
                                <th class="text-center" ead>
                                    <tr>
                                        <th class="text-center" >No</th>
                                        <th class="text-center" >Nama Inventaris</th>
                                        <th class="text-center" >Barang Rusak</th>
                                        <th class="text-center" >Aksi</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        @if(count($barang))
                                            @foreach($barang as $a => $val)
                                                <tr class="gradeA">
                                                    <td class="text-center">{{ $a+1}}</td>
                                                    <td class="text-center">{{ $val->nama_inventaris }}</td>
                                                    <td class="text-center">{{ $val->barang_rusak}}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('Admin.Inventaris.Perbaikan.Ubah',[$val->id]) }}" class="btn btn-warning">Perbaiki</a>
                                                        <a onclick="return confirm('Apa anda yakin?')" href="{{ route('Admin.Inventaris.Perbaikan.delete',[$val->id]) }}" class="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr align="center" class="gradeA">
                                                <td class="text-center" colspan="8">Belum ada data :)</td>
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










                    