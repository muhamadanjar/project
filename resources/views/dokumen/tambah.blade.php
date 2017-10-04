@extends('layouts.adminlte')

@section('content')
  <?php
    $id = '';
    $judul_dokumen='';
    $tanggal='';
    $upload = '';
    
    if (session('aksi') == 'edit') {
      $id = $dokumen->id;
      $judul_dokumen = $dokumen->judul_dokumen;
      $tanggal= $dokumen->tanggal;
      $upload = $dokumen->upload;
      

      
    }
  ?>
<form role="form" method="post" action="{{ url('dokumen/post')}}" enctype='multipart/form-data'>
  {{ csrf_field() }}
  <div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title"> Informasi</h3>
            </div>
            <div class="box-body">
                <input type="hidden" name="id" class="form-control" id="id" value="{{$id}}">
                <div class="form-group">
                  <label for="judul_info">Judul Dokumen</label>
                  <input type="text" name="judul_dokumen" class="form-control" id="judul_info" value="{{$judul_dokumen}}">
                </div>
                

                <div class="form-group">
                  <label for="tanggal">Tanggal</label>
                  <input type="text" name="tanggal" class="form-control datepicker" id="tanggal" value="{{$tanggal}}">
                </div>

                <div class="form-group">
                  <label for="tanggal">File Upload</label>
                  <input type="file" name="upload" class="form-control" id="upload">
                </div>
                
                
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
            </div>
        </div>
    </div>
  </div>
        
</form>
@endsection

@section('js_tambahan')
<script type="text/javascript" src="{{ asset('assets/plugins/tinymce/tinymce.min.js')}}"></script>
@endsection
