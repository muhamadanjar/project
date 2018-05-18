<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Map\BangunanCiawi;
use App\Map\JF;
use App\Map\Layer;
use DB;
class MapCtrl extends Controller{
    public function getIndex(){
        session(['link_web'=>'si']);
        return view('map.map');
    }

    public function getViewer(){
        return view('map.esri');
    }

    public function getBangunan(){
        $bangunan = BangunanCiawi::orderBy('nama')->limit(1000)->get();
        return json_encode($bangunan);
    }

    public function getPjuData(){
        $arr = array();
        $arr['data'] = \DB::table('lokasi_pju')->get();
        return $arr;
    }

    public function getAdminData(){
        $arr = array();
        $arr['data'] = \DB::table('admin_sultra')->get();
        return \DB::table('admin_sultra')->get();;
    }

    public function getJF(Type $var = null)
    {
        $jf = JF::orderBy('kode_ruas')->get();
        return json_decode($jf);
    }

    public function getOpMap(){
        return view('frontend.map.op');
    }

    public function getData(){
        $layer = Layer::Grouplayer()->where('_l.aktif',1)->orderBy('_l.urutanlayer','DESC')->get();
        return ($layer);
    }

    public function getDataGroup(){
        $layer = Layer::where('tipelayer','olgroup')->whereAktif(1)->orderBy('urutanlayer','DESC')->get();
        return json_encode($layer);
    }

    public function searchData(Request $request){
        $term = $request->term;
        $data = array();
        // buat database dan table provinsi
        //$query = "SELECT * FROM provinsi WHERE provinsi LIKE '%$term%' LIMIT 5";
        $q = DB::table('poi_pandeglang')
            ->whereRaw('UPPER(name) LIKE ? ',array('%'.strtoupper($term).'%'))
            ->limit('15')->get();
        foreach ($q as $key => $value) {
            $data[] = array('id'=>$value->gid,
                    'label'=>$value->name,
                    'value'=>$value->name
            );
        }
        return json_encode($data);

    }
}