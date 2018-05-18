<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Moderator\RepositoryInterface as ModeratorInterface;
//use App\Post\RepositoryInterface as PostInterface;
use App\AuditTrail\Activity\RepositoryInterface as ActivityInterface;
use App\Map\RepositoryInterface as LayerInterface;
use DB;
class DashboardCtrl extends BackendCtrl
{
	public function __construct(
        ModeratorInterface $mi,
        //PostInterface $post,
        LayerInterface $li,
        ActivityInterface $activity){
        $this->user = $mi;
        //$this->post = $post;
        //$this->agenda = $agenda;
        $this->li = $li;
        $this->activity = $activity;

    }

    public function getIndex(){
        session(['link_web'=>'dashboard']);
        
        $countuser = $this->user->countUser();

        $datastatistik = $this->activity->statistikPengunjung();
        $chartstatistik = $this->getChartStatistik();
        $countlayer = $this->li->countlayer('esri');

        return view('backend.dashboard.index')
        ->with('datastatistik',$datastatistik)
        ->with('chartstatistik',$chartstatistik)
        ->with('countlayer',$countlayer)
        ->with('countuser',$countuser);
    }

    public function getChartStatistik(){
        $chartbar = $this->activity->statistikPengunjung();
        $arr = array();
        $category = array();
        $total = 0;
        $month = 0;
        $data = [];
        
        foreach ($chartbar as $key => $value) {
            array_push($category,date('M',mktime(date('H'),date('i'),date('s'),$value->bulan,date('j'),$value->tahun)));
            array_push($data, $value->total_bulan);
            $arr['chart'][$key]['name'] = date('M',mktime(0,0,0,$value->bulan,0,$value->tahun));
            $arr['chart'][$key]['data'] = $data;
            $total += $value->total_bulan;
        }
        //$arr['chart'][0]['name'] = 'Statistik';
        //$arr['chart'][0]['data'] = $data;
        $arr['category'] = $category;
        $arr['total'] = $total;
        return json_encode($arr);
    }
}
