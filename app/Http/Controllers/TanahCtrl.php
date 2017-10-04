<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tanah;
use App\TanahHortikultura;

use Illuminate\Support\Facades\Gate;
use DB;
class TanahCtrl extends Controller
{
    public function getIndex(){ 
        return view('kuesioner.tanahIndex');
    }

    public function getTambah(){
        session(['aksi'=>'add']);
        return view('kuesioner.tanahAddEdit');
    }

    public function getEdit($id){
        session(['aksi'=>'edit']);
        $tanah = Tanah::find($id);
        return view('kuesioner.tanahAddEdit')->withTanah($tanah);
    }

    public function postTanah(Request $request){
        \DB::beginTransaction();
        try{
            $tanah = new Tanah();
            $tanah->no_responden = $request->no_responden;
            $tanah->jorong = $request->jorong;
            $tanah->save();
            
            $th = new TanahHortikultura();
            $th->tanah_id = $tanah->id;
            $th->namatanaman = '$request';
            $th->satu_tiga = 0;
            $th->tiga_sepuluh = 0;
            $th->lebih_sepuluh = 0;
            $th->foto = 0;
            $th->save();
            //$tanah->hortikultura->save($th);
            //$th->tanah->save($th);
            DB::commit();
            echo "Tanah Saved";
            
        } catch(Exception $e){
            \DB::rollback();
        }
        return redirect('kuesioner/tanah/tambah');
        
    }
}
