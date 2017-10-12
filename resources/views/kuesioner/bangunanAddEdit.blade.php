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
	$luasbumi = 0;
	$luasbangunan = 0;
	$kepemilikansuratimb = '';
	$pemanfaatanbangunan = '';
	$sumberpenerangan = '';
	$sambungantelpkabel = '';
	$jenispagarrumah = '';
	$panjangpagar = 0;

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

<form role="form" method="POST" enctype="multipart/form-data" action="{{ url('/kuesioner/bangunan/post') }}">
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
					
					<div class="box box-widget collapsed-box informasi-proyek">
						<div class="box-header with-border">
							<div class="user-block">
								<img class="img-circle" src="http://placehold.it/128" alt="User Image">
								<span class="username"><a href="#">Profil Responden</a></span>
								<!--<span class="description">Shared publicly - 7:30 PM Today</span>-->
							</div>
							
							<div class="box-tools">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
								</button>
								
							</div>
						
						</div>
						
						<div class="box-body">
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
									<option @if($lamatinggal == '< 2 tahun') selected @endif value="< 2 tahun">< 2 tahun</option>
									<option @if($lamatinggal == '2 s.d. 5 tahun') selected @endif value="2 s.d. 5 tahun">2 s.d. 5 tahun</option>
									<option @if($lamatinggal == '> 5 s.d. 10 tahun') selected @endif value="> 5 s.d. 10 tahun">> 5 s.d. 10 tahun</option>
									<option @if($lamatinggal == '> 10 tahun') selected @endif value="> 10 tahun">> 10 tahun</option>
								</select>
								<div class="col-md-6">

								</div>
							</div>
						</div>
						
					</div>

					<div class="box box-widget collapsed-box data-sosial">
						<div class="box-header with-border">
							<div class="user-block">
								<img class="img-circle" src="http://placehold.it/128" alt="User Image">
								<span class="username"><a href="#">Data Sosial Rumah Tangga</a></span>
								<!--<span class="description">Shared publicly - 7:30 PM Today</span>-->
							</div>
							
							<div class="box-tools">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
								</button>
								
							</div>
						
						</div>
						
						<div class="box-body">
							<div class="form-group">
								<label>Jumlah Orang</label>
								<select class="form-control" name="jumlahorang">
									<option value="0">-----</option>
									<option @if($jumlahorang == '3 - 5 orang') selected @endif value="3 - 5 orang">3 - 5 orang</option>
									<option @if($jumlahorang == '6 - 8 orang') selected @endif value="6 - 8 orang">6 - 8 orang</option>
									<option @if($jumlahorang == '> 8 orang') selected @endif value="> 8 orang">> 8 orang</option>
								</select>
								<div class="col-md-6">

								</div>
							</div>

							<div class="form-group">
								<label>Jumlah KK</label>
								<select class="form-control" name="jumlahkk">
									<option value="0">-----</option>
									<option @if($jumlahkk == '1 KK') selected @endif value="1 KK">1 KK</option>
									<option @if($jumlahkk == '2 KK') selected @endif value="2 KK">2 KK</option>
									<option @if($jumlahkk == '3 KK') selected @endif value="3 KK">3 KK</option>
									<option @if($jumlahkk == '4 KK') selected @endif value="4 KK">4 KK</option>
									<option @if($jumlahkk == '5 KK') selected @endif value="5 KK">5 KK</option>
								</select>
								<div class="col-md-6">

								</div>
							</div>

							<div class="form-group">
								<label>Status Kependudukan</label>
								<select class="form-control" name="statuskependudukan">
									<option value="0">-----</option>
									<option @if($statuskependudukan == 'Suami & istri penduduk asli') selected @endif value="Suami & istri penduduk asli">Suami & istri penduduk asli</option>
									<option @if($statuskependudukan == 'Suami & istri bukan penduduk asli') selected @endif value="Suami & istri bukan penduduk asli">Suami & istri bukan penduduk asli</option>
									<option @if($statuskependudukan == 'Suami penduduk asli, istri pendatang') selected @endif value="Suami penduduk asli, istri pendatang">Suami penduduk asli, istri pendatang</option>
									<option @if($statuskependudukan == 'Istri penduduk asli, suami pendatang') selected @endif value="Istri penduduk asli, suami pendatang">Istri penduduk asli, suami pendatang</option>
									
								</select>
								<div class="col-md-6">

								</div>
							</div>

							<div class="form-group">
								<label>Kepemilikan KTP</label>
								
								<select class="form-control" name="kepemilikanktp">
									<option value="0">-----</option>
									<option @if($kepemilikanktp == 'Tidak memiliki KTP') selected @endif value="Tidak memiliki KTP">Suami & istri penduduk asli</option>
									<option @if($kepemilikanktp == 'Memiliki KTP dengan alamat yang sesuai dengan alamat rumah ini') selected @endif value="Memiliki KTP dengan alamat yang sesuai dengan alamat rumah ini">Memiliki KTP dengan alamat yang sesuai dengan alamat rumah ini</option>
									<option @if($kepemilikanktp == 'Memiliki KTP desa ini, tetapi alamatnya tidak sesuai alamat rumah ini') selected @endif value="Memiliki KTP desa ini, tetapi alamatnya tidak sesuai alamat rumah ini">Memiliki KTP desa ini, tetapi alamatnya tidak sesuai alamat rumah ini</option>
									<option @if($kepemilikanktp == 'Memiliki KTP luar desa ini') selected @endif value="Memiliki KTP luar desa ini">Memiliki KTP luar desa ini</option>
									<option @if($kepemilikanktp == 'Memiliki KTP musiman') selected @endif value="Memiliki KTP musiman">Memiliki KTP musiman</option>
									
								</select>
								
								<div class="col-md-6">

								</div>
							</div>

							<div class="form-group">
								<label>Kepemilikan KK</label>
								<select class="form-control" name="kepemilikankk">
									<option value="0">-----</option>
									<option @if($kepemilikankk == 'Tidak memiliki Kartu Keluarga') selected @endif value="Tidak memiliki KTP">Tidak memiliki Kartu Keluarga</option>
									<option @if($kepemilikankk == 'Memiliki Kartu Keluarga dengan alamat yang sesuai dengan rumah ini') selected @endif value="Memiliki Kartu Keluarga dengan alamat yang sesuai dengan rumah ini">Memiliki Kartu Keluarga dengan alamat yang sesuai dengan rumah ini</option>
									<option @if($kepemilikankk == 'Memiliki Kartu Keluarga, tetapi alamatnya tidak sesuai dengan rumah ini') selected @endif value="Memiliki Kartu Keluarga, tetapi alamatnya tidak sesuai dengan rumah ini">Memiliki Kartu Keluarga, tetapi alamatnya tidak sesuai dengan rumah ini</option>
								</select>
								<div class="col-md-6">

								</div>
							</div>
						</div>
						
					</div>

					<div class="box box-widget collapsed-box status-tanah">
						<div class="box-header with-border">
							<div class="user-block">
								<img class="img-circle" src="http://placehold.it/128" alt="User Image">
								<span class="username"><a href="#">Status Tanah, Kondisi Bangunan & Aset Lainnya</a></span>
								<!--<span class="description">Shared publicly - 7:30 PM Today</span>-->
							</div>
							
							<div class="box-tools">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
								</button>
								
							</div>
						
						</div>
						
						<div class="box-body">
							<div class="form-group">
								<label>Status Kepemilikan Tanah</label>
								<select class="form-control" name="statuskepemilikantanah">
									<option value="0">-----</option>
									<option @if($statuskepemilikantanah == 'Sertifikat Hak Milik (SHM)') selected @endif value="Sertifikat Hak Milik (SHM)">Sertifikat Hak Milik (SHM)</option>
									<option @if($statuskepemilikantanah == 'Hak Guna Bangunan (HGB)') selected @endif value="Hak Guna Bangunan (HGB)">Hak Guna Bangunan (HGB)</option>
									<option @if($statuskepemilikantanah == 'Girik') selected @endif value="Girik">Girik</option>
									<option @if($statuskepemilikantanah == 'Tanah publik / tanah negara') selected @endif value="Tanah publik / tanah negara">Tanah publik / tanah negara</option>
									<option @if($statuskepemilikantanah == 'Tanah milik orang lain') selected @endif value="Tanah milik orang lain">Tanah milik orang lain</option>
									
								</select>
								<div class="col-md-6">

								</div>
							</div>

							<div class="form-group">
								<label>Status Kepemilikan Rumah</label>
								
								<select class="form-control" name="statuskepemilikanrumah">
									<option value="0">-----</option>
									<option @if($statuskepemilikanrumah == 'Milik sendiri') selected @endif value="Milik sendiri">Milik sendiri</option>
									<option @if($statuskepemilikanrumah == 'Milik keluarga') selected @endif value="Milik keluarga">Milik keluarga</option>
									<option @if($statuskepemilikanrumah == 'Sewa bulanan') selected @endif value="Sewa bulanan">Sewa bulanan</option>
									<option @if($statuskepemilikanrumah == 'Kontrak tahunan') selected @endif value="Kontrak tahunan">Kontrak tahunan</option>
									<option @if($statuskepemilikanrumah == 'Menumpang') selected @endif value="Menumpang">Menumpang</option>
								</select>
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
								<select class="form-control" name="hargasewaperbulan">
									<option value="0">-----</option>
									<option @if($hargasewaperbulan == '< Rp 250 ribu per bulan') selected @endif value="< Rp 250 ribu per bulan">< Rp 250 ribu per bulan</option>
									<option @if($hargasewaperbulan == 'Rp 250 ribu s.d. Rp 500 per bulan') selected @endif value="Rp 250 ribu s.d. Rp 500 per bulan">Rp 250 ribu s.d. Rp 500 per bulan</option>
									<option @if($hargasewaperbulan == '> Rp 500.000 s.d. Rp  750.000 per bulan') selected @endif value="> Rp 500.000 s.d. Rp  750.000 per bulan">> Rp 500.000 s.d. Rp  750.000 per bulan</option>
									<option @if($hargasewaperbulan == '> Rp 750.000 s.d. Rp 1.000.000 per bulan') selected @endif value="> Rp 750.000 s.d. Rp 1.000.000 per bulan">> Rp 750.000 s.d. Rp 1.000.000 per bulan</option>
									<option @if($hargasewaperbulan == '> Rp 1.000.000 per bulan') selected @endif value="> Rp 1.000.000 per bulan">> Rp 1.000.000 per bulan</option>
								</select>
								<div class="col-md-6">

								</div>
							</div>

							<div class="form-group">
								<label>Jenis Kontruksi</label>
								
								<select class="form-control" name="jeniskontruksi">
									<option value="0">-----</option>
									<option @if($jeniskontruksi == 'Permanen') selected @endif value="Permanen">Permanen</option>
									<option @if($jeniskontruksi == 'Semi permanen') selected @endif value="Semi permanen">Semi permanen</option>
									<option @if($jeniskontruksi == 'Non permanen / temporer') selected @endif value="Non permanen / temporer">Non permanen / temporer</option>
								</select>
								<div class="col-md-6">

								</div>
							</div>

							<div class="form-group">
								<label>Struk PBB</label>
								
								<select class="form-control" name="strukpbb">
									<option value="0">-----</option>
									<option @if($strukpbb == 'Punya') selected @endif value="Punya">Punya</option>
									<option @if($strukpbb == 'Tidak punya') selected @endif value="Tidak punya">Tidak punya</option>
									<option @if($strukpbb == 'Tidak tahu') selected @endif value="Tidak tahu">Tidak tahu</option>
								</select>
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
								
								<select class="form-control" name="kepemilikansuratimb">
									<option value="0">-----</option>
									<option @if($kepemilikansuratimb == 'Ada, tapi untuk bangunan lama') selected @endif value="Ada, tapi untuk bangunan lama">Ada, tapi untuk bangunan lama</option>
									<option @if($kepemilikansuratimb == 'Ada untuk bangunan saat ini') selected @endif value="Ada untuk bangunan saat ini">Ada untuk bangunan saat ini</option>
									<option @if($kepemilikansuratimb == 'Sedang dibuat') selected @endif value="Sedang dibuat">Sedang dibuat</option>
									<option @if($kepemilikansuratimb == 'Tidak ada') selected @endif value="Tidak ada">Tidak ada</option>
									
								</select>
								<div class="col-md-6">

								</div>
							</div>

							<div class="form-group">
								<label>Pemanfaatan Bangunan</label>
								<select class="form-control" name="pemanfaatanbangunan">
									<option value="0">-----</option>
									<option @if($pemanfaatanbangunan == 'Hanya untuk bermukim') selected @endif value="Hanya untuk bermukiman">Hanya untuk bermukim</option>
									<option @if($pemanfaatanbangunan == 'Untuk bermukim & tempat usaha') selected @endif value="Untuk bermukim & tempat usaha">Untuk bermukim & tempat usaha</option>
									<option @if($pemanfaatanbangunan == 'Untuk bermukin & gudang penyimpanan') selected @endif value="Untuk bermukin & gudang penyimpanan">Untuk bermukin & gudang penyimpanan</option>
									<option @if($pemanfaatanbangunan == 'Untuk bermukim & tempat pertemuan warga') selected @endif value="Untuk bermukim & tempat pertemuan warga">Untuk bermukim & tempat pertemuan warga</option>
									
								</select>
								<div class="col-md-6">

								</div>
							</div>

							<div class="form-group">
								<label>Sumber Penerangan</label>
								<select class="form-control" name="sumberpenerangan">
									<option value="0">-----</option>
									<option @if($sumberpenerangan == 'Sambungan langsung dari PLN') selected @endif value="Sambungan langsung dari PLN">Sambungan langsung dari PLN</option>
									<option @if($sumberpenerangan == 'Sambungan listrik PLN dari tetangga') selected @endif value="Sambungan listrik PLN dari tetangga">Sambungan listrik PLN dari tetangga</option>
									<option @if($sumberpenerangan == 'Sambungan listrik non PLN') selected @endif value="Sambungan listrik non PLN">Sambungan listrik non PLN</option>
									<option @if($sumberpenerangan == 'Petromaks / lilin / lampu templok') selected @endif value="Petromaks / lilin / lampu templok">Petromaks / lilin / lampu templok</option>
									
								</select>
								<div class="col-md-6">

								</div>
							</div>

							<div class="form-group">
								<label>Sambungan Telp Kabel</label>
								
								<select class="form-control" name="sambungantelpkabel">
									<option value="0">-----</option>
									<option @if($sambungantelpkabel == 'Ada') selected @endif value="Ada">Ada</option>
									<option @if($sambungantelpkabel == 'Tidak Ada') selected @endif value="Tidak Ada">Tidak Ada</option>
									
								</select>
								<div class="col-md-6">

								</div>
							</div>

							<div class="form-group">
								<label>Jenis Pagar Rumah</label>
								
								<select class="form-control" name="jenispagarrumah">
									<option value="0">-----</option>
									<option @if($jenispagarrumah == 'Tanpa pagar') selected @endif value="Tanpa pagar">Tanpa pagar</option>
									<option @if($jenispagarrumah == 'Pagar tanaman') selected @endif value="Pagar tanaman">Pagar tanaman</option>
									<option @if($jenispagarrumah == 'Pagar Besi') selected @endif value="Pagar Besi">Pagar Besi</option>
									<option @if($jenispagarrumah == 'Pagar Batu') selected @endif value="Pagar Batu">Pagar Batu</option>
									<option @if($jenispagarrumah == 'Pagar Kayu') selected @endif value="Pagar Kayu">Pagar Kayu</option>
									<option @if($jenispagarrumah == 'Pagar Bambu') selected @endif value="Pagar Bambu">Pagar Bambu</option>
									<option @if($jenispagarrumah == 'Pagar Seng') selected @endif value="Pagar Seng">Pagar Seng</option>
									<option @if($jenispagarrumah == 'Pagar Kawat') selected @endif value="Pagar Kawat">Pagar Kawat</option>
									<option @if($jenispagarrumah == 'Pagar BRC') selected @endif value="Pagar BRC">Pagar BRC</option>
									
								</select>
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
								<select class="form-control" name="kepemilikansumurmataair">
									<option value="0">-----</option>
									<option @if($kepemilikansumurmataair == 'Tidak ada') selected @endif value="Tidak ada">Tidak ada</option>
									<option @if($kepemilikansumurmataair == 'Sumur timba') selected @endif value="Sumur timban">Sumur timba</option>
									<option @if($kepemilikansumurmataair == 'Sumur dengan pompa tangan') selected @endif value="Sumur dengan pompa tangan">Sumur dengan pompa tangan</option>
									<option @if($kepemilikansumurmataair == 'Sumur dengan pompa listrik biasa') selected @endif value="Sumur dengan pompa listrik biasa">Sumur dengan pompa listrik biasa</option>
									<option @if($kepemilikansumurmataair == 'Sumur dengan jet pump') selected @endif value="Sumur dengan jet pump">Sumur dengan jet pump</option>
									<option @if($kepemilikansumurmataair == 'PAM') selected @endif value="PAM">PAM</option>
									
								</select>
								<div class="col-md-6">

								</div>
							</div>
							<div class="form-group">
								<label>Kepemilikan Rumah Lain</label>
								<select class="form-control" name="kepemilikanrumahlain">
									<option value="0">-----</option>
									<option @if($kepemilikanrumahlain == 'Tidak memiliki') selected @endif value="Tidak memiliki">Tidak memiliki</option>
									<option @if($kepemilikanrumahlain == 'Memiliki di desa yang sama') selected @endif value="Memiliki di desa yang sama">Memiliki di desa yang sama</option>
									<option @if($kepemilikanrumahlain == 'Memiliki di desan lain di kabupaten yang sama') selected @endif value="Memiliki di desa yang sama">Memiliki di desa yang sama</option>
									<option @if($kepemilikanrumahlain == 'Memiliki di kab/kota lain, tetapi masih di Provinsi Sumatera Barat') selected @endif value="Memiliki di desa yang sama">Memiliki di desa yang sama</option>
									<option @if($kepemilikanrumahlain == 'Memiliki di luar Provinsi Sumatera Barat') selected @endif value="Memiliki di luar Provinsi Sumatera Barat">Memiliki di desa yang sama</option>
									
								</select>
								<div class="col-md-6">

								</div>
							</div>

							<div class="form-group">
								<label>Kepemilikan Tanah Lain</label>
								<select class="form-control" name="kepemilikantanahlain">
									<option value="0">-----</option>
									<option @if($kepemilikantanahlain == 'Memiliki') selected @endif value="Memiliki">Memiliki</option>
									<option @if($kepemilikantanahlain == 'Tidak') selected @endif value="Tidak">Tidak</option>
									
								</select>
								<div class="col-md-6">

								</div>
							</div>

							<div class="form-group">
								<label>Lokasi Tanah di tempat lain</label>
								<input  class="form-control" name="lokasitanahditempatlain" type="text" value="{{ $lokasitanahditempatlain }}">
								<select class="form-control" name="lokasitanahditempatlain">
									<option value="0">-----</option>
									<option @if($lokasitanahditempatlain == 'Di desa yang sama') selected @endif value="Di desa yang sama">Di desa yang sama</option>
									<option @if($lokasitanahditempatlain == 'Di desa lain, tetapi masih di dalam kecamatan yang sama') selected @endif value="Di desa lain, tetapi masih di dalam kecamatan yang sama">Di desa lain, tetapi masih di dalam kecamatan yang sama</option>
									<option @if($lokasitanahditempatlain == 'Di kecamatan lain, tetapi di kota/Kabupaten yang sama') selected @endif value="Di kecamatan lain, tetapi di kota/Kabupaten yang sama">Di kecamatan lain, tetapi di kota/Kabupaten yang sama</option>
									<option @if($lokasitanahditempatlain == 'Di kota /kabupatenlain, tetapi masih di Provinsi Sumatera Barat') selected @endif value="Di kota /kabupatenlain, tetapi masih di Provinsi Sumatera Barat">Di kota /kabupatenlain, tetapi masih di Provinsi Sumatera Barat</option>
									<option @if($lokasitanahditempatlain == 'Di luar Provinsi Sumatera Barat') selected @endif value="Di luar Provinsi Sumatera Barat">Di luar Provinsi Sumatera Barat</option>
									
								</select>
								<div class="col-md-6">

								</div>
							</div>
						</div>
						
					</div>

					<div class="box box-widget collapsed-box kondisi-ekonomi">
						<div class="box-header with-border">
							<div class="user-block">
								<img class="img-circle" src="http://placehold.it/128" alt="User Image">
								<span class="username"><a href="#">Kondisi Ekonomi</a></span>
								<!--<span class="description">Shared publicly - 7:30 PM Today</span>-->
							</div>
							
							<div class="box-tools">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
								</button>
								
							</div>
						
						</div>
						
						<div class="box-body">
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
						</div>
						
					</div>

					<div class="box box-widget collapsed-box informasi-proyek">
						<div class="box-header with-border">
							<div class="user-block">
								<img class="img-circle" src="http://placehold.it/128" alt="User Image">
								<span class="username"><a href="#">Kondisi Ekonomi</a></span>
								<!--<span class="description">Shared publicly - 7:30 PM Today</span>-->
							</div>
							
							<div class="box-tools">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
								</button>
								
							</div>
						
						</div>
						
						<div class="box-body">
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
									<input  class="form-control" name="latitude" type="text" value="{{ $x }}">
								</div>
								<div class="form-group">
									<label>Y</label>
									<input  class="form-control" name="longitude" type="text" value="{{ $y }}">
								</div>
								<div class="form-group">
									<button type="button" id="checkmap" class="btn btn-primary btn-flat">Lokasi</button>
									<button type="button" id="checkin" class="btn btn-primary btn-flat">Check In</button>
								</div>
							</div>
							
						</div>
						
					</div>
			</div>
          	<div class="box box-widget">
				<div class="box-header with-border">
					<div class="user-block">
						<img class="img-circle" src="http://placehold.it/128" alt="User Image">
						<span class="username"><a href="#">Wilayah</a></span>
						<!--<span class="description">Shared publicly - 7:30 PM Today</span>-->
					</div>
					
					<div class="box-tools">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				
				</div>
				
				<div class="box-body">
					<div class="form-group">
						<label>Provinsi</label>
						
						<input type="hidden" id="kode_prov" value="{{ $kode_prov }}">
						
						<select name="kode_prov" id="provinsi" class="form-control">
							<option value="0">----</option>
						</select>
						<div class="col-md-6"></div>
					</div>
					<div class="form-group">
						<label>Kabupaten</label>
						<input type="hidden" id="kode_kab" value="{{ $kode_kab }}">
						<select name="kode_kab" id="kabkota" class="form-control">
							<option value="0">----</option>
						</select>
						<div class="col-md-6"></div>
					</div>
					<div class="form-group">
						<label>Kecamatan</label>
						<input type="hidden" id="kode_kec" value="{{ $kode_kec }}">
						<select name="kode_kec" id="kecamatan" class="form-control">
							<option value="0">----</option>
						</select>
						<div class="col-md-6"></div>
					</div>
					<div class="form-group">
						<label>Nagari</label>
						<input type="hidden" id="kode_kel" value="{{ $kode_kel }}">
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
				</div>
				
          	</div>
        
        </div>
	</div>
	<div class="row">
        
   
    </div>
    
</form>
@endsection

