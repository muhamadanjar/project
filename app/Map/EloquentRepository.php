<?php namespace App\Map;

class EloquentRepository implements RepositoryInterface {

    private $layer;
    

    function __construct(Layer $layer){
        $this->layer = $layer;
    }

    public function getlayer(){
        return $this->layer->where('tipelayer','ol')->get();
    }

    public function getgroups(){
        return $this->layer->where('tipelayer','olgroup')->get();
    }

    public function find($id){
        return $this->layer->findOrFail($id);
    }


    public function postLayer($request,$aksi,$id=""){
        $layer = ($aksi == 'edit') ? Layer::find($id) : new Layer;
        $layer->namalayer = $request->namalayer;
        $layer->urllayer = $request->urllayer;
        $layer->kodelayer = $request->kodelayer;
        $layer->aktif = $request->aktif;
        $layer->parent_id = $request->parent_id;
        $layer->tipelayer = $request->tipelayer;
        $layer->option_opacity = $request->option_opacity;
        $layer->option_visible = $request->option_visible;
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


}
