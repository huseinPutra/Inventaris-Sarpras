
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
                                <strong class="card-title">Data Inventaris</strong> <button type="button" class="btn btn-primary mb-1 pull-right" data-toggle="modal" data-target="#mediumModal1"><i class="fa fa-magic"></i>&nbsp; Input Inventaris
                        </button>
                            </div>
                            <div class="card-body">
                                
                            @if(count($Inventaris))
                                <table  id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            @else
                                <table class="table table-bordered table-striped mb-none">
                            @endif
                                <th class="text-center" ead>
                                    <tr>
                                        <th class="text-center" >No</th>
                                        <th class="text-center" >Nama Inventaris</th>
                                        <th class="text-center" >Barang Baik</th>
                                        <th class="text-center" >Barang Rusak</th>
                                        <th class="text-center" >Total Barang</th>
                                        <th class="text-center" >Jenis</th>
                                        <th class="text-center" >Ruangan</th>
                                        <th class="text-center" >Tanggal Register</th>
                                        <th class="text-center" >Aksi</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        @if(count($Inventaris))
                                            @foreach($Inventaris as $a => $val)
                                                <tr class="gradeA">
                                                    <td class="text-center">{{ $a+1}}</td>
                                                    <td class="text-center">{{ $val->nama_inventaris }}</td>
                                                    <td class="text-center">{{ $val->barang_baik}}</td>
                                                    <td class="text-center">@if( $val->barang_rusak == 0  ) - @else {{ $val->barang_rusak }} @endif</td>
                                                    <td class="text-center">{{ $val->jumlah}}</td>
                                                    <td class="text-center">{{ NamaJenis($val->id_jenis) }}</td>
                                                    <td class="text-center">{{ NamaRuangan($val->id_ruangan) }}</td>
                                                    <td class="text-center">{{ $val->created_at}}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('Admin.Inventaris.edit',[$val->id]) }}" class="btn btn-warning">Edit</a>
                                                        <a onclick="return confirm('Apa anda yakin?')" href="{{ route('Admin.Inventaris.delete',[$val->id]) }}" class="btn btn-danger">Delete</a>
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
      
                <div class="modal fade" id="mediumModal1" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Medium Modal</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <div class="card">
                            
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">Input Inventaris</h3>
                                        </div>
                                        <hr>
                                        <form action="{{ route('Admin.Inventaris.store')}}" method="post" novalidate="novalidate">
                                             @csrf
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nama Inventaris</label>

                                                    <input type="text"  name="nama_inventaris" placeholder="Masukan Nama Inventaris " class="form-control" required="">

                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="cc-exp" class="control-label mb-1">Jenis</label>
                                                            <select data-placeholder="Choose a Country..." class="standardSelect" name="id_jenis" tabindex="1">
                                                            @foreach($Jenis as $row)
                                                            <option value="{{$row->id}}">{{$row->nama_jenis}}</option>
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
                                                            <option value="{{$row->id}}">{{$row->nama_ruangan}}</option>
                                                            @endforeach
                                                        </select>
                                                            <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="cc-exp" class="control-label mb-1">Barang Baik</label>
                                                            <input  class="form-control cc-exp"  name="barang_baik" value="0" placeholder=" Contoh  : 12">
                                                            <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="cc-number" class="control-label mb-1">Keterangan</label>

                                                        <textarea  name="keterangan" placeholder="Masukan Keterangan Inventaris " class="form-control" required=""></textarea>

                                                    <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                                </div>
                                                
                                                <div>
                                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                        <span id="payment-button-amount">Simpan</span>
                                                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                    </button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
@endsection










                    