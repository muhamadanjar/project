<?php

namespace App\Map;

use Illuminate\Database\Eloquent\Model;

class JF extends Model
{
    protected $connection = 'pgsql_postgis';
    protected $table = 'jf_pandeglang';

    protected $hidden = ['objectid','geom'];
}
