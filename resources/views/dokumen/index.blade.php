@extends('layouts.adminlte')
@section('alert')
   
@endsection
@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">DAFTAR UPLOAD DOKUMEN</h3>
            <?php if(\Gate::check('create.dokumen')){ ?>
            <a href="{{ url('dokumen/tambah') }}" class="btn btn-primary pull-right"><span class="fa fa-plus"></span> Tambah</a>
            <?php } ?>
        </div>
            <!-- /.box-header -->
        <div class="box-body">
        	<table class="display table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th></th>
                        <th>Judul Dokumen</th>
                        <th>Tanggal</th>
                        
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($dokumen as $key => $p)
                    <tr>
                        <td>
                            <div class="btn-group">
                                <button data-toggle="dropdown" class="btn btn-default btn-flat dropdown-toggle" type="button">
                                <i class="caret"></i>&nbsp;
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('dokumen',array($p->id,'edit')) }}"><i class="fa fa-edit"></i> Edit</a></li>
                                    <li data-form="#frmDelete-{{ $p->id }}" 
                                        data-title="Hapus Informasi" 
                                        data-message="Anda yakin menghapus informasi ini ?">
                                        <a href="#" class="formConfirm"><i class="fa fa-trash"></i> Hapus</a></li>
                                        <form 
                                            action="{{ url('dokumen', array($p->id,'delete')) }}" 
                                            method="post" 
                                            style="display:none" 
                                            id="frmDelete-{{ $p->id }}">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="DELETE">    
                                        </form>
                                    <li><a href="{{ url('dokumen',array($p->id,'download')) }}"><i class="fa fa-download"></i> Download</a></li>                                            
                                </ul>
                            </div>
                        </td>
                        <td>{{ $p->judul_dokumen }}</td>
                        <td>{{ $p->tanggal }}</td>
                        
                                
                    </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>
    </div>

@endsection