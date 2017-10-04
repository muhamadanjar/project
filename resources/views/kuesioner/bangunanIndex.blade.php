@extends('layouts.adminlte')
@section('alert')
   
@endsection
@section('title','Bangunan')
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Data Bangunan</h3>
            <div class="box-tools">
            <div class="btn-group">
            <a href="#" class="btn bg-orange cari_category btn-flat btn-sm"><span class="fa fa-search"></span> Filter</a>
            <?php if(\Gate::check('create.bangunan')){ ?>
                <a href="{{ url('kuesioner/bangunan/tambah') }}" class="btn btn-primary btn-flat btn-sm"><span class="fa fa-plus"></span> Tambah</a>
            <?php } ?>
            </div>
            </div>
            
        </div>
            <!-- /.box-header -->
        <div class="box-body">
        	<table id="table_bangunan" class="display table table-responsive table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th width="3%"></th>
                        <th>No Responden</th>
                        <th>Nama</th>
                        <th>Jenis Kontruksi</th>
                        <th>Pemanfaatan Bangunan</th>
                        <th>Sumber Informasi</th>
                    </tr>
                </thead>
                
                <tbody>
                </tbody>

                 
            </table>
        </div>
    </div>

@endsection


