@extends('layouts.Operator.template')


@section('content')
    <!-- start: page -->
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
                            <li><a href="{{route('Operator.Peminjaman.index')}}">Peminjaman</a></li>
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
                                <strong class="card-title">Pengembalian</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">Detail barang yang dikembalikan</h3>
                                        </div>
                                        <hr>
                                        <form method="post" novalidate="novalidate" action="{{ route('Operator.Pengembalian.prosesbarangrusak',[$id]) }}">
                                        @csrf
                                        @method('patch')
                                           
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Jumlah barang yang sudah rusak</label>
                                                <input type="number" min="0" max="{{ $jumlahtotal - $barang_baik }}" name="barang_rusak" required="" placeholder="contoh : 3" title="" data-toggle="tooltip" data-trigger="hover" class="form-control" data-original-title="Masukan jumlah barang yang sudah rusak" id="inputTooltip" value="0">
												<input type="hidden" name="jumlahtotal" value="{{ $jumlahtotal }}">
												<input type="hidden" name="id_inventaris" value="{{ $id_inventaris }}">
												<input type="hidden" name="barang_baik" value="{{ $barang_baik }}">
												<input type="hidden" name="id_peminjaman" value="{{$id}}">
                                            </div>
                                               <footer class="panel-footer " >
                                                <div class="form-group">
                                                    <div class="col-md-12" align="right">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="fa fa-check"></i>Simpan
                                                        </button>

                                                        <a href="{{ route('Operator.Pengembalian.index') }}" class="btn btn-secondary">Kembali</a>
                                                    </div>
                                                </div>
                                            </footer>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- .card -->

                    </div>
                </div>
            </div>
        </div>
                    <!--/.col-->

                   

                                           
                                                

@endsection