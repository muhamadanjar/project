@extends('layouts.full.full')
@section('style-head')
<!-- Application stylesheet : mandatory -->
<link rel="stylesheet" href="{{ url('stylesheet/bootstrap.css')}}">
<link rel="stylesheet" href="{{ url('stylesheet/layout.css')}}">
<link rel="stylesheet" href="{{ url('stylesheet/uielement.css')}}">
<!--/ Application stylesheet -->
@endsection
@section('script-head')
    @parent
    <script type="text/javascript" src="{{ url('assets/plugins/modernizr/js/modernizr.js')}}"></script>
@endsection
@section('content')
    @include('layouts.admin.header')
    @include('layouts.admin.sidebar-left')
        <section id="main" role="main">
            <!-- START Template Container -->
            <div class="container-fluid">
                <!-- Page Header -->
                <div class="page-header page-header-block">
                    <div class="page-header-section">
                        <h4 class="title semibold">@yield('title')</h4>
                    </div>
                    <div class="page-header-section">
                        <!-- Toolbar -->
                        <div class="toolbar clearfix">
                            @yield('breadcrumb')
                            
                        </div>
                        <!--/ Toolbar -->
                    </div>
                </div>
                <!-- Page Header -->
                @yield('content-dashboard')
                
            </div>
            <!--/ END Template Container -->

            <!-- START To Top Scroller -->
            <a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
            <!--/ END To Top Scroller -->
        </section>
@endsection

@section('script-body')
    <script type="text/javascript" src="{{ url('/javascript/vendor.js')}}"></script>
    <script type="text/javascript" src="{{ url('/javascript/core.js')}}"></script>
    <script type="text/javascript" src="{{ url('/javascript/backend/app.js')}}"></script>
@endsection

