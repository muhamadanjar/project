<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Kecamatan;
class HomeCtrl extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     
        return view('master.dashboard');
    }

    public function LihatSemuaPerberitahuan($value='')
    {
        
        return view('master.pemberitahuanList');
    }


    


}
