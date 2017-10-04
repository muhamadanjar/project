<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name') }} | @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/skins/_all-skins.min.css') }}">
  <!-- SmartMenus jQuery Bootstrap Addon CSS -->
  <link href="{{ asset('assets/plugins/smartmenus/addons/bootstrap/jquery.smartmenus.bootstrap.css')}}" rel="stylesheet">
  <style type="text/css">
    .main-header .navbar-brand {
      color: #fff;
      padding-top: 5px;

    }
    .navbar-brand > img {
      width: 80%;
    }
  </style>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-green layout-top-nav fixed">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="{{ url('home') }}" class="navbar-brand"><img src="{{ asset('assets/img/logo.png')}}"></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>

        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <!--<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>-->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Aplikasi 
                <span class="pull-right-container">
                  <i class="fa fa-angle-down pull-right"></i>
                </span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{url('pju')}}"><i class="fa fa-circle-o"></i> PJU</a></li>
                <li><a href="{{url('kwh')}}"><i class="fa fa-circle-o"></i> KWH</a></li>
                <li><a href="{{url('pengawasan')}}"><i class="fa fa-circle-o"></i> Pengawasan</a></li>
                
              </ul>
            </li>
            <li>
              <a href="{{ url('map') }}">
                <i class="fa fa-map"></i> <span>Peta</span>
                <span>
                  <i></i>
                </span>
              </a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-file-text"></i> <span>Dokumen</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-down pull-right"></i>
                </span>
              </a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{ url('dokumen')}}"><i class="fa fa-circle-o"></i> Dokumen</a></li>
                <li>
                  <a href="{{url('informasi')}}">
                    <i class="fa fa-circle-o"></i> <span>Informasi</span>
                    <span>
                      <i></i>
                    </span>
                  </a>
                </li>
              </ul>
            </li>
            @if(\Auth::user()->hasRole('admin'))
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-users"></i> <span>User</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-down pull-right"></i>
                </span>
              </a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{ url('pengaturan/user')}}"><i class="fa fa-circle-o"></i> Daftar User</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> History Log</a></li>
                
              </ul>
            </li>
            @endif
          </ul>
          <!--<form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
            </div>
          </form>-->
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        @include('master.adminlte-navbarcustommenu')
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>@yield('title') <small></small></h1>
        <!--<ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Layout</a></li>
          <li class="active">Top Navigation</li>
        </ol>-->
      </section>

      <!-- Main content -->
      <section class="content">
        <!--<div class="callout callout-info">
          <h4>Tip!</h4>

          <p>Add the layout-top-nav class to the body tag to get this layout. This feature can also be used with a
            sidebar! So use this class if you want to remove the custom dropdown menus from the navbar and use regular
            links instead.</p>
        </div>
        <div class="callout callout-danger">
          <h4>Warning!</h4>

          <p>The construction of this layout differs from the normal one. In other words, the HTML markup of the navbar
            and the content will slightly differ than that of the normal layout.</p>
        </div>-->
        @yield('content')
        
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    @include('master.adminlte-mainfooter')
    @yield('footer')
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{{ asset('assets/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{ asset('assets/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('assets/plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/app.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->

@yield('js_tambahan')

<script src="{{ asset('assets/dist/js/demo.js')}}"></script>

<script src="{{ asset('/js/pju.js') }}"></script>

</body>
</html>
