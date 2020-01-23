
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
                            <li><a href="#">Laporan</a></li>
                            <li class="active">Peminjaman</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-sm-12">

                                <div class="col-sm-2 offside-3">
                                    <button type="button" class="btn btn-sm social vine" style="margin-bottom: 4px">
                                        <i class="fa fa-vine"></i>
                                        <a href="">Filter Diterima</a>
                                    </button>
                                </div>

                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-sm social vine" style="margin-bottom: 4px">
                                         <i class="fa fa-vine"></i>
                                        <span>Filter Diterima</span>
                                    </button>
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-sm social vine" style="margin-bottom: 4px">
                                        <i class="fa fa-vine"></i>
                                        <span>Filter Diterima</span>
                                    </button>
                                </div>

                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-sm social vine" style="margin-bottom: 4px">
                                        <i class="fa fa-vine"></i>
                                        <span>Filter Diterima</span>
                                    </button>
                                </div>

                            </div>
                        </div>

                            <div class="form-contror">
                                <span style="text-align: right;">'</span> 
                            </div>

                            <div class="card">
                            <div class="card-header">
                                <strong class="card-title">laporan Peminjaman</strong> 
                            </div>
                            <div class="card-body">    
                                @if(count($peminjaman))
                                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                @else
                                    <table class="table table-bordered table-striped mb-none">
                                @endif
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Peminjam</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Status peminjaman</th>
                                            <th>Di Approve Oleh</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($peminjaman))
                                            @foreach($peminjaman as $key => $val)
                                                <tr class="gradeA">
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ NamaPegawai($val->id_pegawai) }}</td>
                                                    <td>{{ changedate($val->tanggal_pinjam) }}</td>
                                                    <td>
                                                        @if($val->tanggal_kembali)
                                                            {!! changedate($val->tanggal_kembali) !!}
                                                        @else
                                                            <span class="badge badge-warning">Belum Dikembalikan</span>
                                                        @endif
                                                    </td>
                                                    <td align="center">{!! statusPeminjaman($val->status_peminjaman) !!}</td>
                                                    <td>{!! NamaPetugas($val->id_petugas) !!}</td>
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










                    