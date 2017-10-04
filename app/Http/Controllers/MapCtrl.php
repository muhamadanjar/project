<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapCtrl extends Controller
{
    public function getIndex($value=''){
    	return view('map.index');
    }

    public function getViewer(){
        return view('map.viewer');
    }
}
