<?php
  if(\Auth::check()){
    $current_user = \Auth::user();
    $current_user_notif = $current_user->notifications;
    $current_user_unnotif = $current_user->unreadNotifications; 
  }
  
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="_token" content="{!! csrf_token() !!}"/>
  <meta name="csrf-token" content="{{ csrf_token() }}"/>
  <title>{{ config('app.name') }} - @yield('title')</title>
  @yield('map_inc')
  @yield('css_tambahan')
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">-->
  <link rel="stylesheet" href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  
  <link href="{{ asset('/css/loader.css') }}" rel="stylesheet" type="text/css">
  <!-- assets Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <!--<link rel="stylesheet" href="{{ asset('assets/dist/css/skins/_all-skins.min.css')}}">-->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/skins/skin-pju.min.css')}}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/iCheck/all.css')}}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/colorpicker/bootstrap-colorpicker.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/iCheck/flat/blue.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/morris/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/datepicker/datepicker3.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/select2/select2.min.css')}}"/>
  <!-- Datatable -->
  <!--<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/datatables/jquery.datatables.min.css') }}">-->

  <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/DataTables/DataTables-1.10.15/css/dataTables.bootstrap.min.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/DataTables/AutoFill-2.2.0/css/autoFill.bootstrap.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/DataTables/Buttons-1.3.1/css/buttons.bootstrap.min.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/DataTables/ColReorder-1.3.3/css/colReorder.bootstrap.min.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/DataTables/FixedColumns-3.2.2/css/fixedColumns.bootstrap.min.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/DataTables/FixedHeader-3.1.2/css/fixedHeader.bootstrap.min.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/DataTables/KeyTable-2.2.1/css/keyTable.bootstrap.min.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/DataTables/Responsive-2.1.1/css/responsive.bootstrap.min.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/DataTables/RowGroup-1.0.0/css/rowGroup.bootstrap.min.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/DataTables/RowReorder-1.2.0/css/rowReorder.bootstrap.min.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/DataTables/Scroller-1.4.2/css/scroller.bootstrap.min.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/DataTables/Select-1.2.2/css/select.bootstrap.min.css')}}"/>

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css')}}">
  
  <!--<link rel="stylesheet" type="text/css" href="{{ asset('/css/eproposal.css') }}">-->
  <link rel="icon" href="{{ asset('assets/img/logo.png') }}" type="image/png" sizes="16x16">

  <!-- jQuery 2.2.3 -->
  <script src="{{asset('assets/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
 
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-green sidebar-mini fixed sidebar-collapse">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img width="40px" src="{{ asset('assets/img/logo.png') }}"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img class="img" width="40px" src="{{ asset('assets/img/logo.png') }}"><b>SISMIOP</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      @include('master.adminlte-navbarcustommenu')
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      @if(\Auth::check())
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ url('/assets/img/user') }}/{{ \Auth::user()->foto }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ \Auth::user()->name}}</p>
          <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
        </div>
      </div>
      @endif
      <!-- search form -->
      <!--<form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>-->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      @include('master.adminlte-sidemenu')
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @if(session('route_link') == 'map')
      @yield('content')
    @else
    <section class="content-header">
      @yield('assets-contentheader')

    </section>

    <!-- Main content -->
    <section class="content">
      @include('master.loader')
      @yield('alert')
      @yield('content')
    </section>
    @endif
    @include('master.modal')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    @include('master.adminlte-mainfooter')

  </footer>

  <!-- Control Sidebar -->
  <!--<aside class="control-sidebar control-sidebar-dark">
    
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    
    <div class="tab-content">
    
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        

      </div>
      
      
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
      

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          
        </form>
      </div>
      
    </div>
  </aside>-->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<!--<script src="{{asset('assets/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>-->
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('assets/plugins/jQueryUI/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>


<!--Datatables -->
<!--<script type="text/javascript" charset="utf8" src="{{ asset('assets/plugins/datatables/jquery.datatables.min.js')}}"></script>-->

 
<!--<script type="text/javascript" src="jQuery-2.2.4/jquery-2.2.4.min.js"></script>-->
<script type="text/javascript" src="{{ asset('assets/plugins/DataTables/JSZip-3.1.3/jszip.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/DataTables/pdfmake-0.1.27/build/pdfmake.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/DataTables/pdfmake-0.1.27/build/vfs_fonts.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/DataTables/DataTables-1.10.15/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/DataTables/DataTables-1.10.15/js/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/DataTables/AutoFill-2.2.0/js/dataTables.autoFill.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/DataTables/AutoFill-2.2.0/js/autoFill.bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/DataTables/Buttons-1.3.1/js/dataTables.buttons.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/DataTables/Buttons-1.3.1/js/buttons.bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/DataTables/Buttons-1.3.1/js/buttons.colVis.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/DataTables/Buttons-1.3.1/js/buttons.flash.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/DataTables/Buttons-1.3.1/js/buttons.html5.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/DataTables/Buttons-1.3.1/js/buttons.print.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/DataTables/ColReorder-1.3.3/js/dataTables.colReorder.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/DataTables/FixedColumns-3.2.2/js/dataTables.fixedColumns.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/DataTables/FixedHeader-3.1.2/js/dataTables.fixedHeader.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/DataTables/KeyTable-2.2.1/js/dataTables.keyTable.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/DataTables/Responsive-2.1.1/js/dataTables.responsive.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/DataTables/Responsive-2.1.1/js/responsive.bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/DataTables/RowGroup-1.0.0/js/dataTables.rowGroup.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/DataTables/RowReorder-1.2.0/js/dataTables.rowReorder.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/DataTables/Scroller-1.4.2/js/dataTables.scroller.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/DataTables/Select-1.2.2/js/dataTables.select.min.js')}}"></script>


<!-- Morris.js charts -->
<script src="{{ asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{ asset('assets/plugins/morris/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('assets/plugins/knob/jquery.knob.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('assets/plugins/moment/moment.js')}}"></script>
<script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{ asset('assets/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('assets/plugins/colorpicker/bootstrap-colorpicker.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{ asset('assets/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('assets/plugins/fastclick/fastclick.js')}}"></script>
<!-- assets App -->
<script src="{{ asset('assets/dist/js/app.min.js')}}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{ asset('assets/plugins/iCheck/icheck.min.js')}}"></script>
<!-- ChartJS 1.0.1 -->
<script src="{{ asset('assets/plugins/chartjs/Chart.min.js')}}"></script>
<!-- Parsley -->
<script src="{{ asset('assets/plugins/parsley/parsley.min.js')}}"></script>
<!-- Select2 -->
<script src="{{ asset('assets/plugins/select2/select2.full.min.js')}}"></script>
<!-- assets dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets/dist/js/pages/dashboard.js')}}"></script>
<!-- FLOT CHARTS -->
<script src="{{ asset('assets/plugins/flot/jquery.flot.min.js')}}"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="{{ asset('assets/plugins/flot/jquery.flot.resize.min.js')}}"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="{{ asset('assets/plugins/flot/jquery.flot.pie.min.js')}}"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="{{ asset('assets/plugins/flot/jquery.flot.categories.min.js')}}"></script>
<script>
  window.Laravel = {};
  window.Laravel.csrfToken = '{{ csrf_token() }}';
</script>

<!-- assets for demo purposes -->
<script src="{{ asset('assets/dist/js/demo.js')}}"></script>
<script src="{{ asset('/js/sismiop.js')}}"></script>
@yield('js_tambahan')
</body>

</html>

