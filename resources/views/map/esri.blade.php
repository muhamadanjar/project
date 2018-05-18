
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta name="application-name" content="cmv">
        <meta name="description" content="CMV - The Configurable Map Viewer. Community supported open source mapping framework. Works with the Esri JavaScript API, ArcGIS Server, ArcGIS Online and more. Make it your own!">
        <meta name="author" content="cmv.io">
        <link rel="shortcut icon" href="{{ url('images/logo_pandeglang.png')}}">
        <title>{{ config('app.name') }}</title>
        <link rel="stylesheet" type="text/css" href="{{ url('3.19compact/esri/css/esri.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/theme/flat/flat.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/cmv-theme-overrides.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ url('assets/plugins/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/main.css')}}">
        <style>
        
        </style>
    </head>
    <body class="cmv flat">
        <div class="appHeader">
            <div class="headerLogo">
                <img alt="logo" src="{{ url('/images/logo_icon.png')}}" height="54" />
            </div>
            <div class="headerTitle">
                <span id="headerTitleSpan">
                    SIMJALA PANDEGLANG
                </span>
                <div id="subHeaderTitleSpan" class="subHeaderTitle">
                    
                </div>
            </div>
            <div class="search">
                <div id='geocodeDijit'>
                </div>
            </div>
            
            <div class="headerLinks">
                <div id="login">
                    @if(Auth::user())
                    <a href="{{ route('backend.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a> |
                    <a href="{{ route('gerbang.logout') }}"><i class="icon-user"></i> Logout</a>
                    @else
                    <a href="{{ route('gerbang.login') }}"><i class="icon-user"></i> Login</a>
                    @endif
                </div>
                <div id="helpDijit">
                </div>
                
                
            </div>
        </div>
        <script type="text/javascript">
            var s = window.location.search, q = s.match(/locale=([^&]*)/i);
            var locale = (q && q.length > 0) ? q[1] : null;
            window.dojoConfig = {
                locale: locale,
                async: true
            };
        </script>
        <!--[if lt IE 9]>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/es5-shim/4.0.3/es5-shim.min.js"></script>
        <![endif]-->
        <!--<script src="https://js.arcgis.com/3.19compact/"></script>-->
        <script src="{{ url('/3.19compact/init.js')}}"></script>
        <script src="{{ url('js/cmv/config/app.js')}}"></script>
    </body>
</html>
