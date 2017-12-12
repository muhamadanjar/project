  @extends('layouts.base')
  @section('style-head')
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/bootstrap/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte/dist/css/AdminLTE.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('assets/adminlte/plugins/iCheck/square/blue.css')}}">
  <style type="text/css">
    html { 
      background: url({{ url('assets/images/bg_login.png') }}) no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }

    #trans{
      
      margin: auto;
      width: 100%;
      padding: 10px;
    }
    #trans img{
      position: absolute;
      top: 70%;
      left: 35%;
      width: 70%;
      height: 60%;
      margin-top: -250px; /* Half the height */
      margin-left: -250px;
      opacity: 0.5;
      filter: alpha(opacity=50); /* For IE8 and earlier */
    }
    .logo-box {
      position: absolute;
      width: 330px;
      right: 10%;
      top: 10%;
      
    }

    .login-box, .register-box {
      width: 330px;
      padding-top: 5%;
      margin: 5% auto ;
    }

    .login-box-body, .register-box-body {
      background: rgba(255, 255, 255, 0.5);
      padding: 20px;
      border-top: 0;
      color: #666;
      
    }

    .login-box-body .title{
      color: #fff;
      font-size: 20px;
      margin: 0;
      text-align: center;
      padding: 0 20px 20px 20px;
      opacity: 1;
    }

    .title_planar{
      color: #FFF;
      text-align: center;
      font-size: 25px;
      line-height: 0.1;
      margin: 0;
      text-align: center;
      padding: 0 20px 20px 20px;
    }

    .login-box-body label{
      color: #fff;
      font-size: 14px;
    }

    .login-page, .register-page {
        background: none;
    }

    .img-logo {
        margin: 0 auto;
        width: 100px;
        padding: 3px;
        
    }
  </style>

  @endsection



@section('body')
<div class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{ route('gerbang.postlogin') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Email" name="username">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox" name="remember"> Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
          Facebook</a>
        <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
          Google+</a>
      </div>
      <!-- /.social-auth-links -->

      <a href="#">I forgot my password</a><br>
      <a href="register.html" class="text-center">Register a new membership</a>

    </div>
    <!-- /.login-box-body -->
  </div>
</div>
@endsection

<!-- /.login-box -->
@section('script-end')
<!-- jQuery 3 -->
<script src="{{ asset('assets/adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('assets/adminlte/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{ asset('assets/adminlte/plugins/iCheck/icheck.min.js')}}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
@endsection

