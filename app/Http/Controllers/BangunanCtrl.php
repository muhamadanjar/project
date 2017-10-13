<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bangunan;
use Yajra\Datatables\Datatables;
use DB;
class BangunanCtrl extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getIndex(){
        session(['aksi'=> null]);
        return view('kuesioner.bangunanIndex');
    }
    public function getData(){
        
        $bangunan = DB::table('kuesioner_bangunan')->select(['id','no_responden', 'nama', 'jeniskontruksi', 'pemanfaatanbangunan', 'sumberinformasi']);
        
        return Datatables::of($bangunan)->make(true);

    }

    public function getDataBangunanKotaCiawi(){
        
        $bangunan = DB::table('bangunan_kota_ciawi')->select(['nama', 'sumber', 'tahun']);
        return Datatables::of($bangunan)->make(true);
    }

    public function getTambah(){
        session(['aksi'=>'add']);
        return view('kuesioner.bangunanAddEdit');
    }

    public function getEdit($id){
        session(['aksi'=>'edit']);
        $bangunan = Bangunan::find($id);
        return view('kuesioner.bangunanAddEdit')->withBangunan($bangunan);
    }

    public function postBangunan(Request $request){
        \DB::beginTransaction();
        try{
            $query = (session('aksi') == 'edit') ? Bangunan::find($request->id) : new Bangunan;
            $bangunan = $query;
            $bangunan->no_responden = $request->no_responden;
            $bangunan->kode_prov = $request->kode_prov;
            $bangunan->kode_kab = $request->kode_kab;
            $bangunan->kode_kec = $request->kode_kec;
            $bangunan->kode_kel = $request->kode_kel;
            $bangunan->jorong = $request->jorong;

            $bangunan->nama = $request->nama;
            $bangunan->alamat = $request->alamat;
            $bangunan->jenis_kelamin = $request->jenis_kelamin;
            $bangunan->usia = $request->usia;
            $bangunan->pendidikanterakhir = $request->pendidikanterakhir;
            $bangunan->statusrumahtangga = $request->statusrumahtangga;
            $bangunan->lamatinggal = $request->lamatinggal;
            $bangunan->jumlahorang = $request->jumlahorang;
            $bangunan->jumlahkk = $request->jumlahkk;
            $bangunan->statuskependudukan = $request->statuskependudukan;
            $bangunan->kepemilikanktp = $request->kepemilikanktp;
            $bangunan->kepemilikankk = $request->kepemilikankk;
            $bangunan->statuskepemilikantanah = $request->statuskepemilikantanah;
            $bangunan->statuskepemilikanrumah = $request->statuskepemilikanrumah;
            $bangunan->namapemilik = $request->namapemilik;
            $bangunan->alamatpemilik = $request->alamatpemilik;
            $bangunan->hargasewaperbulan = $request->hargasewaperbulan;
            $bangunan->jeniskontruksi = $request->jeniskontruksi;
            $bangunan->strukpbb = $request->strukpbb;
            $bangunan->luasbumi = $request->luasbumi;
            $bangunan->luasbangunan = $request->luasbangunan;
            $bangunan->kepemilikansuratimb = $request->kepemilikansuratimb;
            $bangunan->pemanfaatanbangunan = $request->pemanfaatanbangunan;
            $bangunan->sumberpenerangan = $request->sumberpenerangan;
            $bangunan->sambungantelpkabel = $request->sambungantelpkabel;
            $bangunan->jenispagarrumah = $request->jenispagarrumah;
            $bangunan->panjangpagar = $request->panjangpagar;
            $bangunan->kepemilikansumurmataair = $request->kepemilikansumurmataair;
            $bangunan->kepemilikanrumahlain = $request->kepemilikanrumahlain;
            $bangunan->kepemilikantanahlain = $request->kepemilikantanahlain;
            $bangunan->lokasitanahditempatlain = $request->lokasitanahditempatlain;
            $bangunan->pekerjaanutama = $request->pekerjaanutama;
            $bangunan->pekerjaansampingan = $request->pekerjaansampingan;
            $bangunan->totalpendapatanperbulan = $request->totalpendapatanperbulan;
            $bangunan->totalpengeluaranperbulan = $request->totalpengeluaranperbulan;
            $bangunan->pengetahuanrespondenirigasi = $request->pengetahuanrespondenirigasi;
        
            $bangunan->sumberinformasi = $request->sumberinformasi;
            $bangunan->kesediandirekolasi = $request->kesediandirekolasi;
            $bangunan->alasanpenolakanrelokasi = $request->alasanpenolakanrelokasi;
            $bangunan->bentukpergantiandisukai = $request->bentukpergantiandisukai;
            $bangunan->pendapatrespondenpemindahankolektif = $request->pendapatrespondenpemindahankolektif;

            $bangunan->foto = $request->foto;
            $bangunan->x = $request->latitude;
            $bangunan->y = $request->longitude;
            $bangunan->save();
            
            DB::commit();
            echo "Tanah Saved";
            session(['aksi'=> null]);
        } catch(Exception $e){
            \DB::rollback();
        }
        return redirect('kuesioner/bangunan');
        
    }
    public function postMap(Request $r){
        $bangunan = Bangunan::find($r->id);
        $bangunan->x = $r->x;
        $bangunan->y = $r->y;
        $bangunan->save();
        return json_encode($r);
    }
    public function postDelete($id){
        $bangunan = Bangunan::find($id);
        $bangunan->delete();

        return redirect('/kuesioner/bangunan');
    }
    public function getPeta($id){
        $bangunan = Bangunan::find($id);
        return view('kuesioner.bangunanMap')->with('bangunan',$bangunan);
    }

    public function postUpload(){
        $dir = public_path('files')."/foto/bangunan/";
        if(!is_dir($dir))
                mkdir($dir);
                $ext = pathinfo($_FILES["images"]["name"],PATHINFO_EXTENSION);
                $filename = time().'_'.urlencode(pathinfo($_FILES["images"]["name"],PATHINFO_FILENAME)).'.'.$ext;
                if(move_uploaded_file($_FILES["images"]["tmp_name"], $dir. $filename)){
                    
                    echo json_encode(array(
                        'error'=>false,
                        'dir'=>$dir,
                        'filename'=>$filename,
                        'data'=>$_FILES["images"]
                        ));
                    exit;
                }
        echo json_encode(array('error'=>true,'message'=>'Upload process error'));
        exit;
    }
}
