

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
                        <h1>Perbaikan Barang   :  {{$edit->nama_inventaris}}</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Inventaris</a></li>
                            <li><a href="#">Perbaikan Barang</a></li>
                            <li class="active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

    
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-6 offset-md-3">
                        <div class="card">
                            <div class="card-header">
                               <strong>Inventaris</strong> Form
                            </div>
                            <div class="card-body card-block">
                                <form action="{{ route('Admin.Inventaris.Perbaikan.update',[$edit->id]) }}" method="post" novalidate="novalidate">
                                             @csrf
                                             @method('PATCH')
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Jumlah Barang Rusak</label>

                                                    <input type="text"  name="barang_rusak_before" placeholder="Masukan Nama Inventaris " class="form-control" value="{{$edit->barang_rusak}}" readonly="" required="">

                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                                        <div class="form-group">
                                                            <label for="cc-exp" class="control-label mb-1">Masukan jumlah Yang Ingin Diperbaiki</label>
                                                            <input  class="form-control cc-exp"  name="barang_rusak" value="" placeholder=" Contoh  : 12">
                                                            <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                        </div>
                                               
                                                        <input type="hidden" name="id_inventaris" value="{{$edit->id}}">
                                            <div class="card-footer">
                                                <a href="{{ route('Admin.Inventaris.index')}}" type="reset" class="btn btn-danger pull-right" style="margin-left: 10px;">
                                                    <i class="fa fa-ban"></i> Cancel
                                                </a>
                                               <button type="submit" class="btn btn-primary pull-right">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp; Update
                                                </button>
                                            </div>
                                 </form>
                            </div>
            <!--/.col-->
                        </div>
                        </div>
                        </div>
                        </div>
                        </div> <!-- .content -->
@endsection





 







                    