<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ asset('template/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('template/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('template/vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('template/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{ asset('template/vendors/selectFX/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{ asset('template/vendors/jqvmap/dist/jqvmap')}}.min.css">
    <link rel="stylesheet" href="{{ asset('template/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('template/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">

    <link rel="stylesheet" href="{{ asset('template/assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendors/chosen/chosen.min.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./">{{getname()}}</a>
                <a class="navbar-brand hidden" href="./"><img src="{{ asset('template/images/logo2.png')}}" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title"></h3>
                     <li>
                        <a  href="{{route('Admin.Inventaris.index')}}"> <i class="menu-icon fa fa-dashboard"></i>Inventaris </a>
                        <a href="{{route('Admin.Peminjaman.index')}}"> <i class="menu-icon fa fa-dashboard"></i>peminjaman </a>
                        <a href="{{route('Admin.Pengembalian.index')}}"> <i class="menu-icon fa fa-dashboard"></i>Pengembalian </a>
                    </li>

                    <h3 class="menu-title">Master Data</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Kelola Data</a>

                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="{{ route('Admin.MasterData.Pegawai.index')}}">Pegawai</a></li>
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="{{ route('Admin.MasterData.Petugas.index')}}">Petugas</a></li>
                            <li><i class="menu-icon ti-themify-logo"></i><a href="{{ route('Admin.MasterData.Jenis.index')}}">Jenis</a></li>
                             <li><i class="fa fa-id-badge"></i><a href="{{ route('Admin.MasterData.Ruangan.index')}}">Ruangan</a></li>
                            <li><i class="fa fa-bars"></i><a href="{{route('Admin.MasterData.Level.index')}}">Level</a></li>
                        </ul>
                    </li>
                    <h3 class="menu-title">Perbaikan Barang</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Kelola Data</a>

                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="{{ route('Admin.Inventaris.Perbaikan.index')}}">Barang</a></li>
                        </ul>
                    </li>
                    <li>
                    <h3 class="menu-title">Laporan</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Laporan</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="{{route('Admin.Laporan.peminjaman')}}">Peminjaman</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="{{route('Admin.Laporan.pengembalian')}}">pengembalian</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="{{route('Admin.Laporan.barang')}}">Barang</a></li>
                        </ul>
                    </li>   
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

  

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{ asset('template/images/admin.jpg')}}" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>

                            <a class="nav-link" href="#"><i class="fa fa-user"></i> Notifications <span class="count">13</span></a>

                            <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a>
                            <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                           
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-us"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language">
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </header>
        <!-- end header -->
      
    <!-- begin content -->
        @yield('content')
    <!-- end content -->

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="{{ asset('template/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('template/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{ asset('template/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('template/assets/js/main.js')}}"></script>


    <script src="{{ asset('template/vendors/chart.js/dist/Chart.bundle.min.js')}}"></script>
    <script src="{{ asset('template/assets/js/dashboard.js')}}"></script>
    <script src="{{ asset('template/assets/js/widgets.js')}}"></script>
    <script src="{{ asset('template/vendors/jqvmap/dist/jquery.vmap.min.js')}}"></script>
    <script src="{{ asset('template/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>




    <script src="{{ asset('template/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('template/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('template/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('template/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('template/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{ asset('template/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{ asset('template/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{ asset('template/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('template/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('template/vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{ asset('template/assets/js/init-scripts/data-table/datatables-init.js')}}"></script>
    <script src="{{ asset('template/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    <script src="{{ asset('template/vendors/chosen/chosen.jquery.min.js')}}"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);

        jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 1,
            no_results_text: "Oops, Data Tidak DItemukan!",
            width: "100%"
        });
    });
    </script>

</body>

</html>
