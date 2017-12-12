<?php

namespace App\Map;

use Illuminate\Database\Eloquent\Model;

class BangunanCiawi extends Model
{
    protected $connection = 'pgsql_postgis';
    protected $table = 'bangunan_kota_ciawi';

    protected $hidden = ['objectid','geom'];
}
