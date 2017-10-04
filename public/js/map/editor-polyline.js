var markers = [],polylineStore = [];
var polyline,datapostgis ='';
var id = "points";
var start ='li_start',stop = 'li_stop',clear = 'li_clear',save = 'li_save';
var drawingmode = false;
var path = [];
var mapMinZoom = 12;
var mapMaxZoom = 18;
var google;

function initEditPolyline(map) {
    var div = document.createElement('div');
    div.id = 'aksi-editor';
    div.className = 'btn-group';
    var buttontext = document.createElement('button');
    buttontext.className = 'btn btn-default';
    buttontext.textContent = 'Edit';
    buttontext.type = 'button';
    div.appendChild(buttontext);
    var buttonToggle = document.createElement('button');
    buttonToggle.className = 'btn btn-default btn-flat dropdown-toggle';
    buttonToggle.type = 'button';
    buttonToggle.dataset.toggle = 'dropdown';
    buttonToggle.innerHTML = '<i class="caret"></i>&nbsp;';
    div.appendChild(buttonToggle);

    var ul = document.createElement('ul');
    ul.className = 'dropdown-menu icons-right dropdown-menu-right';
    var _start = document.createElement('li');
    _start.id = 'li_start';
        var a_start = document.createElement('a');
        a_start.textContent = 'Mulai Edit';
        a_start.href = '#';
        var _this = this;
        a_start.addEventListener("click", function(e){
            console.log(window);
            window.startEditing();
        });
        _start.appendChild(a_start);
    ul.appendChild(_start);

    var _stop = document.createElement('li');
    _stop.id = 'li_stop';
    _stop.className = 'disabled';
        var a_stop = document.createElement('a');
        a_stop.textContent = 'Berhenti Edit';
        a_stop.href = '#';
        _stop.appendChild(a_stop);
        a_stop.addEventListener("click", function(e){
            console.log(window);
            window.stopEditing();
        });
    ul.appendChild(_stop);

    var _clear = document.createElement('li');
    _clear.id = 'li_clear';
    _clear.className = 'disabled';
        var a_clear = document.createElement('a');
        a_clear.textContent = 'Hilangkan';
        a_clear.href = '#';
        _clear.appendChild(a_clear);
        a_clear.addEventListener("click", function(e){
            console.log(window);
            window.clearEditing();
        });
        
    ul.appendChild(_clear);

    var _save = document.createElement('li');
    _save.id = 'li_save';
    _save.className = 'disabled';
        var a_save = document.createElement('a');
        a_save.id = "save";
        a_save.textContent = 'Simpan';
        a_save.href = '#';
        _save.appendChild(a_save);
    ul.appendChild(_save);

    div.appendChild(ul);

    var aksieditor = document.getElementById('tools');
    aksieditor.appendChild(div);
    map.controls[google.maps.ControlPosition.RIGHT_TOP].push(aksieditor);
    google.maps.event.addListener(map, 'click', function(event) {
        if(drawingmode){
            addMarker(event.latLng);
            displayMarkers();
        }
    });
    var txt = document.getElementById(id);
    if (txt.value !== null) {
        setMarkers();
    }

}

function startEditing(){
    document.getElementById(start).classList.add('disabled');
    document.getElementById(stop).classList.remove('disabled');
    document.getElementById(clear).classList.remove('disabled');
    document.getElementById(save).classList.remove('disabled');

    drawingmode = true;
}

function stopEditing(){
    drawingmode = false;
    document.getElementById(start).classList.remove('disabled');
    document.getElementById(stop).classList.add('disabled');
    document.getElementById(clear).classList.add('disabled');
    document.getElementById(save).classList.add('disabled');
}

function clearEditing(){
    clearMarkers();
}

function showPolyline() {
    if (polyline) {
        polyline.setMap(null);
    }
    path = [];
    for (var i = 0; i < markers.length; i++) {
        var latlng = markers[i].getPosition();
        path.push(latlng);
        markers[i].setTitle("#" + i + ": " + latlng.toUrlValue());
    }
    polyline = new google.maps.Polyline({
        map: map,
        path: path,
        strokeColor: "#0000FF",
        strokeOpacity: 0.5,
        strokeWeight: 5,
    });
}

