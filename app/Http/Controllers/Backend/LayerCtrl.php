<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Map\RepositoryInterface as LayerRepository;
class LayerCtrl extends BackendCtrl{

    private $layer;
    public function __construct(LayerRepository $lr){
        $this->layer = $lr;
    }
    public function index(){
        $layer = $this->layer->getlayeresri();
        return view('backend.layer.index')->with('layer',$layer);
    }

    public function create(){
        session(['aksi'=>'tambah']);
        $group = $this->layer->getgroups('esrigroup');
        return view('backend.layer.tambah')->with('groups',$group);
    }

    public function edit($id){
        session(['aksi'=>'edit']);
        $layer = $this->layer->find($id);
        $group = $this->layer->getgroups();
        return view('backend.layer.tambah')->with('layer',$layer)->with('groups',$group);
    }

    public function postLayer(Request $request){
        $layer = $this->layer->postLayer($request,session('aksi'),$request->id);
        return redirect()->route('backend.layer.index');
    }

    public function store($request)
    {
        $this->postLayer($request);
    }

    public function update($request){
        
        $this->postLayer($request);
    }

    public function destroy($id){
        $layer = $this->layer->delete($id);
        return $layer;
    }


}
