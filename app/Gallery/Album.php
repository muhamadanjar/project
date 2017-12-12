<?php

namespace App\Gallery;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\AuditTrail\RevisionableTrait;
class Album extends Model
{
	use RevisionableTrait;
	
    protected $table = 'album';

    protected $primaryKey = 'id';

    public function media(){
    	return $this->belongTo(Media::class);
	}
	
	public function author(){
		return $this->belongsTo('App\User', 'author_id');
	}

    public function getAlbumType(){
    	$type = DB::select( DB::raw("SHOW COLUMNS FROM $this->table WHERE Field = 'type'") )[0]->Type;
		preg_match('/^enum\((.*)\)$/', $type, $matches);
		$enum = array();
		foreach( explode(',', $matches[1]) as $value ){		
			$v = trim( $value, "'" );
			$enum = array_add($enum, $v, $v);
		}
		return $enum;
    }

}
