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

Route::get('/', function ($value=''){
	return redirect()->route('gerbang.login');
});



Route::group(['prefix'=>'gerbang'], function(){
	Route::get('login','AuthCtrl@showLoginForm')->name('gerbang.login');
	Route::post('login','AuthCtrl@login')->name('gerbang.postlogin');
	Route::get('logout','AuthCtrl@logout')->name('gerbang.logout');
});

Route::group(['prefix'=>'map','as'=>'map.'], function(){
	Route::get('/','MapCtrl@getIndex')->name('index');
	Route::get('/bangunan','MapCtrl@getBangunan')->name('getdatabangunan');
	Route::get('/op','MapCtrl@getOpMap')->name('map.op');
	Route::get('/getdata','MapCtrl@getData')->name('getdata');
	Route::get('/getdata/group','MapCtrl@getDataGroup')->name('getdatagroup');
	Route::get('/getdata/pju','MapCtrl@getPjuData')->name('getdatapju');
	Route::get('/getdata/admin','MapCtrl@getAdminData')->name('getdataadmin');
	Route::get('/searchdata','MapCtrl@searchData')->name('mapsearchdata');
	
});

Route::group(['prefix'=>'backend','as'=>'backend.','namespace' => 'Backend','middleware' => 'auth'], function(){

	Route::get('/', 'DashboardCtrl@getIndex')->name('index');
	Route::get('dashboard/index', ['as' => 'dashboard.index', 'uses' => 'DashboardCtrl@getIndex']);

	Route::group(['prefix'=>'dokumen','as'=>'dokumen.'], function(){
		Route::get('/','DokumenCtrl@getIndex')->name('index');
		Route::get('/tambah','DokumenCtrl@getTambah')->name('tambah');
		Route::get('/array','DokumenCtrl@getInformasiArray')->name('getdata');
		Route::get('/{id}/edit','DokumenCtrl@getEdit')->name('edit');
		Route::delete('/{id}/delete','DokumenCtrl@postDelete')->name('delete');
		Route::post('/post','DokumenCtrl@postDokumen')->name('post');
		Route::get('{id}/download','DokumenCtrl@postDownload')->name('download');
	});
	Route::get('setting/index', ['as' => 'setting.index', 'uses' => 'SettingCtrl@index']);
	Route::get('setting/profile', ['as' => 'setting.profile', 'uses' => 'SettingCtrl@profile']);
    //Route::get('setting/sop', ['as' => 'setting.sop', 'uses' => 'SettingCtrl@sop']);
	Route::post('setting', ['as' => 'setting.store', 'uses' => 'SettingCtrl@store']);
	Route::resource('files', 'FileCtrl');
	Route::resource('log', 'LogCtrl', ['only' => ['index', 'show']]);
	/*Route::resource('album', 'AlbumCtrl');
	Route::resource('media', 'MediaCtrl',['only'=> ['index','create','store','edit','update','destroy']]);
	Route::post('media/postimage', 'MediaCtrl@postimage')->name('media.postimage');*/

	Route::resource('layer', 'LayerCtrl',['only' => ['index', 'create', 'edit', 'destroy']]);
	Route::post('layer/post','LayerCtrl@postLayer')->name('layer.post');
	// User Profile
    Route::group(['prefix' => 'me'], function($router){
        $router->get('/', ['as' => 'me.profile', 'uses' => 'MeCtrl@index']);
        $router->post('update-password', ['as' => 'me.update_password', 'uses' => 'MeCtrl@updatePassword']);
	});
	
	Route::group(['prefix'=>'pengaturan'], function(){
		Route::get('user','UserCtrl@getIndex')->name('pengaturan.users');
		Route::get('user/tambah','UserCtrl@getTambah')->name('pengaturan.users.create');
		Route::post('user/post','UserCtrl@postAddEdit')->name('pengaturan.users.post');
		Route::get('user/edit/{id}','UserCtrl@getUbah')->name('pengaturan.users.edit');
		Route::delete('user/hapus/{id}','UserCtrl@postHapus')->name('pengaturan.users.delete');
		Route::get('user/aktif/{id}','UserCtrl@getAktifnonaktif')->name('pengaturan.users.na');
		Route::get('user/gantipassword','UserCtrl@getGantiPassword')->name('pengaturan.users.gantipassword');
		Route::post('user/gantipassword','UserCtrl@postGantiPassword')->name('pengaturan.users.gantipasswordpost');
		Route::get('user/resetpassword/{id}','UserCtrl@resetPassword')->name('pengaturan.users.resetpassword');

		Route::get('notify/{id}', ['as' => 'notify',   'uses' => 'UserCtrl@notifyJedi']);
		//Route::get('role','RoleCtrl@getIndex');
		//Route::get('role/setting/{id}','RoleCtrl@getSettingRole');
	});

});