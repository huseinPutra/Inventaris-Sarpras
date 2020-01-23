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
                            <li><a href="#">Inventaris</a></li>
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
                   <strong>Inventaris</strong> Form
                </div>

                <div class="card-body card-block">
                    <form action="{{ route('Admin.Inventaris.update',[$edit->id])}}" method="post" novalidate="novalidate">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">Nama Inventaris</label>
                                 <input type="text"  name="nama_inventaris" placeholder="Masukan Nama Inventaris " class="form-control" value="{{$edit->nama_inventaris}}" required="">
                            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                        </div>
                        
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="cc-exp" class="control-label mb-1">Barang Baik</label>
                                    <input  class="form-control cc-exp"  name="barang_baik" value="{{$edit->barang_baik}}" placeholder=" Contoh  : 12">
                                    <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="x_card_code" class="control-label mb-1">Barang Rusak</label>
                                <div class="input-group">
                                    <input  name="barang_rusak" type="number" class="form-control cc-cvc"  autocomplete="off" placeholder=" Contoh  : 0" value="{{$edit->barang_rusak}}" >
                                    <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>        
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="cc-exp" class="control-label mb-1">Jenis</label>
                                        <select data-placeholder="Choose a Country..." class="standardSelect" name="id_jenis" tabindex="1">
                                            @foreach($Jenis as $row)
                                                 @if($edit->id == $row->id)
                                                    <option value="{{$row->id}}" selected="">{{$row->nama_jenis}}</option>
                                                @else
                                                    <option value="{{$row->id}}" >{{$row->nama_jenis}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="x_card_code" class="control-label mb-1">Ruangan</label>
                                    <div class="input-group">
                                        <select data-placeholder="Choose a Country..." class="standardSelect" name="id_ruangan" tabindex="1">
                                            @foreach($Ruangan as $row)
                                                @if($edit->id == $row->id)
                                                    <option value="{{$row->id}}" selected="">{{$row->nama_ruangan}}</option>
                                                @else
                                                    <option value="{{$row->id}}">{{$row->nama_ruangan}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>              
                                    </div>
                            </div>
                        </div>
                                                
                        <div class="form-group">
                            <label for="cc-number" class="control-label mb-1">Keterangan</label>
                                <textarea  name="keterangan" placeholder="Masukan Keterangan Inventaris " class="form-control" required="">{{$edit->keterangan}}</textarea>

                            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                        </div>     
                </div>

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
        </div> <!-- .content -->
@endsection
