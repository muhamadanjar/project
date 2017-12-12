<?php

namespace App\Http\Controllers\Backend;


use App\Setting;

use App\Lookup\RepositoryInterface as LookupRepository;
use App\Officer\RepositoryInterface as OfficerRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Moderator\RepositoryInterface as ModeratorRepository;
class SettingCtrl extends BackendCtrl
{
    function __construct(
        
        OfficerRepository $officer,
        ModeratorRepository $moderator,
        LookupRepository $lookup
    )
    {
        //$this->repo = $repo;
        View::share('page', '');
        $this->lookup = $lookup;
        $this->officer = $officer;
        $this->moderator = $moderator;
        //$this->sopRepo = $sopRepo;
    }
    
    public function index(){
        session(['link_web'=>'pengaturan']);
        $setting = Setting::pluck('value', 'key');
        return view('backend.setting.index', compact('setting'))->with('page', 'backend-setting');
    }

    public function store(Request $request)
    {
        with(new Setting())->saveAll($request->all());
        return redirect()->back()->with('flash.success', 'Konfigurasi berhasil diperbarui');
    }

    public function sop(){
        $casesLookup = $this->lookup->lists('kasus');
        $kasus_id = Input::get('kasus_id');
        $phases = null;
        $checklists = null;

        if($kasus_id){
            $phases = Phase::where('case_type_id', '=', $kasus_id)->get();
            $ids = array();
            foreach($phases as $phase){
                $ids[] = $phase->id;
            }
            $checklists = Checklist::whereIn('phase_id', $ids)->get();
        }
        return view('backend.setting.sop', compact('casesLookup', 'phases', 'checklists'))->with('page', 'backend-setting');
    }

    public function profile(){
        return view('backend.setting.profile');
    }
}