function clearMarkers() {
    var txt = document.getElementById(id);
    txt.value = '';
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(null);
    }
    markers = [];
    polylineStore = [];
    showPolyline();
}

function getMarkerIndex(marker) {
    for (var i = 0; i < markers.length; i++) {
        if (marker == markers[i]) {
            return i;
        }
    }
    return -1;
}

function addMarker(latlng, i) {
    var host = 'http://localhost/';
    var marker = new google.maps.Marker({
        map: map,
        position: latlng,
        draggable: true,
        //icon: host+'images/maps/waterpark.png'
    });

    /*
    google.maps.event.addListener(marker, 'click', function() {
            var infoWindow = new google.maps.InfoWindow({
                    content: marker.getPosition().toUrlValue(),
                });
            infoWindow.open(map, marker);
        });
    */

    google.maps.event.addListener(marker, 'dragend', function(event) {
        if(drawingmode){

            showPolyline();
            displayMarkers();
        }
    });
    google.maps.event.addListener(marker, 'rightclick', function(event) {
        if(drawingmode){
            removeMarker(marker);
            showPolyline();
            displayMarkers();
        }
    });
    google.maps.event.addListener(marker, 'dblclick', function(event) {
        if(drawingmode){
        var i = getMarkerIndex(marker);
        if (i > 0 && i == markers.length - 1) {
            i--;
        }
        if (i < markers.length - 1) {
            var lat0 = markers[i].getPosition().lat();
            var lng0 = markers[i].getPosition().lng();
            var lat1 = markers[i+1].getPosition().lat();
            var lng1 = markers[i+1].getPosition().lng();
            var latlng = new google.maps.LatLng((lat0+lat1)/2, (lng0+lng1)/2);
            addMarker(latlng, i+1);
        }
        }
    });
    if (i == null || i >= markers.length) {
        markers.push(marker);
    } else {
        markers.splice(i, 0, marker);
    }
    showPolyline();
}

function removeMarker(marker) {
    var i = getMarkerIndex(marker);
    marker.setMap(null);
    markers.splice(i, 1);
    showPolyline();
}

function displayMarkers() {
    var txt = document.getElementById(id);
    txt.value = "";
    polylineStore = [];
    datapostgis = "";
    var countjson = markers.length;
		var last_index = countjson - 1;
    for (var i = 0; i < markers.length; i++) {
        var latlng = markers[i].getPosition();
        txt.value += latlng.toUrlValue() + ",\n";
        /*console.log(markers[i]);
        var comma = (i == last_index) ? "" : ",\n" ;
        datapostgis += markers[i].lng+" "+markers[i].lat+""+comma;*/
        polylineStore.push(latlng.toJSON());
        //console.log(polylineStore);
    }
}

function setMarkers() {
    var txt = document.getElementById(id);
    var lines = txt.value.split(/\n/);
    //console.log(lines);
    clearMarkers();
    for (var i in lines) {
        var ps = lines[i].split(/,/);

        if (ps.length >= 2) {
            var latlng = new google.maps.LatLng(ps[0], ps[1]);
            addMarker(latlng);
        }
    }
    displayMarkers();
    if (markers.length > 0) {
        map.setCenter(markers[0].getPosition());
    }
}

function xhr_get(url) {

  return $.ajax({
    url: url,
    type: 'get',
    dataType: 'json'
  })
  .pipe(function(data) {

    return data.responseCode != 200 ? $.Deferred().reject( data ) : data;
  })
  .fail(function(data) {
    if ( data.responseCode )

      console.log( data.responseCode );
  });
}

function xhr_post(url,data) {

  return $.ajax({
    url: url,
    type: 'post',
    dataType: 'json',
    data: data,
  })
  .pipe(function(data) {
    $('#statussave').html('Data berhasil disimpan');
    setInterval(function() {
      $('#statussave').html('');
    }, 3000);
    return data.responseCode != 200 ?
      $.Deferred().reject( data ) : data;
  })
  .fail(function(data) {

    if ( data.responseCode )
      $('#statussave').html('Data berhasil tidak disimpan');
      setInterval(function() {
        $('#statussave').html('');
      }, 3000);
      console.log( data.responseCode );
  }).then(function(data){
    window.location = '/home';
  });
}

//# sourceMappingURL=editor-polyline.js.map
