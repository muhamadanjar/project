<?php

namespace App\Map;

use Illuminate\Database\Eloquent\Model;
use DB;
class Layer extends Model{
    protected $table = 'layer';
    protected $primaryKey = 'id';

    public function groups(Type $var = null){
        return $this->hasOne(Layer::class,'parent_id');
    }

    public function scopeGrouplayer($query){
		return $query
		->join('layer as _l', 'layer.id', '=', '_l.parent_id')
		->select(
            DB::raw('layer.id AS id_group'),
            DB::raw('layer.namalayer AS namagroup'),
            DB::raw('layer.kodelayer AS kodegroup'),
            '_l.*'
		);        
    }
}
