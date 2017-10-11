@extends('layouts.adminlte')
@section('title','Bangunan')
@section('content')
<?php

if(session('aksi') == 'edit'){
	$id = $bangunan->id;
	$no_responden = $bangunan->no_responden;
	$kode_prov = $bangunan->kode_prov;
	$kode_kab = $bangunan->kode_kab;
	$kode_kec = $bangunan->kode_kec;
	$kode_kel = $bangunan->kode_kel;
	$jorong = $bangunan->jorong;
	$readonly = 'readonly';

	$nama = $bangunan->nama ;
	$alamat = $bangunan->alamat;
	$jenis_kelamin = $bangunan->jenis_kelamin;
	$usia = $bangunan->usia;
	$pendidikanterakhir=$bangunan->pendidikanterakhir;
	$statusrumahtangga = $bangunan->statusrumahtangga;
	$lamatinggal = $bangunan->lamatinggal;
	$jumlahorang = $bangunan->jumlahorang;
	$jumlahkk = $bangunan->jumlahkk;
	$statuskependudukan = $bangunan->statuskependudukan;
	$kepemilikanktp = $bangunan->kepemilikanktp;
	$kepemilikankk = $bangunan->kepemilikankk;
	$statuskepemilikantanah = $bangunan->statuskepemilikantanah;
	$statuskepemilikanrumah = $bangunan->statuskepemilikanrumah;
	$namapemilik = $bangunan->namapemilik;
	$alamatpemilik = $bangunan->alamatpemilik;
	$hargasewaperbulan = $bangunan->hargasewaperbulan;
	$jeniskontruksi = $bangunan->jeniskontruksi;
	$strukpbb = $bangunan->strukpbb;
	$luasbumi = $bangunan->luasbumi;
	$luasbangunan = $bangunan->luasbangunan;
	$kepemilikansuratimb= $bangunan->kepemilikansuratimb;
	$pemanfaatanbangunan = $bangunan->pemanfaatanbangunan;
	$sumberpenerangan = $bangunan->sumberpenerangan;
	$sambungantelpkabel = $bangunan->sambungantelpkabel;
	$jenispagarrumah = $bangunan->jenispagarrumah;
	$panjangpagar = $bangunan->panjangpagar;

	$kepemilikansumurmataair = $bangunan->kepemilikansumurmataair;
	$kepemilikanrumahlain = $bangunan->kepemilikanrumahlain;
	$kepemilikantanahlain = $bangunan->kepemilikantanahlain;
	$lokasitanahditempatlain = $bangunan->lokasitanahditempatlain;
	$pekerjaanutama = $bangunan->pekerjaanutama;
	$pekerjaansampingan = $bangunan->pekerjaansampingan;
	$totalpendapatanperbulan = $bangunan->totalpendapatanperbulan;
	$totalpengeluaranperbulan = $bangunan->totalpengeluaranperbulan;
	$pengetahuanrespondenirigasi = $bangunan->pengetahuanrespondenirigasi;

	$sumberinformasi = $bangunan->sumberinformasi;
	$kesediandirekolasi = $bangunan->kesediandirekolasi;
	$alasanpenolakanrelokasi = $bangunan->alasanpenolakanrelokasi;
	$bentukpergantiandisukai = $bangunan->bentukpergantiandisukai;
	$pendapatrespondenpemindahankolektif = $bangunan->pendapatrespondenpemindahankolektif;
	$x = $bangunan->x;
	$y = $bangunan->y;
	$foto = $bangunan->foto;
	
}else{
	$id ='';	
	$no_responden = '';
	$kode_prov = '';
	$kode_kab = '';
	$kode_kec = '';
	$kode_kel = '';
	$jorong = '';
	$readonly = '';


	$nama = '';
	$alamat = '';
	$jenis_kelamin = '';
	$usia = '';
	$pendidikanterakhir= '';
	$statusrumahtangga = '';
	$lamatinggal = '';
	$jumlahorang = '';
	$jumlahkk = '';
	$statuskependudukan = '';
	$kepemilikanktp = '';
	$kepemilikankk = '';
	$statuskepemilikantanah = '';
	$statuskepemilikanrumah = '';
	$namapemilik = '';
	$alamatpemilik = '';
	$hargasewaperbulan = '';
	$jeniskontruksi = '';
	$strukpbb = '';
	$luasbumi = '';
	$luasbangunan = '';
	$kepemilikansuratimb = '';
	$pemanfaatanbangunan = '';
	$sumberpenerangan = '';
	$sambungantelpkabel = '';
	$jenispagarrumah = '';
	$panjangpagar = '';

	$kepemilikansumurmataair = '';
	$kepemilikanrumahlain = '';
	$kepemilikantanahlain = '';
	$lokasitanahditempatlain = '';
	$pekerjaanutama = '';
	$pekerjaansampingan = '';
	$totalpendapatanperbulan = '';
	$totalpengeluaranperbulan = '';
	$pengetahuanrespondenirigasi = '';

	$sumberinformasi = '';
	$kesediandirekolasi = '';
	$alasanpenolakanrelokasi = '';
	$bentukpergantiandisukai = '';
	$pendapatrespondenpemindahankolektif = '';
	$x = '';
	$y = '';
	$foto = '';
	
}
?>

