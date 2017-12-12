@extends('layouts.admin.admin')

@section('content-admin')

<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h6 class="panel-title">Manajemen User</h6>
            <div class="panel-toolbar text-right">
                <span class="subtitle">{{ count($users) }} User Terdaftar</span>
            </div>
            
            {{--<a class="btn btn-default" href="{{ route('backend.pengaturan.users.create') }}"><i class="ion-plus"></i> Tambah User</a>--}}
        </div>
        <table class="table" id="table_dom">
            <thead>
            <tr>
                <th>Nama</th>
                <th>Username/Email</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <?php $class_active = ($user->isactived==0) ? 'btn-danger':'' ?>
                <?php $fa_active = ($user->isactived==0) ? 'fa-circle':'fa-circle-o' ?>
                <?php 
							$currentuser_class = '';
							if(\Auth::user()->id == $user->id){
								$currentuser_class = 'disabled';
							}
				?>
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="text-center">
                        <form method="post" action="{{ route('backend.pengaturan.users.delete', [$user->id]) }}" class="form-delete">
                            <div class="btn-group">
                                <a href="{{ route('backend.pengaturan.users.edit', [$user->id]) }}" class="btn btn-default btn-xs">Edit</a>
                                <a href="{{ route('backend.pengaturan.users.resetpassword', [$user->id]) }}" class="btn btn-xs btn-info btn-reset-password">Reset Password</a>
                                <input type="hidden" name="_method" value="delete">
                                <button type="submit" class="btn btn-danger btn-xs btn-delete">Delete</button>
                                
                            </div>
                        </form>
                        <div class="btn-group">
					        <button data-toggle="dropdown" class="btn btn-xs {{ $class_active }} btn-icon dropdown-toggle" type="button"><i class="icon-cog4"></i><span class="caret"></span></button>
									<ul class="dropdown-menu icons-right dropdown-menu-right">
										<li><a href="{{ route('backend.pengaturan.users.edit', ['id' => $user->id]) }}"><i class="fa fa-edit"></i> Ubah</a></li>
										<li class="{{$currentuser_class}}" data-form="#frm-{{$user->id}}" 
											data-title="Hapus {{ $user->id }}" 
											data-message="Apa anda yakin menghapus {{ $user->username }} ?">
											<a class="formConfirm {{$currentuser_class}}" href="#"><i class="fa fa-trash"></i> Hapus</a>
										</li>
										<form action="{{ route('backend.pengaturan.users.delete', array($user->id) ) }}" method="post" style="display:none" id="frm-{{$user->id}}">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="_method" value="delete">
										</form>
                                        <li class="{{$currentuser_class}}"
											data-form="#frmaktif-{{$user->id}}" 
											data-title="Aktif {{ $user->id }}" 
											data-message="Apa anda yakin mengaktifkan/menonaktifkan {{ $user->username }} ?">
											<a class= "formConfirm {{$currentuser_class}}" href="#"><i class="fa {{$fa_active}}"></i> Aktif / Non Aktif</a>
										</li>
										<form action="{{ route('backend.pengaturan.users.na', array($user->id) ) }}" method="get" style="display:none" id="frmaktif-{{$user->id}}"></form>					
									</ul>
				        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop

@section('script-end')
    @parent
    <script>
        $(function(){
            $(document).on('click', '.btn-reset-password', function(e){
                e.preventDefault();
                var btn = $(e.currentTarget);

                bootbox.confirm("Password lama akan dihapus dan password baru akan digenerate secara otomatis oleh sistem. Anda yakin ingin melanjutkan?", function(result) {
                    if(result)
                    {
                        btn.button('loading');
                        $.ajax({
                            url: btn.attr('href'),
                            type: 'get',
                            dataType: 'json'
                        }).done(function(response){
                            bootbox.alert("Password baru: " + response.password);
                        }).fail(function(){
                            alert('Oops, tidak bisa melakukan perubahan password saati ini. Coba lagi beberapa saat atau hubungi admin.');
                        }).always(function(){
                            btn.button('reset');
                        });
                    }
                });

            });
        });
    </script>
    <script type="text/javascript" src="{{ url('js/sikko.js')}}"></script>
@stop