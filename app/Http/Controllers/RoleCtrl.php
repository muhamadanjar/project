<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
class RoleCtrl extends Controller{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function getIndex($value=''){
    	if (! $this->authorize('access.backend')) {
           return "Halaman tidak di ijinkan :(";
        }

    	$role = Role::orderBy('id')->get();
    	return view('master.role')->withRole($role);
    }

    public function getSettingRole($id){
        if (! $this->authorize('create.role')) {
           return "I can't create edit user :(";
        }
       
        $status = 'edit';
        session(['aksi'=>$status]);
        

        return view('master.roleAddEdit')->withStatus('edit');
    }
}
