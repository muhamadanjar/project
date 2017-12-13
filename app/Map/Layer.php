<?php

namespace App\Map;

use Illuminate\Database\Eloquent\Model;
use DB;
class Layer extends Model{
    protected $table = 'layer';
    protected $primaryKey = 'id';

    public function groups(){
        return $this->belongsTo(Layer::class,'parent_id');
    }

    public function layers(){
        return $this->hasMany(Layer::class,'parent_id');
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

    public function getType(){
    	$type = DB::select( DB::raw("SHOW COLUMNS FROM $this->table WHERE Field = 'tipelayer'") )[0]->Type;
		preg_match('/^enum\((.*)\)$/', $type, $matches);
		$enum = array();
		foreach( explode(',', $matches[1]) as $value ){		
			$v = trim( $value, "'" );
			$enum = array_add($enum, $v, $v);
		}
		return $enum;
    }
}
