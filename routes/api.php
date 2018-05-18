<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getprovinsi',function ($id=''){
	return DB::table('wilayah_provinsi')->orderBy('nama_provinsi','ASC')->get();
});
Route::get('/getkabupaten/{id}',function ($id=''){
	return DB::table('wilayah_kabupaten')->where('kode_prov',$id)->orderBy('nama_kabupaten','ASC')->get();
});
Route::get('/getkecamatan/{id}',function ($id=''){
	return DB::table('wilayah_kecamatan')->where('kode_kab',$id)->get();
});
Route::get('/getdesa/{id}',function ($id=''){
	return DB::table('wilayah_desa')->where('kode_kec',$id)->get();
});