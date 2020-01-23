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
                                <strong class="card-title">Data Ruangan</strong> <button type="button" class="btn btn-primary mb-1 pull-right" data-toggle="modal" data-target="#mediumModal1"><i class="fa fa-magic"></i>&nbsp; Input Ruangan</button>
                            </div>

                            <div class="card-body">
                                
                            @if(count($data))
                                <table  id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            @else
                                <table class="table table-bordered table-striped mb-none">
                            @endif
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Ruangan</th>
                                        <th>Nomor Ruangan</th>
                                        <th>keterangan</th>
                                        <th>Tanggal Register</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        @if(count($data))
                                            @foreach($data as  $key => $val)
                                                <tr class="gradeA">
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $val->nama_ruangan }}</td>
                                                     <td>{{ $val->nomor_ruangan }}</td>
                                                    <td>{{ $val->keterangan }}</td>
                                                    <td>{{ $val->created_at }}</td>
                                                    <td>
                                                        <a href="{{ route('Admin.MasterData.Ruangan.edit',[$val->id]) }}" class="btn btn-warning">Edit</a>
                                                        <a onclick="return confirm('Apa anda yakin?')" href="{{ route('Admin.MasterData.Ruangan.delete',[$val->id]) }}" class="btn btn-danger">Delete</a>
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
                                                    <h3 class="text-center">Input Ruangan</h3>
                                                </div>
                                                <hr>
                                                <form action="{{ route('Admin.MasterData.Ruangan.store')}}" method="post" novalidate="novalidate">
                                                     @csrf
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label mb-1">Nama Ruangan</label>

                                                            <input type="text"  name="nama_ruangan" placeholder="Masukan Nama Ruangan " class="form-control" required="">

                                                        <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label mb-1">Nomor Ruangan</label>

                                                            <input type="number"  name="nomor_ruangan" placeholder="Masukan Nomor Ruangan " class="form-control" required="">

                                                        <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                                    </div>
                                                        <div class="form-group">
                                                            <label for="cc-number" class="control-label mb-1">Keterangan</label>

                                                                <textarea  name="keterangan" placeholder="Masukan Keterangan " class="form-control" required=""></textarea>

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
