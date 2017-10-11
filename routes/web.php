<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	//return view('welcome');
	return redirect('admin/login');
});
Route::get('/login', function () {
	return redirect('admin/login');
});
Route::get('/home', 'HomeCtrl@index')->name('home');
Route::group(['prefix'=>'admin'], function(){
	Route::get('login','AuthCtrl@showLoginForm')->name('login');
	Route::post('login','AuthCtrl@login');
	Route::get('logout','AuthCtrl@logout')->name('logout');
});
Route::group(['prefix'=>'dokumen'], function(){
	Route::get('/','DokumenCtrl@getIndex');
	Route::get('/tambah','DokumenCtrl@getTambah');
	Route::get('/array','DokumenCtrl@getInformasiArray');
	Route::get('/{id}/edit','DokumenCtrl@getEdit');
	Route::delete('/{id}/delete','DokumenCtrl@postDelete');
	Route::post('/post','DokumenCtrl@postDokumen');
	Route::get('{id}/download','DokumenCtrl@postDownload');
});
Route::group(['prefix'=>'kuesioner'], function(){
	Route::get('/bangunan','BangunanCtrl@getIndex');
	Route::get('/bangunan/getdata','BangunanCtrl@getData');
	Route::get('/bangunankotaciawi/getdata','BangunanCtrl@getDataBangunanKotaCiawi');
	
	Route::get('/bangunan/tambah','BangunanCtrl@getTambah');
	Route::get('/bangunan/{id}/ubah','BangunanCtrl@getEdit');
	Route::delete('/bangunan/{id}/hapus','BangunanCtrl@postDelete');
	Route::post('/bangunan/post','BangunanCtrl@postBangunan');
	Route::post('/bangunan/upload','BangunanCtrl@postUpload');

	Route::get('/tanah','TanahCtrl@getIndex');
	Route::get('/tanah/tambah','TanahCtrl@getTambah');
	Route::post('/tanah/post','TanahCtrl@postTanah');
});
Route::group(['prefix'=>'pengaturan'], function(){
	Route::get('user','UserCtrl@getIndex');
	Route::get('user/tambah','UserCtrl@getTambah');
	Route::post('user/post','UserCtrl@postAddEdit');
	Route::get('user/edit/{id}','UserCtrl@getUbah');
	Route::post('user/hapus/{id}','UserCtrl@postHapus');
	Route::get('user/aktif/{id}','UserCtrl@getAktifnonaktif');
	Route::get('user/gantipassword','UserCtrl@getGantiPassword');
	Route::post('user/gantipassword','UserCtrl@postGantiPassword');
	Route::get('notify/{id}', ['as' => 'notify',   'uses' => 'UserCtrl@notifyJedi']);
	Route::get('role','RoleCtrl@getIndex');
	Route::get('role/setting/{id}','RoleCtrl@getSettingRole');
});
Route::group(['prefix'=>'map'], function(){
	Route::get('/','MapCtrl@getIndex');
	Route::get('/view','MapCtrl@getViewer');
});

Route::group(array('prefix'=>'layers'), function(){
	Route::get('/','LayerCtrl@getIndex');
	Route::get('/tambah','LayerCtrl@getTambah');
	Route::post('/addedit','LayerCtrl@postTambah');
	Route::get('/{id}/ubah','LayerCtrl@getUbah');
	Route::delete('/{id}/hapus','LayerCtrl@getHapus');
	Route::get('/getdata','LayerCtrl@getData');
	Route::get('/custom','LayerCtrl@custom');
	Route::get('/layerinfo/{id}','LayerCtrl@getLayerinfo');
	Route::get('/layerinfopopup/{id}/{idx}/{layern}','LayerCtrl@getLayerinfopopup');
	Route::post('/layerinfopopup/{id}/{idx}/{layern}','LayerCtrl@postLayerinfopopup');
	Route::get('/layeresrihapus/{id}','LayerCtrl@getLayeresrihapus');
	Route::get('/setting-url','LayerCtrl@getSettingUrl');
	Route::post('/setting-url','LayerCtrl@postSettingUrl');
	
});

Route::group(array('prefix'=>'api'), function(){

	Route::post('login','WebApiCtrl@postLogin');
	Route::get('/getprovinsi',function ($id=''){
		return DB::table('provinsi')->orderBy('nama_provinsi','ASC')->get();
	});
	Route::get('/getkabupaten/{id}',function ($id='all'){
		if ($id == 'all') {
			return DB::table('kabupaten')->orderBy('nama_kabupaten','ASC')->get();
		}else{
			return DB::table('kabupaten')->where('kode_prov',$id)->orderBy('nama_kabupaten','ASC')->get();	
		}
	});
	Route::get('/getkecamatan/{id}',function ($id='all'){
		if ($id == 'all') {
			return DB::table('kecamatan')->orderBy('nama_kecamatan','ASC')->get();
		}else{
			return DB::table('kecamatan')->where('kode_kab',$id)->orderBy('nama_kecamatan','ASC')->get();	
		}
	});
	Route::get('/getdesa/{id}',function ($id='all'){
		if ($id == 'all') {
			return DB::table('kelurahan')->orderBy('nama_kelurahan','ASC')->get();
		}else{
			return DB::table('kelurahan')->where('kode_kec',$id)->orderBy('nama_kelurahan','ASC')->get();	
		}
	});

});