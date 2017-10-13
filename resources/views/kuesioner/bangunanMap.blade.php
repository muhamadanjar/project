<link rel="stylesheet" href="{{ asset('css/map.css') }}"/>
@extends('layouts.adminlte')
@section('title','Bangunan Map')
@section('content')
<div class="box box-default">
    <div class="box-header with-border">
		<h6 class="box-title"><i class="fa fa-building"></i> Edit Posisi Bangunan</h6>
        <span id="statussave"></span>
			<div class="btn-group pull-right">
					<button type="button" id="save" class="btn btn-sm btn-primary">
						<i class="fa fa-send"></i> Simpan
					</button>
					<a href="{{ url('kuesioner/bangunan') }}" class=" btn btn-sm btn-primary">
				<i class="fa fa-mail-reply"></i> Kembali</a>
			</div>
	</div>
    <div class="box-body">
        <div id="map_canvas"></div>
        <div id="tools"></div>
        <textarea name="points" id="points" class="form-control disabled" style="display:none" readonly="readonly"></textarea>
        <input type="hidden" id="latitude">
        <input type="hidden" id="longitude">
        <input type="hidden" name="id" id="id" value="{{$bangunan->id}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </div>
</div>

@endsection

@section('js_tambahan')
<script src="{{ url('js/map/editor-polyline.js') }}"></script>
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
        google.maps.event.addListener(map, 'click', (event) => {
            addMarker(event.latLng);
        });
        
    }

    function addMarker(latlng, i=0) {
        clearMarkers();
        var marker = new google.maps.Marker({
            map: map,
            position: latlng,
            draggable: true,
            //icon: 'assets/img/icon_map.png'
        });
        $('#latitude').val(latlng.lat());
        $('#longitude').val(latlng.lng());
        markers.push(marker);
    }

    // Sets the map on all markers in the array.
    function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
        }
    }
    // Removes the markers from the map, but keeps them in the array.
    function clearMarkers() {
        setMapOnAll(null);
    }

    function savemap(){
        var formData = {
            id: $('#id').val(),
            x:$('#latitude').val(),
            y:$('#longitude').val(),
            '_token': $('input[name=_token]').val(),
        };
        xhr_post('/kuesioner/bangunan/{{$bangunan->id}}/mappost',formData);
    }
    
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBa2Wm95UhFhuixKwIEjMrPVbxTfEF1hfI&callback=initialize"></script>
<script>
    

    (function($, window, document){
        $('#save').click(function(e){
            savemap();
        });
    }(jQuery, window, document));
</script>
@endsection