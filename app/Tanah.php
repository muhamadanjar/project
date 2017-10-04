<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TanahHortikultura;
use App\TanahHias;
class Tanah extends Model
{
    protected $table = 'kuesionertanah';
    protected $primaryKey = 'id';

    protected $fillable = [];

    function hortikultura(){
        return $this->hasMany(TanahHortikultura::class);
    }

    function hias(){
        return $this->hasMany(TanahHias::class);
    }

    
}
