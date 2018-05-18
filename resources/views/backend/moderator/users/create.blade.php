@extends('layouts.admin.admin')
@section('title','User')
@section('content-admin')
<?php
if(session('aksi') == 'edit'){
	$id = $users->id;
	$username = $users->username;
	$name = $users->name;
	$email = $users->email;
	$password = $users->password;
	
	$readonly = 'readonly';
}else{
	$id ='';	
	$username = '';
	$name = '';
	$email = '';
	$password = '';
	$readonly = '';

}
?>
    <div>
        <form action="{{ route('backend.pengaturan.users.post')}}" method="post">
        {{ csrf_field()}}
        <div class="panel panel-default">
			<div class="panel-heading with-border">
					<h6 class="panel-title"><i class="fa fa-building"></i> Tambah User</h6>
					<div class="panel-toolbar text-right">
                        <div class="btn-group pull-right">
                            <button type="submit" class="btn btn-sm btn-primary">
                                <i class="fa fa-send ico-save"></i> Simpan
                            </button>
                            <a href="{{ route('backend.posts.index') }}" class=" btn btn-sm btn-primary">
                            <i class="fa fa-mail-reply ico-reply3"></i> Kembali</a>
                        </div>
                    </div>
			</div>
            <div class="panel-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                @if(session('aksi') =='edit')
					<input type="hidden" name="id" value="{{ $id }}">
				@endif
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control" name="name" value="{{$name}}">
                </div>
                <div class="form-group">
                    <label for="name">Username</label>
                    <input type="text" id="name" class="form-control" name="username" value="{{$username}}" @if(session('aksi') =='edit') readonly @endif>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control" name="email" value="{{$email}}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" class="form-control" name="password" value="{{$password}}">
                </div>
                @if($status == 'edit')	
					<input type="hidden" class="form-control" name="oldpassword" value="{{ $password }}">			
				@endif
                <div class="form-group">
                    <label for="">Group</label>
                    @foreach($role as $key => $group)
                    
                        <div class="checkbox">
                            <label class="checkbox-inline">
                                <input type="checkbox" name="groups[]" value="{{ $group->id }}"  @if($users->isRole($group->name)) checked @endif/>
                            {{ $group->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Proses</button>
                </div>
            </div>
        </div>
        </form>
      
    </div>
@stop
