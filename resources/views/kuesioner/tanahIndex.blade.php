@extends('layouts.adminlte')
@section('alert')
   
@endsection
@section('title','Tanah')
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Data Tanah</h3>
            <div class="box-tools">
            <div class="btn-group">
            <a href="#" class="btn bg-orange cari_category btn-flat btn-sm"><span class="fa fa-search"></span> Filter</a>
            <?php if(\Gate::check('create.global')){ ?>
                <a href="{{ url('kuesioner/tanah/tambah') }}" class="btn btn-primary btn-flat btn-sm"><span class="fa fa-plus"></span> Tambah</a>
            <?php } ?>
            </div>
            </div>
            
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        	<table id="table_tanah" class="display table table-responsive table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th width="3%"></th>
                        <th>No Responden</th>
                        <th>Nama Pemilik</th>
                        <th>Kepemilikan Lahan</th>
                        <th>Pemanfaatan Tanah</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

@endsection


