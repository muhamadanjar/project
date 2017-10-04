@extends('layouts.adminlte')
@section('content')
<?php

if(session('aksi') == 'edit'){
	$id = $tanah->id;
	$no_responden = $tanah->no_responden;
	$jorong = $tanah->jorong;
	
	$readonly = 'readonly';
}else{
	$id ='';	
	$no_responden = '';
	$jorong = '';
	
	$readonly = '';
	$kode_prov = '';
	$kode_kab = '';
	$kode_kec = '';
	$kode_kel = '';

	$nama_pemilik = '';
	$alamat_pemilik = '';
	$pemanfaatan_tanah = '';
	$kepemilikan_lahan = '';
	$foto = '';
	$x = '';
	$y = '';
}
?>

<form role="form" method="POST" enctype="multipart/form-data" action="{{ url('/kuesioner/tanah/post') }}">
	<div class="row">
		<div class="col-md-8">
			<div class="box box-default">
				<div class="box-header with-border">
					<h6 class="box-title"><i class="fa fa-user"></i> Tambah Tanah</h6>
					<a href="{{ url('kuesioner/tanah') }}" class="pull-right btn btn-sm btn-primary">
						<i class="fa fa-mail-reply"></i> Kembali</a>
				</div>
				<div class="box-body">
					
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						
						@if(session('aksi') =='edit')
						<input type="hidden" name="id" value="{{ $id }}">

						@endif
						
						<div class="form-group">
							<label>No Responden</label>
							<input type="text" class="form-control" name="no_responden" value="{{ $no_responden }}" {{ $readonly }}>
							<div class="col-md-6">
								
							</div>
						</div>

						<div class="form-group">
							<label>Nama Pemilik</label>
							<input  class="form-control" name="nama_pemilik" type="text" value="{{ $nama_pemilik }}">
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Alamat Pemilik</label>
							<textarea name="alamat_pemilik" id="alamat_pemilik" class="tinymce_sismiop form-control">{{ $alamat_pemilik }}</textarea>
							
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Nama Pemilik</label>
							<input  class="form-control" name="kepemilikan_lahan" type="text" value="{{ $kepemilikan_lahan }}">
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Pemanfaatan Tanah</label>
							<input  class="form-control" name="pemanfaatan_tanah" type="text" value="{{ $pemanfaatan_tanah }}">
							<div class="col-md-6">

							</div>
						</div>
						

						<div class="form-group">
							
							<button type="submit" class="btn btn-primary">
								Simpan
							</button>
							
						</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="box box-default">
					<div class="box-header with-border">
						<h6 class="box-title"><i class="fa fa-image"></i> Foto</h6>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-xs-6">
								<?php 
								if (file_exists(public_path('assets/foto/bangunan').'/'.$foto)) {
								?>
								<img src="{{ asset('/assets/foto/')}}/{{ $foto }}" alt="{{$no_responden}}" class="img-responsive" width="80%">
								<?php  
								}else{
								?>
								<img src="http://placehold.it/180" alt="{{$no_responden}}" class="img-responsive" width="80%">
								<?php  
								}
								?>
							</div>
							<div class="input-group margin">
								<input type="text" class="form-control bangunan_foto" readonly="readonly" name="foto" value="{{ $foto }}">
								<span class="input-group-btn">
									<input type="file" name="bangunan_file" class="hidden bangunan_file fileupload">
									<button type="button" class="btn btn-info btn-flat formUpload">Tanah!</button>
								</span>
							</div>
							<div class="col-xs-6">
								<div class="form-group">
									<label>X</label>
									<input  class="form-control" name="x" type="text" value="{{ $x }}">
									
								</div>
								<div class="form-group">
									<label>Y</label>
									<input  class="form-control" name="y" type="text" value="{{ $y }}">
									
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection

