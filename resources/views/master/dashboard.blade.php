@extends('layouts.adminlte')
@section('assets-contentheader')
@section('title','Dashboard')
<h1>Dashboard</h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
</ol>
<div class="rt-clock">
  <span class="date"></span>&nbsp;
  <span class="hours">00</span>:
  <span class="minutes">00</span>:
  <span class="seconds">00</span>
</div>
@endsection
@section('content')



@endsection
@section('js_tambahan')
<script src="https://code.highcharts.com/highcharts.js"></script>
<!--<script src="http://code.highcharts.com/modules/exporting.js"></script>-->

@endsection