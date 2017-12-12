@extends('layouts.adminlte')
@section('alert')
   
@endsection
@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">DAFTAR DOWNLOAD DOKUMEN</h3>
            <?php if(\Gate::check('create.dokumen')){ ?>
            <a href="{{ url('dokumen/tambah') }}" class="btn btn-primary pull-right"><span class="fa fa-plus"></span> Tambah</a>
            <?php } ?>
        </div>
            <!-- /.box-header -->
        <div class="box-body">
        	<table class="display table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Dokumen</th>
                        <th>Download</th>
                        
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($dokumen as $key => $p)
                    
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->judul_dokumen }}</td>
                        <td><a href="{{ route('backend.dokumen.download',array($p->id)) }}" class="btn btn-xs btn-success">Download</a></td>
                                
                    </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>
    </div>

@endsection