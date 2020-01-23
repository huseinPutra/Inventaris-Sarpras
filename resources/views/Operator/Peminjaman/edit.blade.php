@extends('layouts.template')


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
                                <strong class="card-title">Credit Card</strong>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">Edit </h3>
                                        </div>
                                        <hr>
                                        <form method="post" novalidate="novalidate" action="{{ route('Operator.Peminjaman.update',[$id]) }}">
                                        @csrf
                                        @method('patch')
                                           
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nama Peminjam</label>
                                                @if(count($peminjam) > 0)
                                                    <select data-placeholder="Choose a Country..." class="standardSelect" name="id_pegawai" tabindex="1">
                                                        @foreach($peminjam as $key => $v)
                                                            @if($v->id == $data->id_pegawai)
                                                                <option selected="" value="{{ $v->id }}">{{ $v->nama_pegawai }}</option>
                                                            @else
                                                                <option value="{{ $v->id }}">{{ $v->nama_pegawai }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                 @else
                                                    <select class="form-control mb-md" required="" disabled="">
                                                        <option>input data pegawai terlebih dahulu</option>
                                                    </select>
                                                    <span class="help-block">Data pegawai masih kosong.</span>
                                                 @endif
                                            </div>

                                                <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">Barang Yang Dipinjam</label>
                                                   @if(count($barang) > 0)
                                                        <select data-placeholder="Choose a Country..." class="standardSelect" name="id_inventaris" tabindex="1">
                                                            @foreach($barang as $key => $v)
                                                                @if($v->id == $data->id_inventaris)
                                                                    <option selected="" value="{{ $v->id }}">{{ $v->nama_inventaris }}</option>
                                                                @else
                                                                    <option value="{{ $v->id }}">{{ $v->nama_inventaris }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    @else
                                                        <select class="form-control mb-md" required="" disabled="">
                                                            <option>input data barang terlebih dahulu</option>
                                                        </select>
                                                        <span class="help-block">Data barang masih kosong.</span>
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <label for="cc-number" class="control-label mb-1">Jumlah Dipinjam</label>
                                                     <input type="number" min="0" name="jumlah" required="" placeholder="contoh : 10" title="" data-toggle="tooltip" data-trigger="hover" class="form-control" data-original-title="Masukan jumlah barang yang akan dipinjam" id="inputTooltip" value="{{ $data->jumlah_peminjaman }}">
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <input type="hidden" name="id_inventaris_before" value="{{ $data->id_inventaris }}">
                                                        <input type="hidden" name="jumlah_before" value="{{ $data->jumlah_peminjaman }}">
                                                    </div>
                                                </div>

                                               <footer class="panel-footer " >
                                                <div class="form-group">
                                                    <div class="col-md-12" align="right">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="fa fa-check"></i>
                                                             Simpan
                                                        </button>

                                                        <a href="{{ route('Operator.Peminjaman.index') }}" class="btn btn-secondary">Kembali</a>
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