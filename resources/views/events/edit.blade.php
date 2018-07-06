<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Events - Event Management System</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ url('../../admin/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ url('../../admin/plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ url('../../admin/plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Sweet Alert Css -->
    <link href="{{ url('../../admin/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ url('../../admin/css/style.css') }}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ url('../../admin/css/themes/all-themes.css') }}" rel="stylesheet" />

    <link href="../../plugins/multi-select/css/multi-select.css" rel="stylesheet">

    <!-- Bootstrap Spinner Css -->
    <link href="../../plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="../../plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="{{ url('user') }}">EVENT MANAGEMENT SYSTEM</a>
            </div>
        </div>
    </nav>

    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="{{ url('admin/images/user.png') }}" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ \Illuminate\Support\Facades\Auth::user()->name }}</div>
                    <div class="email">{{ \Illuminate\Support\Facades\Auth::user()->email }}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="{{ url('user/logout') }}"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="{{ url('user') }}">
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{ url('user/event') }}">
                            <span>Events</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('user/ticket') }}">
                            <span>Tickets</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('user/location') }}">
                            <span>Locations</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="legal">
                <div class="copyright">
                    &copy; 2016 - 2017 <a href="javascript:void(0);">EVENT MANAGEMENT SYSTEM</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
        </aside>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Edit Data Event
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form role="form" method="post" action="{{ url('user/event/update', $event->event_id) }}">
                                {{ csrf_field() }}
                                <label for="event_name">Nama Acara</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="event_name" name="event_name" value="{{ $event->event_name }}" class="form-control" placeholder="Masukkan Nama Acara">
                                    </div>
                                </div>
                                <label for="event_desc">Deskripsi Acara</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="event_desc" name="event_desc" value="{{ $event->event_description }}" class="form-control" placeholder="Masukkan Deskripsi Acara">
                                    </div>
                                </div>
                                <label for="event_start_date">Tanggal Mulai Event</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" id="event_start_date" name="event_start_date" value="{{ $event->event_start_date }}" class="form-control">
                                    </div>
                                </div>
                                <label for="event_end_date">Tanggal Selesai Event</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" id="event_end_date" name="event_end_date" value="{{ $event->event_end_date }}" class="form-control">
                                    </div>
                                </div>
                                <label for="event_end_date">Tanggal Selesai Event</label>
                                <div class="form-group">
                                    <?php $selected = '' ?>
                                    <select name="location_id">
                                        @foreach($locations as $data)
                                            <?php 
                                            if ($event->location_id == $data->location_id) $selected = "selected";
                                            else $selected = '';
                                            ?>

                                            <option value="{{ $data->location_id }}" <?php echo $selected ?>>{{ $data->location_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                               
                                <button type="submit" class="btn btn-lg btn-primary m-t-15 waves-effect">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="{{ url('../../admin/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ url('../../admin/plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Select Plugin Js -->
    <script src="{{ url('../../admin/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ url('../../admin/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ url('../../admin/plugins/node-waves/waves.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ url('../../admin/js/admin.js') }}"></script>

    <!-- Demo Js -->
    <script src="{{ url('../../admin/js/demo.js') }}"></script>
</body>

</html>
