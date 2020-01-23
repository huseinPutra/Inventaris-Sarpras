
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
                            <li class="active">Barang</li>
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
                                <strong class="card-title">laporan Barang</strong> 
                            </div>
                            
                            <div class="card-body"> 
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Inventaris</th>
                                        <th>Nama Inventaris</th>
                                        <th>Total Barang</th>
                                        <th>Barang Baik</th>
                                        <th>Barang Rusak</th>
                                        <th>Jenis</th>
                                        <th>Ruangan</th>
                                        <th>Di-Input Oleh</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($barang))
                                        @foreach($barang as $key => $val)
                                            <tr class="gradeA">
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $val->kode_inventaris }}</td>
                                                <td>{{ $val->nama_inventaris }}</td>
                                                <td>{{ $val->jumlah }}</td>
                                                <td>{{ $val->barang_baik }}</td>
                                                <td>{{ $val->barang_rusak }}</td>
                                                <td>{{ NamaJenis($val->id_jenis) }}</td>
                                                <td>{{ NamaRuangan($val->id_ruangan) }}</td>
                                                <td>{{ NamaPetugas($val->id_petugas)}}</td>
                                                <td>{{ $val->keterangan }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr align="center" class="gradeA">
                                            <td colspan="8">Belum ada data :)</td>
                                        </tr>
                                    @endif
                                </tbody>
                                <!--  -->
                            </table>
                            </div>
                            
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div>
@endsection










                    