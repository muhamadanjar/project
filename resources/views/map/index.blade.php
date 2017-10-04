<link rel="stylesheet" href="{{ asset('css/map.css') }}"/>
@extends('layouts.adminlte')
@section('title','Map')
@section('content')
<div class="box box-default">
    <div class="box-body">
        <div id="map_canvas"></div>
        <div id="tools"></div>
        <textarea name="points" id="points" class="form-control disabled" style="display:none" readonly="readonly"></textarea>
        <input type="hidden" name="id" id="id" value="">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </div>
</div>


@endsection

@section('js_tambahan')
<script type="text/javascript" src="{{ asset('/js/map/editor-polyline.js') }}"></script>
<script type="text/javascript">
    var map;
    var markers = [];
    var mapMinZoom = 12,mapMaxZoom = 18;
    var infoWindow;
    var host = 'https://'+window.location;

    function initialize() {
        map = new google.maps.Map(document.getElementById('map_canvas'), {
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            center: new google.maps.LatLng(-6.2380341,106.8285978),
            zoom: 13,
            mapTypeControl: false,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
                position: google.maps.ControlPosition.TOP_CENTER
            },
            zoomControl: true,
            zoomControlOptions: {
                position: google.maps.ControlPosition.TOP_LEFT
            },
            scaleControl: false,
            streetViewControl: true,
            streetViewControlOptions: {
                position: google.maps.ControlPosition.LEFT_TOP
            },
            fullscreenControl: true
        });
        initEditPolyline(map);
        //initGeolocation(map);
        //initTraffic(map);

    }
    
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBa2Wm95UhFhuixKwIEjMrPVbxTfEF1hfI&callback=initialize"></script>
<script>
    function savemap(){
        var shape_line = $('#points');
        //console.log(datapostgis);
        datapostgis = "";
        var txt = document.getElementById(id);

        var lines = txt.value.split(/\n/);

        for (var i in lines) {
            var ps = lines[i].split(/,/);

            if (ps.length >= 2) {
                console.log("PS",lines[i]);
                var countjson = ps.length;
                var last_index = countjson - 1;
                comma = (i == 0) ? "":",\n";
                datapostgis += comma+ps[1]+" "+ps[0];
            }
        }
        console.log("Postgis",datapostgis);
        var formData = {
            id: $('#id').val(),
            shape_line: JSON.stringify(polylineStore),
            postgis: datapostgis,
            //'_token': $('input[name=_token]').val(),
        };
        xhr_post('/admin/jalan/fungsi/mappost',formData);
    }
    (function($, window, document){
        $('#save').click(function(e){
            console.log(e);
            savemap();
        });
    }(jQuery, window, document));
</script>
@endsection