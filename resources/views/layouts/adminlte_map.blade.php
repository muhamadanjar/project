
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name') }} - @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/skins/_all-skins.min.css')}}">
  <style type="text/css">
    .main-header .navbar-brand {
      color: #fff;
      padding-top: 5px;

    }
    .navbar-brand > img {
      width: 80%;
    }
  </style>

  @yield('css_tambahan')

  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-green layout-top-nav">
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
          <!--<ul class="nav navbar-nav">
            <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Link</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li class="divider"></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>-->
          <!-- Left nav -->
          <!--<ul class="nav navbar-nav">
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
            <li><a href="#">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">A long sub menu <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="disabled"><a class="disabled" href="#">Disabled item</a></li>
                        <li><a href="#">One more link</a></li>
                        <li><a href="#">Menu item 1</a></li>
                        <li><a href="#">Menu item 2</a></li>
                        <li><a href="#">Menu item 3</a></li>
                        <li><a href="#">Menu item 4</a></li>
                        <li><a href="#">Menu item 5</a></li>
                        <li><a href="#">Menu item 6</a></li>
                        <li><a href="#">Menu item 7</a></li>
                        <li><a href="#">Menu item 8</a></li>
                        <li><a href="#">Menu item 9</a></li>
                        <li><a href="#">Menu item 10</a></li>
                        <li><a href="#">Menu item 11</a></li>
                        <li><a href="#">Menu item 12</a></li>
                        <li><a href="#">Menu item 13</a></li>
                        <li><a href="#">Menu item 14</a></li>
                        <li><a href="#">Menu item 15</a></li>
                        <li><a href="#">Menu item 16</a></li>
                        <li><a href="#">Menu item 17</a></li>
                        <li><a href="#">Menu item 18</a></li>
                        <li><a href="#">Menu item 19</a></li>
                        <li><a href="#">Menu item 20</a></li>
                        <li><a href="#">Menu item 21</a></li>
                        <li><a href="#">Menu item 22</a></li>
                        <li><a href="#">Menu item 23</a></li>
                        <li><a href="#">Menu item 24</a></li>
                        <li><a href="#">Menu item 25</a></li>
                        <li><a href="#">Menu item 26</a></li>
                        <li><a href="#">Menu item 27</a></li>
                        <li><a href="#">Menu item 28</a></li>
                        <li><a href="#">Menu item 29</a></li>
                        <li><a href="#">Menu item 30</a></li>
                        <li><a href="#">Menu item 31</a></li>
                        <li><a href="#">Menu item 32</a></li>
                        <li><a href="#">Menu item 33</a></li>
                        <li><a href="#">Menu item 34</a></li>
                        <li><a href="#">Menu item 35</a></li>
                        <li><a href="#">Menu item 36</a></li>
                        <li><a href="#">Menu item 37</a></li>
                        <li><a href="#">Menu item 38</a></li>
                        <li><a href="#">Menu item 39</a></li>
                        <li><a href="#">Menu item 40</a></li>
                        <li><a href="#">Menu item 41</a></li>
                        <li><a href="#">Menu item 42</a></li>
                        <li><a href="#">Menu item 43</a></li>
                        <li><a href="#">Menu item 44</a></li>
                        <li><a href="#">Menu item 45</a></li>
                        <li><a href="#">Menu item 46</a></li>
                        <li><a href="#">Menu item 47</a></li>
                        <li><a href="#">Menu item 48</a></li>
                        <li><a href="#">Menu item 49</a></li>
                        <li><a href="#">Menu item 50</a></li>
                        <li><a href="#">Menu item 51</a></li>
                        <li><a href="#">Menu item 52</a></li>
                        <li><a href="#">Menu item 53</a></li>
                        <li><a href="#">Menu item 54</a></li>
                        <li><a href="#">Menu item 55</a></li>
                        <li><a href="#">Menu item 56</a></li>
                        <li><a href="#">Menu item 57</a></li>
                        <li><a href="#">Menu item 58</a></li>
                        <li><a href="#">Menu item 59</a></li>
                        <li><a href="#">Menu item 60</a></li>
                      </ul>
                    </li>
                    <li><a href="#">Another link</a></li>
                    <li><a href="#">One more link</a></li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>-->
      
          <!-- Right nav -->
          <!--<ul class="nav navbar-nav navbar-right">
            <li><a href="bootstrap-navbar.html">Default</a></li>
            <li><a href="bootstrap-navbar-static-top.html">Static top</a></li>
            <li class="active"><a href="bootstrap-navbar-fixed-top.html">Fixed top</a></li>
            <li><a href="bootstrap-navbar-fixed-bottom.html">Fixed bottom</a></li>
            <li><a href="#">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">A sub menu <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="disabled"><a class="disabled" href="#">Disabled item</a></li>
                    <li><a href="#">One more link</a></li>
                  </ul>
                </li>
                <li><a href="#">A separated link</a></li>
              </ul>
            </li>
          </ul>-->
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
            </div>
          </form>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        @include('master.adminlte-navbarcustommenu')
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  
  <div class="content-wrapper">
    <div class="">
    
      <section class="">
        @yield('alert')
        @yield('content')
      </section>
      @include('master.modal')
    </div>
  
  </div>
  
  <footer class="main-footer">
    @include('master.adminlte-mainfooter')
    @yield('footer')
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3.1.1 -->
<script src="{{ asset('assets/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('assets/plugins/jQueryUI/jquery-ui.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{ asset('assets/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('assets/plugins/fastclick/fastclick.js')}}"></script>
<!-- Typehead Bootstrap -->
<script src="{{ asset('assets/plugins/typehead/bootstrap-typeahead.js') }}" type="text/javascript"></script>


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



<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/app.min.js')}}"></script>

@yield('js_tambahan')

<script type="text/javascript">
  $('.modal-box').slimScroll({
    height: '250px'
  });
</script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/dist/js/demo.js')}}"></script>
</body>
</html>
