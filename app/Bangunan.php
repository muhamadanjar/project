<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bangunan extends Model
{
    protected $table = 'kuesioner_bangunan';
    protected $primaryKey = 'id';
    protected $fillable = [];

    public static $rules = array(
        'x'=>'required|min:3',
        'y' => 'required|min:3',
        'luasbumi' => 'required|min:3',
        'luasbangunan'=>'required|min:3',
        
    );
}