<form role="form" method="POST" enctype="multipart/form-data" action="{{ url('/kuesioner/tanah/post') }}">
	<div class="row">
		<div class="col-md-8">
			<div class="box box-default">
				<div class="box-header with-border">
					<h6 class="box-title"><i class="fa fa-user"></i> Tambah Bangunan</h6>
					<a href="{{ url('kuesioner/bangunan') }}" class="pull-right btn btn-sm btn-primary">
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
						<div class="col-md-6"></div>
					</div>
					<div class="form-group">
						<label>Provinsi</label>
						
						<select name="kode_prov" id="provinsi" class="form-control">
							<option value="0">----</option>
						</select>
						<div class="col-md-6"></div>
					</div>
					<div class="form-group">
						<label>Kabupaten</label>
						
						<select name="kode_kab" id="kabkota" class="form-control">
							<option value="0">----</option>
						</select>
						<div class="col-md-6"></div>
					</div>
					<div class="form-group">
						<label>Kecamatan</label>
						<select name="kode_kec" id="kecamatan" class="form-control">
							<option value="0">----</option>
						</select>
						<div class="col-md-6"></div>
					</div>
					<div class="form-group">
						<label>Nagari</label>
						
						<select name="kode_kel" id="desa" class="form-control">
							<option value="0">----</option>
						</select>
						<div class="col-md-6"></div>
					</div>

					<div class="form-group">
						<label>Jorong</label>
						<input  class="form-control" name="jorong" type="text" value="{{ $jorong }}">
						<div class="col-md-6"></div>
					</div>

						<div class="form-group">
							<label>Nama</label>
							<input  class="form-control" name="nama" type="text" value="{{ $nama }}">
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Alamat</label>
							<input  class="form-control" name="alamat" type="text" value="{{ $alamat }}">
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Jenis Kelamin</label>
							<select class="form-control" name="jenis_kelamin">
								<option value="0">-----</option>
								<option @if($jenis_kelamin == 'L') selected @endif value="L">Laki - Laki</option>
								<option @if($jenis_kelamin == 'P') selected @endif value="P">Perempuan</option>
							</select>
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Usia</label>
							<select class="form-control" name="usia">
								<option value="0">-----</option>

								<option @if($usia == '< 20 tahun') selected @endif value="< 20 tahun">< 20 tahun</option>
								<option @if($usia == '20 s.d. 30 tahun') selected @endif value="20 s.d. 30 tahun">20 s.d. 30 tahun</option>
								<option @if($usia == '> 30 s.d. 40 tahun') selected @endif value="> 30 s.d. 40 tahun">> 30 s.d. 40 tahun</option>
								<option @if($usia == '> 40 s.d. 50 tahun') selected @endif value="> 40 s.d. 50 tahun">> 40 s.d. 50 tahun</option>
								<option @if($usia == '> 50 s.d. 55 tahun') selected @endif value="> 50 s.d. 55 tahun">> 50 s.d. 55 tahun</option>
								<option @if($usia == '> 55 tahun') selected @endif value="> 55 tahun">> 55 tahun</option>
							</select>
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Pendidikan Terakhir</label>
							
							<select class="form-control" name="pendidikanterakhir">
								<option value="0">-----</option>

								<option @if($pendidikanterakhir == 'Tidak sekolah atau tidak tamat SD') selected @endif value="Tidak sekolah atau tidak tamat SD">Tidak sekolah atau tidak tamat SD</option>
								<option @if($pendidikanterakhir == 'Tamat SD / MI / sederajat') selected @endif value="Tamat SD / MI / sederajat">Tamat SD / MI / sederajat</option>
								<option @if($pendidikanterakhir == 'Tamat SMP / MTs / sederajat') selected @endif value="Tamat SMP / MTs / sederajat">Tamat SMP / MTs / sederajat</option>
								<option @if($pendidikanterakhir == 'Tamat SMA / MA / sederajat') selected @endif value="Tamat SMA / MA / sederajat">Tamat SMA / MA / sederajat</option>
								<option @if($pendidikanterakhir == 'Tamat akademi (D1 / D2 / D3)') selected @endif value="Tamat akademi (D1 / D2 / D3)">Tamat akademi (D1 / D2 / D3)</option>
								<option @if($pendidikanterakhir == 'Tamat sarjana (S1)') selected @endif value="Tamat sarjana (S1)">Tamat sarjana (S1)</option>
								<option @if($pendidikanterakhir == 'Tamat pasca sarjana (S2 / S3)') selected @endif value="Tamat pasca sarjana (S2 / S3)">Tamat pasca sarjana (S2 / S3)</option>
							</select>
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Status Rumah Tangga</label>
							<select class="form-control" name="statusrumahtangga">
								<option value="0">-----</option>
								<option @if($statusrumahtangga == 'Bapak / Suami') selected @endif value="Bapak / Suami">Bapak / Suami</option>
								<option @if($statusrumahtangga == 'Ibu / Istri') selected @endif value="Ibu / Istri">Ibu / Istri</option>
								<option @if($statusrumahtangga == 'Anak') selected @endif value="Anak">Anak</option>
							</select>
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Lama Tinggal</label>
							<select class="form-control" name="lamatinggal">
								<option value="0">-----</option>
								<option @if($lamatinggal == 'Bapak / Suami') selected @endif value="Bapak / Suami">Bapak / Suami</option>
								<option @if($lamatinggal == 'Ibu / Istri') selected @endif value="Ibu / Istri">Ibu / Istri</option>
								<option @if($lamatinggal == 'Anak') selected @endif value="Anak">Anak</option>
							</select>
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Jumlah Orang</label>
							<input  class="form-control" name="jumlahorang" type="text" value="{{ $jumlahorang }}">
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Jumlah KK</label>
							<input  class="form-control" name="jumlahkk" type="text" value="{{ $jumlahkk }}">
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Status Kependudukan</label>
							<input  class="form-control" name="statuskependudukan" type="text" value="{{ $statuskependudukan }}">
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Kepemilikan KTP</label>
							<input  class="form-control" name="kepemilikanktp" type="text" value="{{ $kepemilikanktp }}">
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Kepemilikan KK</label>
							<input  class="form-control" name="kepemilikankk" type="text" value="{{ $kepemilikankk }}">
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Status Kepemilikan Tanah</label>
							<input  class="form-control" name="statuskepemilikantanah" type="text" value="{{ $statuskepemilikantanah }}">
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Status Kepemilikan Rumah</label>
							<input  class="form-control" name="statuskepemilikanrumah" type="text" value="{{ $statuskepemilikanrumah }}">
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Nama Pemilik</label>
							<input  class="form-control" name="namapemilik" type="text" value="{{ $namapemilik }}">
							<div class="col-md-6">

							</div>
						</div>
						<div class="form-group">
							<label>Alamat Pemilik</label>
							<input  class="form-control" name="alamatpemilik" type="text" value="{{ $alamatpemilik }}">
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Harga Sewa Perbulan</label>
							<input  class="form-control" name="hargasewaperbulan" type="text" value="{{ $hargasewaperbulan }}">
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Jenis Kontruksi</label>
							<input  class="form-control" name="jeniskontruksi" type="text" value="{{ $jeniskontruksi }}">
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Struk PBB</label>
							<input  class="form-control" name="strukpbb" type="text" value="{{ $strukpbb }}">
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Luas Bumi</label>
							<input  class="form-control" name="luasbumi" type="text" placeholder="Luas Bumi" value="{{ $luasbumi }}">
							<div class="col-md-6">

							</div>
						</div>
						<div class="form-group">
							<label>Luas Bangunan</label>
							<input  class="form-control" name="luasbangunan" type="text" placeholder="Luas Bangunan" value="{{ $luasbangunan }}">
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Kepemilikan Surat IMB</label>
							<input  class="form-control" name="kepemilikansuratimb" type="text" value="{{ $kepemilikansuratimb }}">
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Pemanfaatan Bangunan</label>
							<input  class="form-control" name="pemanfaatanbangunan" type="text" value="{{ $pemanfaatanbangunan }}">
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Sumber Penerangan</label>
							<input  class="form-control" name="sumberpenerangan" type="text" value="{{ $sumberpenerangan }}">
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Sambungan Telp Kabel</label>
							<input  class="form-control" name="sambungantelpkabel" type="text" value="{{ $sambungantelpkabel }}">
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Jenis Pagar Rumah</label>
							<input  class="form-control" name="jenispagarrumah" type="text" value="{{ $jenispagarrumah }}">
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Panjang Pagar</label>
							<input  class="form-control" name="panjangpagar" type="text" value="{{ $panjangpagar }}">
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Kepemilikan Sumur Mata Air</label>
							<input  class="form-control" name="kepemilikansumurmataair" type="text" value="{{ $kepemilikansumurmataair }}">
							<div class="col-md-6">

							</div>
						</div>
						<div class="form-group">
							<label>Kepemilikan Rumah Lain</label>
							<input  class="form-control" name="kepemilikanrumahlain" type="text" value="{{ $kepemilikanrumahlain }}">
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Kepemilikan Tanah Lain</label>
							<input  class="form-control" name="kepemilikantanahlain" type="text" value="{{ $kepemilikantanahlain }}">
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Lokasi Tanah di tempat lain</label>
							<input  class="form-control" name="lokasitanahditempatlain" type="text" value="{{ $lokasitanahditempatlain }}">
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Pekerjaan Utama</label>
							<input  class="form-control" name="pekerjaanutama" type="text" value="{{ $pekerjaanutama }}">
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Pekerjaan Sampingan</label>
							<input  class="form-control" name="pekerjaansampingan" type="text" value="{{ $pekerjaansampingan }}">
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Kepemilikan KTP</label>
							<input  class="form-control" name="kepemilikanktp" type="text" value="{{ $kepemilikanktp }}">
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Total Pendapatan Perbulan</label>
							<input  class="form-control" name="totalpendapatanperbulan" type="text" value="{{ $totalpendapatanperbulan }}">
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Total Pengeluaran Perbulan</label>
							<input  class="form-control" name="totalpengeluaranperbulan" type="text" value="{{ $totalpengeluaranperbulan }}">
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Pengetahuan Responden Irigasi</label>
							<input  class="form-control" name="pengetahuanrespondenirigasi" type="text" value="{{ $pengetahuanrespondenirigasi }}">
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Sumber Informasi</label>
							<input  class="form-control" name="sumberinformasi" type="text" value="{{ $sumberinformasi }}">
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Kesedian Relokasi</label>
							<input  class="form-control" name="kesediandirekolasi" type="text" value="{{ $kesediandirekolasi }}">
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Alasan Penolakan Relokasi</label>
							<input  class="form-control" name="alasanpenolakanrelokasi" type="text" value="{{ $alasanpenolakanrelokasi }}">
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Bentuk Pergantian Disukai</label>
							<input  class="form-control" name="bentukpergantiandisukai" type="text" value="{{ $bentukpergantiandisukai }}">
							<div class="col-md-6">

							</div>
						</div>

						<div class="form-group">
							<label>Pendapat Responden Pemindahan Kolektif</label>
							<input  class="form-control" name="pendapatrespondenpemindahankolektif" type="text" value="{{ $pendapatrespondenpemindahankolektif }}">
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
							<div class="col-md-12">
								<div class="foto">
									<?php 
									if (file_exists(public_path('assets/foto/bangunan').'/'.$foto)) {
									?>
									<img src="{{ asset('/assets/foto/')}}/{{ $foto }}" alt="{{$no_responden}}" class="img-responsive _foto" width="80%">
									<?php  
									}else{
									?>
									<img src="http://placehold.it/180" alt="{{$no_responden}}" class="img-responsive _foto" width="80%">
									<?php  
									}
									?>
								</div>
								<div class="input-group margin controlupload">
									<input type="text" class="form-control bangunan_foto" readonly="readonly" name="foto" value="{{ $foto }}">
									<span class="input-group-btn">
										<input type="file" name="bangunan_file" class="hidden bangunan_file fileupload">
										<button type="button" class="btn btn-info btn-flat formUpload">Bangunan!</button>
									</span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>X</label>
									<input  class="form-control" name="x" type="text" value="{{ $x }}">
								</div>
								<div class="form-group">
									<label>Y</label>
									<input  class="form-control" name="y" type="text" value="{{ $y }}">
								</div>
								<div class="form-group">
									<button type="button">Lokasi</button>
								</div>
							</div>
							
						</div>
						
					</div>
				</div>
			</div>
	</div>
</form>
@endsection

