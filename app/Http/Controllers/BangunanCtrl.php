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
        return view('kuesioner.bangunanIndex');
    }
    public function getData(){
        
        $bangunan = DB::table('kuesioner_bangunan')->select(['no_responden', 'nama', 'jeniskontruksi', 'pemanfaatanbangunan', 'sumberinformasi']);
        
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
        $tanah = Tanah::find($id);
        return view('kuesioner.bangunanAddEdit')->withTanah($tanah);
    }

    public function postBangunan(Request $request){
        \DB::beginTransaction();
        try{
            $bangunan = new Bangunan();
            $bangunan->no_responden = $request->no_responden;
            $bangunan->jorong = $request->jorong;
            $bangunan->foto = $request->foto;
            $bangunan->save();
            
            DB::commit();
            echo "Tanah Saved";
            
        } catch(Exception $e){
            \DB::rollback();
        }
        return redirect('kuesioner/bangunan/tambah');
        
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
