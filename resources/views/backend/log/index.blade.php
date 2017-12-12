@extends('layouts.admin.admin')

@section('breadcrumb')
    @parent
    <span class="trail"><i class="fa fa-angle-right"></i></span>
    <span class="trail">Log</span>
@stop

@section('content-admin')
    <div id="page-log-index">

        <form action="" class="mb">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Cari berdasar nama pengguna atau kasus posisi ..." value="{{ Input::get('q') }}">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Cari</button>
                </span>
            </div>
            <!-- /input-group -->
        </form>

        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">Log Aplikasi</h3></div>
            <table class="table table-bordered table-list list-log">
                @forelse($logs as $item)
                    
                    <tr>
                        <td class="pad">
                            <div class="">
                                {{ $item->subject_name }}
                                <a href="{{ $item['permalink'] }}" class="name btn-ajax-modal">
                                    {{ trans('event.' . $item->predicate) }}
                                    {{ $item->object_name }}
                                </a>
                            </div>
                            <div class="ell">
                                <small class="text-muted"><i class="ion-clock"></i> {{ $item['time_for_human'] }}</small>
                                
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td><span class="empty">Belum ada data</span></td></tr>
                @endforelse
            </table>
            <div class="panel-footer">{{ $logs->appends(['q' => Input::get('q')])->links() }}</div>
        </div>

    </div>

@stop

@section('script-end')
    @parent
    <script>
        $(function(){
            $('.btn-ajax-modal').on('click', function(e){
                e.preventDefault();
                $.blockUI(BLOCKUI_STYLE);

                $.get($(this).attr('href'), '', function(response, status){
                    $.unblockUI();
                    $(response).modal('show');
                    $(response).on('hidden.bs.modal', function(e){
                        $(response).remove();
                    });
                });

            });

        });
    </script>
@stop