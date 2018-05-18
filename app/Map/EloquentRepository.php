<?php namespace App\Map;

class EloquentRepository implements RepositoryInterface {

    private $layer;
    

    function __construct(Layer $layer){
        $this->layer = $layer;
    }

    public function getlayer(){
        return $this->layer->where('tipelayer','ol')->get();
    }

    public function getgroups($group='olgroup'){
        return $this->layer->where('tipelayer',$group)->get();
    }

    public function getlayeresri(){
        return $this->layer->where('tipelayer','esri')->get();
    }

    public function getgroupsesri(){
        return $this->layer->where('tipelayer','esrigroup')->get();
    }

    public function find($id){
        return $this->layer->findOrFail($id);
    }


    public function postLayer($request,$aksi,$id=""){
        $layer = ($aksi == 'edit') ? Layer::find($id) : new Layer;
        $layer->namalayer = $request->namalayer;
        $layer->urllayer = $request->urllayer;
        $layer->kodelayer = $request->kodelayer;
        $layer->aktif = ($request->aktif == null) ? 0 : 1 ;
        $layer->parent_id = $request->parent_id;
        $layer->tipelayer = $request->tipelayer;
        $layer->option_opacity = $request->option_opacity;
        $layer->option_visible = ($request->option_visible == null) ? 0 : 1 ;
        $layer->option_mode = $request->option_mode;
        $layer->option_style = $request->option_style;
        $layer->jsonfield = $request->jsonfield;
        $layer->save();
        return $layer;
    }

    public function delete($id){
        $layer = $this->layer->findOrFail($id);
        $layer->delete();
        return $layer;
    }

    public function countlayer($group='esri'){
        return $this->layer->where('tipelayer',$group)->count();
    }


}
