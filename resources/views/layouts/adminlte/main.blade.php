@extends('layouts.full.full')
@section('style-head')
@parent

@endsection
@section('script-head')
    @parent

@endsection

@section('content')
	@include('layouts.adminlte.header')
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	   
	    <section class="content-header">
	      @yield('assets-contentheader')

	    </section>

	    <!-- Main content -->
	    <section class="content">
	      @include('master.loader')
	      
	      @yield('content-backend')
	    </section>
	    
	    @include('layouts.elements.modal')
	    <!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

	@include('layouts.adminlte.control-sidebar')
@endsection

@section('script-body')
    @parent
@endsection

@section('script-end')
    @parent
@endsection