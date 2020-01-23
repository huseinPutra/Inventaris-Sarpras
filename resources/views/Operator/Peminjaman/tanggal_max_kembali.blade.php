
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
                                <strong class="card-title">Data Peminjaman</strong> <button type="button" class="btn btn-primary mb-1 pull-right" data-toggle="modal" data-target="#mediumModal1"><i class="fa fa-magic"></i>&nbsp; Input Peminjaman
                        </button>
                            </div>
                                <div class="card-body">
                                   <form class="form-horizontal form-bordered" method="post" action="{{ route('Operator.Peminjaman.approve',[$id]) }}">
                                        @csrf
                                        @method('patch')
                                    <header class="panel-heading">          
                                        <h2 class="panel-title">Masukan data peminjaman</h2>
                                    </header>
                                    <div class="panel-body">
                                        <div class="form-group">
                                           
                                                <label class="col-md-3 control-label" for="inputTooltip">Maksimal Tanggal Kembali</label>
                                                    <div class="col-md-6">
                                                        <input type="date" min="{{ date('Y-m-d') }}" name="tanggal_max_kembali" required="" class="form-control">
                                                    </div>
                                            
                                        </div>
                                        
                                    </div>
                                    <footer class="panel-footer">
                                        <div class="form-group">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6" align="right">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-check"></i>
                                                     Simpan
                                                </button>

                                                <a href="{{ route('Operator.Peminjaman.index') }}" class="btn btn-default">Kembali</a>
                                            </div>
                                        </div>

                                </form>
                                </div>
                            </div>
                        </div>


                    </div>
                </div><!-- .animated -->
            </div>

@endsection








 







                    