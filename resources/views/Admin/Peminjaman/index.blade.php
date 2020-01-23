
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
                                <strong class="card-title">Data Peminjaman</strong> <button type="button" class="btn btn-primary mb-1 pull-right" data-toggle="modal" data-target="#mediumModal1"><i class="fa fa-magic"></i>&nbsp; Input Peminjaman</button>
                            </div>

                                <div class="card-body">
                                    @if(count($Peminjaman))
                                        <table  id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    @else
                                        <table class="table table-bordered table-striped mb-none">
                                    @endif
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Nama Peminjaman</th>
                                            <th class="text-center">Tanggal Pinjam</th><!-- 
                                            <th class="text-center">Tanggal Kembali</th> -->
                                            <th class="text-center">Tanggal Max-kembali</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">tanggal Register</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @if(count($Peminjaman))

                                            @foreach($Peminjaman as $key => $val)
                                                <tr class="gradeA">
                                                    <td class="text-center">{{ $key+1 }}</td>
                                                    <td class="text-center">{{ NamaPegawai($val->id_pegawai) }}</td>
                                                    <td class="text-center" class="center hidden-phone">
                                                        {{ changedate($val->tanggal_pinjam) }}
                                                    </td>
                                                   <!--  <td class="text-center" class="center hidden-phone">
                                                        @if($val->tanggal_kembali)
                                                            {{ changedate($val->tanggal_kembali ) }}
                                                        @else
                                                            <span class="badge badge-warning">Belum dikembalikan</span>
                                                        @endif
                                                    </td> -->
                                                    <td class="text-center" class="center hidden-phone">
                                                        @if($val->tanggal_max_kembali)
                                                            {{ substr($val->tanggal_max_kembali, 0,10) }}
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                    
                                                <td class="text-center" class="center hidden-phone">
                                                    {!! statusPeminjaman($val->status_peminjaman) !!}</td>
                                                <td class="text-center" class="center hidden-phone">
                                                    {{ changedate($val->created_at) }}</td>
                                                <td class="text-center">
                                                    @if(!$val->status_peminjaman)

                                                        <a href="{{ route('Admin.Peminjaman.tanggalmaxkembali',[$val->id]) }}" class="btn btn-success">
                                                            <i class="fa fa-check"></i>Approve
                                                        </a>

                                                        <a href="{{ route('Admin.Peminjaman.denied',[$val->id]) }}" class="btn btn-danger">
                                                            Denied
                                                        </a>
                                                    @endif

                                                        <a href="{{ route('Admin.Peminjaman.view',[$val->id]) }}" class="btn btn-primary">Detail</a>
                                                    @if($val->status_peminjaman == 4 || $val->status_peminjaman == 2  || $val->status_peminjaman == 5)
                                                      
                                                    @else
                                                        <a href="{{ route('Admin.Peminjaman.edit',[$val->id]) }}" class="btn btn-warning">Edit</a>
                                                        @endif
                                                    

                                                    @if($val->status_peminjaman == 4 || $val->status_peminjaman == 2  || $val->status_peminjaman == 5)
                                                        <a onclick="return confirm('Apa anda yakin?')" href="{{ route('Admin.Peminjaman.delete',[$val->id]) }}" class="btn btn-danger">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr align="center" class="gradeA">
                                            <td class="text-center" colspan="11">Belum ada data :)</td>
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
                                            <h3 class="text-center">Input Peminjaman</h3>
                                        </div><hr>
                                        <form action="{{route('Admin.Peminjaman.store')}}" method="post" novalidate="novalidate">
                                             @csrf
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nama Pegawai</label>

                                                    <select data-placeholder="Pilih Data Pegawai..." class="standardSelect" name="id_pegawai" tabindex="1" required="">
                                                            @foreach($Pegawai as $row)
                                                            <option value="{{$row->id}}">{{$row->nama_pegawai}}</option>
                                                            @endforeach
                                                        </select>

                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="cc-exp" class="control-label mb-1">Input Barang</label>
                                                            <select data-placeholder="Choose a Country..." class="standardSelect" name="id_inventaris" tabindex="1">
                                                                @foreach($Inventaris as $row)
                                                                    <option value="{{$row->id}}">{{$row->nama_inventaris}}</option>
                                                                @endforeach
                                                        </select>
                                                            <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <label for="x_card_code" class="control-label mb-1">Jumlah Barang</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="jumlah" required="">
                                                            <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                           
                                                        </div>
                                                    </div>

                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="cc-number" class="control-label mb-1">Tanggal Max-Kembali</label>
                                                       <input type="date" min="{{ date('Y-m-d') }}" class="form-control" name="tanggal_max_kembali" required="">
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










                    