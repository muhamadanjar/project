@extends('layouts.adminlte')
@section('alert')
   
@endsection
@section('title','Layer')
@section('content')
    <div class="box box-primary box-layer">
        <div class="box-header with-border">
            <h3 class="box-title">Data Layer</h3>
            <div class="box-tools">
            <div class="btn-group">
                <a href="#" class="btn bg-orange btn-flat btn-sm"><span class="fa fa-search"></span> Filter</a>
                <?php if(\Gate::check('create.global')){ ?>
                    <a href="{{ url('layers/tambah') }}" class="btn btn-primary btn-flat btn-sm"><span class="fa fa-plus"></span> Tambah</a>
                <?php } ?>
            </div>
            </div>
            
        </div>
            <!-- /.box-header -->
        <div class="box-body">
        	<table id="table_layer" class="display table table-responsive table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th width="3%"></th>
                        <th>Nama Layer</th>
                        <th>Url</th>
                        <th>Layer</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>

                 
            </table>

        </div>
    </div>

@endsection


