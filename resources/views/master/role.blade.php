@extends('layouts.adminlte')
@section('content')

	<div class="row">
		<div class="col-xs-12">
          	<div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Data Role</h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
					<table id="table_role" class="display table table-hover table-bordered" cellspacing="0" width="100%">
				        <thead>
				            <tr>
					            <th>Role</th>
					            <th >#</th>
					        </tr>
				        </thead>
				        
				        <tbody>
				        	@foreach ($role as $key => $v)
					    	<tr>
					            <td>{{ $v->name }}</td>
					            <td><a><i class="fa fa-config"></i> Setting</a></td>
					        </tr>
					        @endforeach	
				        </tbody>
				    </table>

	            </div>
           	</div>
        </div>
	</div>
	
	
@stop