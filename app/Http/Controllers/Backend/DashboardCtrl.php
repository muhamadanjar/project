<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Agenda\Agenda;
use App\Agenda\RepositoryInterface;

class DashboardCtrl extends BackendCtrl
{
    public function getIndex(){
        session(['link_web'=>'dashboard']);
        
        return view('backend.dashboard.index');
    }
}
