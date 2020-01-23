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
                                <strong class="card-title">Data Pegawai</strong> <button type="button" class="btn btn-primary mb-1 pull-right" data-toggle="modal" data-target="#mediumModal1"><i class="fa fa-magic"></i>&nbsp; Input Pegawai</button>
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
                                        <th>NIP</th>
                                        <th>Username</th>
                                        <th>Nama Pegawai</th>
                                        <th>Alamat</th>
                                        <th>Tanggal Register</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        @if(count($data))
                                            @foreach($data as $key =>  $val)
                                                <tr class="gradeA">
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $val->nip }}</td>
                                                    <td>{{ $val->username }}</td>
                                                    <td>
                                                        {{ $val->nama_pegawai }}
                                                    </td>
                                                    <td>{{ $val->alamat }}</td>
                                                    <td>{{ $val->created_at }}</td>
                                                    <td>
                                                        <a href="{{ route('Admin.MasterData.Pegawai.edit',[$val->id]) }}" class="btn btn-warning">Edit</a>
                                                        <a onclick="return confirm('Apa anda yakin?')" href="{{ route('Admin.MasterData.Pegawai.delete',[$val->id]) }}" class="btn btn-danger">Delete</a>
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
                                                    <h3 class="text-center">Input Pegawai</h3>
                                                </div>
                                                <hr>
                                                <form action="{{ route('Admin.MasterData.Pegawai.store')}}" method="post" novalidate="novalidate">
                                                     @csrf
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label mb-1">NIP</label>
                                                            <input type="number"  name="nip" placeholder="Masukan NiP " class="form-control" required="">
                                                        <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                                    </div>

                                                        <div class="form-group has-success">
                                                            <label for="cc-name" class="control-label mb-1">Nama Pegawai</label>
                                                                <input type="text"  name="nama_pegawai" placeholder="Masukan Nama " class="form-control" required="">
                                                            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="cc-number" class="control-label mb-1">Alamat</label>
                                                                <textarea  name="alamat" placeholder="Masukan Alamat " class="form-control" required=""></textarea>
                                                            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                                        </div>

                                                         <div class="form-group has-success">
                                                            <label for="cc-name" class="control-label mb-1">Username</label>
                                                                <input type="text"  name="username" placeholder="Masukan Username " class="form-control" required="">
                                                            <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label for="cc-number" class="control-label mb-1">Password</label>
                                                                <input type="password" id="hf-password" name="password" placeholder="Enter Password..." class="form-control">
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
