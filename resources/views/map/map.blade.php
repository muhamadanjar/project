@extends('layouts.full.full')
@section('head_title')
  - Map
@endsection

@section('content')
<section id="header" role="header">
  <div class="appHeader">
            <div class="headerLogo">
                <img alt="logo" src="{{ url('/images/logo.png')}}" height="54" />
            </div>
            <div class="headerTitle">
                <span id="headerTitleSpan">
                    SIMJARI - BBWSV
                </span>
                <div id="subHeaderTitleSpan" class="subHeaderTitle">
                    
                </div>
            </div>
            <div class="search">
                <div id='geocodeDijit'>
                </div>
            </div>
            
            <div class="headerLinks">
                <div id="login">
                    @if(Auth::user())
                    <a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Dashboard</a> |
                    <a href="{{ route('gerbang.logout') }}"><i class="icon-user"></i> Logout</a>
                    @else
                    <a href="{{ route('gerbang.login') }}"><i class="icon-user"></i> Login</a>
                    @endif
                </div>
                <div id="helpDijit">
                </div> 
            </div>
  </div>
</section>
<section id="main" role="main">
<div class="main-map">
  <div class="ui-layout-center map" id="map">
      <div id="popup" class="ol-popup slimcroll" style="300px">
        <a href="#" id="popup-closer" class="ol-popup-closer"></a>
        <div id="popup-content"></div>
      </div>
  </div>
  <div class="ui-layout-west">
    <div class="row">
      <div class="col-sm-12">
        <div class="panel-group panel-group-compact" id="accordion2">
            <div class="panel panel-default layer-panel">
                <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion2" href="#layercontrol" class="collapsed">
                          <span class="plus mr5"></span> Layer Control
                      </a>
                    </h4>
                </div>
                <div id="layercontrol" class="panel-collapse collapse">
                    <div class="panel-body">
                    </div>
                </div>
            </div>
            <div class="panel panel-default info-panel">
              <div class="panel-heading">
                  <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion2" href="#infoTool" class="collapsed">
                        <span class="plus mr5"></span> Info
                      </a>
                  </h4>
              </div>
              <div id="infoTool" class="panel-collapse collapse">
                <div class="panel-body">
                  <form class="form-info" id="form-info" role="info">
                    <div class="form-group">
                      <button type="button" class="btn btn-primary btn-xs btn-infolayer" id="btn-infolayer">Info</button>
                    </div>
                    <div class="form-group">
                      <select name="identify" id="identify" class="form-control">
                        <option value="all">All</option>
                      </select>  
                    </div>
                    
                  </form>
                </div>
              </div>
            </div>
            <div class="panel panel-default measure-panel">
              <div class="panel-heading">
                  <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion2" href="#measureTool" class="collapsed">
                        <span class="plus mr5"></span> Alat Ukur
                      </a>
                  </h4>
              </div>
              <div id="measureTool" class="panel-collapse collapse">
                <div class="panel-body">
                  <form class="">
                    <div class="form-group">
                      <div class="btn btn-group">
                        <button type="button" class="btn btn-primary btn-xs btn-measure" id="btn-measure">
                        Measure</button>
                      </div>  
                    </div>
                    <div class="form-group">
                      <label for="type">Measurement type &nbsp;</label>
                      <select id="type" class="form-control">
                        <option value="length">Length (LineString)</option>
                        <option value="area">Area (Polygon)</option>
                      </select>  
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="panel panel-default query-panel">
              <div class="panel-heading">
                  <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion2" href="#queryTool" class="collapsed">
                        <span class="plus mr5"></span> Query
                      </a>
                  </h4>
              </div>
              <div id="queryTool" class="panel-collapse collapse">
                <div class="panel-body">
                  <div class="input-group">
                      <input type="text" name="query-text" id="query-text" class="form-control">
                      <span class="input-group-btn">
                        <button type="button" class="btn btn-default btn-reset" id="btn-reset"><i class="ico-trash"></i></button>
                        <button type="button" class="btn btn-primary btn-search" id="btn-search"><i class="ico-search3"></i></button>
                      </span>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
    
    <div class="">
        <div id="scale"></div>
        <div id="location"></div>
        <div id="nodelist"></div>
    </div>
    
  </div>
</div>
</section>
@endsection
@section('style-head')
    @parent
    <!-- Application stylesheet : mandatory -->
    <link rel="stylesheet" href="{{ url('stylesheet/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ url('stylesheet/layout.css')}}">
    <link rel="stylesheet" href="{{ url('stylesheet/uielement.css')}}">
    <link rel="stylesheet" href="{{ url('css/main.css')}}">
    <!--/ Application stylesheet -->

    <link rel="stylesheet" href="{{ url('assets/plugins/selectize/css/selectize.css')}}">
    <link rel="stylesheet" href="{{ url('assets/plugins/jquery-ui/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{ url('assets/plugins/select2/css/select2.css')}}">
    <link rel="stylesheet" href="{{ url('assets/plugins/touchspin/css/touchspin.css')}}">

    <link rel="stylesheet" href="https://openlayers.org/en/v4.4.2/css/ol.css" type="text/css">
    <link type="text/css" rel="stylesheet" href="{{ url('assets/plugins/layout/layout-default-latest.css')}}" />
@endsection
@section('style-theme')
    <style>
      #layertree li > span {
        cursor: pointer;
      }    
    </style>
    <link rel="stylesheet" href="{{ url('css/popup.css')}}">
    <link rel="stylesheet" href="{{ url('css/overview.css')}}">
    <style>
      button.layer-control {
          background-color: #eee;
          color: #444;
          cursor: pointer;
          padding: 8px;
          width: 100%;
          border: none;
          text-align: left;
          outline: none;
          font-size: 14px;
          transition: 0.4s;
      }
      button.layer-control.active, button.layer-control:hover {
          background-color: #ccc;
      }

      button.layer-control:after {
          content: '\002B';
          color: #777;
          font-weight: bold;
          float: right;
          margin-left: 5px;
      }

      button.layer-control.active:after {
          content: "\2212";
      }

      div.layer-control-panel {
          padding: 0 10px;
          background-color: white;
          max-height: 0;
          overflow: hidden;
          overflow-y: scroll;
          transition: max-height 0.2s ease-out;
      }
    </style>
    <style>
      .tooltip {
        position: relative;
        background: rgba(0, 0, 0, 0.5);
        border-radius: 4px;
        color: white;
        padding: 4px 8px;
        opacity: 0.7;
        white-space: nowrap;
      }
      .tooltip-measure {
        opacity: 1;
        font-weight: bold;
      }
      .tooltip-static {
        background-color: #ffcc33;
        color: black;
        border: 1px solid white;
      }
      .tooltip-measure:before,
      .tooltip-static:before {
        border-top: 6px solid rgba(0, 0, 0, 0.5);
        border-right: 6px solid transparent;
        border-left: 6px solid transparent;
        content: "";
        position: absolute;
        bottom: -6px;
        margin-left: -7px;
        left: 50%;
      }
      .tooltip-static:before {
        border-top-color: #ffcc33;
      }    
    </style>
    <style>
        .box{
          width: 500px;
          margin: auto;
          margin-top: 50px;
        }
        .ui-autocomplete {
          position: absolute;
          z-index: 1000;
          cursor: default;
          padding: 0;
                margin-top: 2px;
                list-style: none;
                background-color: #ffffff;
                border: 1px solid #ccc;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
                -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
                -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        }
            .ui-autocomplete > li {
                padding: 3px 10px;
            }
            .ui-autocomplete > li.ui-state-focus {
                background-color: #3399FF;
                color:#ffffff;
            }
            .ui-helper-hidden-accessible {
                display: none;
            }
    </style>
@endsection
@section('script-head')
    @parent
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList,URL"></script>
    <script src="https://openlayers.org/en/v4.4.2/build/ol.js"></script>
@endsection
@section('script-body')
    <script type="text/javascript" src="{{ url('/javascript/vendor.js')}}"></script>
    <script type="text/javascript" src="{{ url('/javascript/core.js')}}"></script>
    <script type="text/javascript" src="{{ url('/javascript/backend/app.js')}}"></script>
@endsection
@section('script-end')
@parent
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.js"></script>
<script type="text/javascript" src="{{ url('assets/plugins/jquery-ui/js/jquery-ui.js')}}"></script>
<script type="text/javascript" src="{{ url('assets/plugins/layout/jquery.layout-latest.js')}}"></script>
<script type="text/javascript" src="{{ url('js/op/basemap.js')}}"></script>
<script type="text/javascript" src="{{ url('js/op/measure.js')}}"></script>

<!-- Plugins and page level script : optional -->
<script type="text/javascript" src="{{ url('assets/plugins/selectize/js/selectize.js')}}"></script>
<script type="text/javascript" src="{{ url('assets/plugins/jquery-ui/js/jquery-ui.js')}}"></script>
<script type="text/javascript" src="{{ url('assets/plugins/jquery-ui/js/addon/timepicker/jquery-ui-timepicker.js')}}"></script>
<script type="text/javascript" src="{{ url('assets/plugins/jquery-ui/js/jquery-ui-touch.js')}}"></script>
<script type="text/javascript" src="{{ url('assets/plugins/inputmask/js/inputmask.js')}}"></script>
<script type="text/javascript" src="{{ url('assets/plugins/select2/js/select2.js')}}"></script>
<script type="text/javascript" src="{{ url('assets/plugins/touchspin/js/jquery.bootstrap-touchspin.js')}}"></script>
<script type="text/javascript" src="{{ url('assets/plugins/owl/js/owl.carousel.js')}}"></script>

<script type="text/javascript">
  var map;
  var infoLayer = 'all';
  var infomap = 'info';
  var singleAllLayers;
  var intLayersString,intLayers = [];
  var selectedLayer = 'all';
  var searchLayer = 'pandeglang:poi_pandeglang';
  var overlaysOBJ;//Store array data from database
  var layer_global = [];
  var pureCoverage = false;
  var tematikGroup,rencanaGroup,citrafotoGroup;
  var container_popup,content_popup,closer_popup,overlay_popup;
  var DefaultCoordinate = [105.3795004,-6.445772];
  var geolocation;
      var basemapTile = new ol.layer.Tile({
          source: new ol.source.XYZ({
                    //attributions: [attribution],
            url: 'http://services.arcgisonline.com/ArcGIS/rest/services/' +
                'NatGeo_World_Map/MapServer/tile/{z}/{y}/{x}'
          }),
          name:'BaseMap Image Esri',
          id:'basemap',
          isBasemap:true

      });
      
      var __root__ = new ol.layer.Tile({
        visible: true,
        source: new ol.source.TileWMS({
          url: '/geoserver/wms',
          params: {
            'FORMAT': 'image/png', 
            'VERSION': '1.1.1',
            tiled: true,
            LAYERS: 'pandeglang:admin_prov',
            STYLES: '',
          }
        })
      });
      
      singleAllLayers = __root__;
      //layer_global.push(admin_prov,admin_kec,batas_desa);
      

function initMap(){
  tematikGroup = new ol.layer.Group({
        layers: [],
        name:'Tematik',
        id:'tematik',
  });
  rencanaGroup = new ol.layer.Group({
        layers: [],
        name:'Rencana',
        id:'rencana',
  });
  citrafotoGroup = new ol.layer.Group({
        layers: [],
        name:'Citra Foto',
        id:'citra',
  });
  var scaleLineControl = new ol.control.ScaleLine();
  var overviewMapControl = new ol.control.OverviewMap({
        className: 'ol-overviewmap ol-custom-overviewmap',
        layers: [
          new ol.layer.Tile({
            source: new ol.source.OSM()
          })
        ],
        collapseLabel: '\u00BB',
        label: '\u00AB',
        collapsed: true
  });
  vectorSource = new ol.source.Vector();
  var vectorLayer = new ol.layer.Vector({
    name:'Layer Vector',
    id:'lyr_vector',
    source: vectorSource,
    style: new ol.style.Style({
      fill: new ol.style.Fill({
            color: 'rgba(255, 255, 255, 0.2)'
      }),
      stroke: new ol.style.Stroke({
            color: '#ffcc33',
            width: 2
      }),
      image: new ol.style.Circle({
            radius: 7,
            fill: new ol.style.Fill({
              color: '#ffcc33'
            })
      })
    })
  });
  map = new ol.Map({
    layers: [
      basemapTile, tematikGroup,rencanaGroup,citrafotoGroup,vectorLayer
    ],
    target: 'map',
    view: new ol.View({
      center: ol.proj.fromLonLat(DefaultCoordinate),
      zoom: 10
    }),
    controls: ol.control.defaults({
      attributionOptions: ({
        collapsible: false
      })
    }).extend([
          new basemapTools.basemapControl(),
          overviewMapControl,
          scaleLineControl
    ]),
  });
  var mousePosition = new ol.control.MousePosition({
      coordinateFormat: ol.coordinate.createStringXY(2),
      projection: 'EPSG:4326',
      target: document.getElementById('myposition'),
      undefinedHTML: '&nbsp;'
  });
  map.addControl(mousePosition);

  geolocation = new ol.Geolocation({
    projection: map.getView().getProjection()
  });
  //geolocation.setTracking(true);

  geolocation.on('change', function() {
    console.log('accuracy',geolocation.getAccuracy() + ' [m]');
    console.log('altitude',geolocation.getAltitude() + ' [m]');
    console.log('altitudeAccuracy',geolocation.getAltitudeAccuracy() + ' [m]');
    console.log('heading',geolocation.getHeading() + ' [rad]');
    console.log('speed',geolocation.getSpeed() + ' [m/s]');
    console.log('position',geolocation.getPosition());
  });
  geolocation.on('error', function(error) {
    var info = document.getElementById('info');
    info.innerHTML = error.message;
    info.style.display = '';

    console.log('info',error.message);
  });

  var accuracyFeature = new ol.Feature();
  geolocation.on('change:accuracyGeometry', function() {
    accuracyFeature.setGeometry(geolocation.getAccuracyGeometry());
  });

  var positionFeature = new ol.Feature();
  positionFeature.setStyle(new ol.style.Style({
    image: new ol.style.Circle({
      radius: 6,
      fill: new ol.style.Fill({
        color: '#3399CC'
      }),
      stroke: new ol.style.Stroke({
        color: '#fff',
        width: 2
      })
    })
  }));

  geolocation.on('change:position', function() {
    var coordinates = geolocation.getPosition();
    positionFeature.setGeometry(coordinates ? new ol.geom.Point(coordinates) : null);
  });

  var geol = findBy(map.getLayerGroup(), 'id', 'lyr_vector').getSource();
  geol.addFeature(accuracyFeature);
  geol.addFeature(positionFeature);
  
}
function initPopup(){
  container_popup = document.getElementById('popup');
  content_popup = document.getElementById('popup-content');
  closer_popup = document.getElementById('popup-closer');

  overlay_popup = new ol.Overlay(/** @type {olx.OverlayOptions} */ ({
    element: container_popup,
    autoPan: true,
    autoPanAnimation: {
      duration: 250
    }
  }));
  closer_popup.onclick = function() {
      overlay_popup.setPosition(undefined);
      closer_popup.blur();
      return false;
  };
  map.addOverlay(overlay_popup);
}
function bindInputs(layerid, layer) {
  //console.log(layerid, layer);
  var visibilityInput = $(layerid + ' input.visible');
  visibilityInput.on('change', function() {
    layer.setVisible(this.checked);
  });
  visibilityInput.prop('checked', layer.getVisible());
  if(layer.getVisible()){
    $(visibilityInput).parent().parent().find('div.control-right').show();
  }else{
    $(visibilityInput).parent().parent().find('div.control-right').hide();
  }
  var opacityInput = $(layerid + ' input.opacity');
  opacityInput.on('input change', function() {
    layer.setOpacity(parseFloat(this.value));
  });
  opacityInput.val(String(layer.getOpacity()));
}
function identifyLayer(layer = 'all') {
  var identifyDom = $('select#identify');
  if(identifyDom.length > 0){
    var options = '<option value="all">All..</option>';
        for (var x = 0; x < intLayers.length; x++) {
            var data = intLayers;
            options += '<option value="' + data[x] +'">' + data[x] + '</option>';
        }
    identifyDom.html(options);
    identifyDom.change(function(e) {
      selectedLayer = $(this).val();
      if (selectedLayer != "") {
      }else{
        selectedLayer = "all";
      }            
    });
  }
  
    info_event = map.on('click', identifyLayerEvent);
  
}
function identifyLayerEvent(evt) {
      var features = map.getFeaturesAtPixel(evt.pixel);
      //console.log(features);
      if (selectedLayer == 'all') {
        var url = __root__.getSource()
            .getGetFeatureInfoUrl(
                evt.coordinate,
                map.getView().getResolution(),
                map.getView().getProjection(),
                {
                  'INFO_FORMAT': 'application/json',
                  //'propertyName': '*',
                  'LAYERS':intLayersString,
                  'QUERY_LAYERS':intLayersString, 
                  'FEATURE_COUNT': 50
                }
            );
      }else{
        var layer = findBy(map.getLayerGroup(), 'id', selectedLayer);
        var url = layer.getSource()
          .getGetFeatureInfoUrl(
            evt.coordinate,
            map.getView().getResolution(),
            map.getView().getProjection(),
            {
              'INFO_FORMAT': 'application/json',
              //'propertyName': '*',
              //'LAYERS':intLayersString,
              //'QUERY_LAYERS':intLayersString, 
              'FEATURE_COUNT': 50
            }
          );
      }
      $.ajax({
        url: url,
        dataType : 'json',
        error:function (argument) {
            console.log(argument)
        },
        beforeSend: function() {
            $('#loading').html("<img src='images/ajax-loader.gif' />");
        },
      }).then(function (data) {
        //console.log(data);
        var feature = data.features;
    
        content = tablePopup(feature)
        var props = feature.properties;
        //console.log(props);

                          
        var coordinate = evt.coordinate;
        content_popup.innerHTML = content;
        overlay_popup.setPosition(coordinate);
        
      });
}
function updateInteractiveLayers(layer) {
  var index = $.inArray(layer, intLayers);
  //console.log(index);
  if(index > -1) {
    intLayers.splice(index,1);
  } else {
    intLayers.push(layer);
  }
  intLayersString = intLayers.join(',');
}
function findBy(layer, key, value) {

  if (layer.get(key) === value) {
    return layer;
  }

  if (layer.getLayers) {
  var layers = layer.getLayers().getArray(),
      len = layers.length, result;
      for (var i = 0; i < len; i++) {
        result = findBy(layers[i], key, value);
        if (result) {
          return result;
        }
      }
  }

  return null;
}
function objLayer(overlaysOBJ) {
  if (overlaysOBJ) {
    layer_global = new ol.Collection();
    var ul_layer_tematik = document.createElement('ul');
    ul_layer_tematik.setAttribute('class','list-group');

    for (var i=0; i<overlaysOBJ.length; i++) {
      var _layer = overlaysOBJ[i];
      var groupId = $($('#layercontrol').find('ul')[i]).attr('data-kodegroup');
      var group_ul = $('#layercontrol').find('.panel').find('ul')[i];
      var element = buildLayer(_layer);
      $(element).appendTo($('#layercontrol').find('.panel').find('ul#list-group-'+_layer.kodegroup.split(":")[1]));
      
      //$('#layertree').empty().append(ul_layer_tematik);
      var wmsSource = new ol.source.TileWMS({     
        url: overlaysOBJ[i].urllayer/*'/geoserver/wms'*/,
        params: {
          'LAYERS': overlaysOBJ[i].kodelayer,
          'VERSION': '1.1.1',
          'FORMAT': 'image/png', 
          STYLES: overlaysOBJ[i].option_style,
          tiled: true,
        },
      });
      var wmsLayerTile = new ol.layer.Tile({
        source: wmsSource,
        visible: overlaysOBJ[i].option_visible,
        opacity: overlaysOBJ[i].option_opacity,
        name: overlaysOBJ[i].namalayer,
        id: overlaysOBJ[i].kodelayer
      });
      layer_global.push(wmsLayerTile);
      singleAllLayers = wmsLayerTile;
      //if(overlaysOBJ[i].option_visible){
        updateInteractiveLayers(overlaysOBJ[i].kodelayer);
      //}
      
    }
    tematikGroup.setLayers(layer_global);
  }
}
function tablePopup(feature){
  if (feature) {
    var content = "<div class='panel-group info-popup owl-carousel' id='accordionPopup'>";
    
    if(feature.length > 0){
      for (var f in feature) {
        content += "<div class='panel panel-default item table-layout'>";
        content += "<div class='panel-heading'><h6 class='panel-title'><i class='icon-accessibility'></i><b><a data-toggle='collapse' data-parent='#accordionPopup' href='#"+feature[f].id+"' class='collapsed'>"+feature[f].id+"</a></b></h6><div class='panel-toolbar text-right'><div class='btn-group'><button class='btn btn-sm btn-default btn-popup-close'><i class='ico-close4'></i></button></div></div></div>";
        content += "<div id='"+feature[f].id+"' class='panel-collapse collapse in'>";
        content += "<div class='panel-body' class='max-height: 70vh;overflow-y: scroll;'>";
        content += "<table class='table table-striped'>";
        for (var name in feature[f].properties) {
          var fp = feature[f].properties;
          if (name == 'image_link' || name == 'IMAGE_LINK' || name == 'foto' || name == 'FOTO') {
            content += "<tr><td><b>" + name + "</b></td><td><b>:</b> </td><td><image class='img-responsive' src='" + fp[name] + "' width='100'/></td></tr>";
          }else if(name == 'bbox'){
          }else{
            content += "<tr><td><b>" + name + "</b></td><td><b>:</b> </td><td>" + fp[name] + "</td></tr>";    
          }
        };
        content += '</table>';
        content += '</div>';
        content += '</div>';
        content += '</div>';
      }
    }else{
      content += "<table class='table table-bordered'>";
      content += '<tr><td colspan=3>Data tidak ada</td></tr>';
      content += '</table>';
    }
    content += '</div>';
  }else{
    var content = "<table class='table table-bordered'>";
    content += '<tr><td>Data tidak ada</td></tr>';
    content += '</table>';
  }
  return content; 
}
function initializeTree() {
  var elem = buildLayerTree(map.getLayerGroup());
  $('#layertree').empty().append(elem);
  $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
  $('.tree li.parent_li > span').on('click', function(e) {
    var children = $(this).parent('li.parent_li').find(' > ul > li');
    if (children.is(":visible")) {
      children.hide('fast');
      $(this).attr('title', 'Expand this branch').find(' > i').addClass('fa fa-plus-square').removeClass('glyphicon-minus');
    } else {
      children.show('fast');
      $(this).attr('title', 'Collapse this branch').find(' > i').addClass('fa fa-minus-square').removeClass('glyphicon-plus');
    }
    e.stopPropagation();
  });            
}
function buildLayerTree(layer) {
  var elem;
  var name = layer.get('name') ? layer.get('name') : "Group";
  var idlayer = layer.get('id');
  var onclick;
  var li = document.createElement('li');
  var div = "<li class='list-group-item' id='layer-1-"+idlayer+"'> " +
  "<label for='visible_"+idlayer+"'><input type='checkbox' id='visible_"+idlayer+"' class='visible'>"+name+"</label>"+
  "<div class='btn btn-group control-right'>" +
    "<span class='btn btn-primary btn-xs transparan'>Transparan</span>" +
    "<span class='btn btn-success btn-xs legenda'>Legenda</span>" +
  "</div>"+
  "<fieldset id='opacity'>"+
    "<input class='opacity' type='range' min='0' max='1' step='0.01'/>" +
  "</fieldset>" +
  "<fieldset id='legend'>" +
    "<img src='/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&WIDTH=20&HEIGHT=20&LAYER=pandeglang:batas_kab' alt='Legenda'>" +
  "</fieldset>";

  if (layer.getLayers) {
    var sublayersElem = '';
    var layers = layer.getLayers().getArray(),len = layers.length;
    for (var i = len - 1; i >= 0; i--) {
      sublayersElem += buildLayerTree(layers[i]);
    }
    elem = div + " <ul>" + sublayersElem + "</ul></li>";
  } else {
    elem = div + " </li>";
  }
    
  return elem;
}
function buildLayer(_layer) {
      var li_layer = document.createElement('li');
      li_layer.setAttribute('class','list-group-item');
      li_layer.setAttribute('id','layer-1-'+_layer.kodelayer.split(':')[1]);
      var label = document.createElement('label');
      label.setAttribute('for','visible_'+_layer.kodelayer.split(':')[1]);
      var input = document.createElement('input');
      input.setAttribute('type','checkbox');
      input.setAttribute('id','visible_'+_layer.kodelayer.split(':')[1]);
      input.setAttribute('class','visible');
      label.append(input);
      label.append(' '+_layer.namalayer);
      
      li_layer.append(label);
      var div = document.createElement('div');
      div.setAttribute('class','btn btn-group control-right');
      var span_transparan = document.createElement('span');
      span_transparan.setAttribute('class','btn btn-primary btn-xs transparan');
      span_transparan.innerHTML = 'Transparan';
      div.append(span_transparan);

      var span_legenda = document.createElement('span');
      span_legenda.setAttribute('class','btn btn-success btn-xs legenda');
      span_legenda.innerHTML = 'Legenda';
      div.append(span_legenda);

      var span_zoom = document.createElement('span');
      span_zoom.setAttribute('class','btn btn-info btn-xs zoom');
      span_zoom.setAttribute('data-layer',_layer.kodelayer);
      span_zoom.innerHTML = 'Zoom';
      div.append(span_zoom);

      li_layer.append(div);

      var fieldset_opacity = document.createElement('fieldset');
      fieldset_opacity.setAttribute('id','opacity');
      fieldset_opacity.setAttribute('style','display:none');
        var input_op = document.createElement('input');
        input_op.setAttribute('class','opacity');
        input_op.setAttribute('type','range');
        input_op.setAttribute('min','0');
        input_op.setAttribute('max','1');
        input_op.setAttribute('step','0.01');
      fieldset_opacity.append(input_op);
      li_layer.append(fieldset_opacity);

      var fieldset_legenda = document.createElement('fieldset');
      fieldset_legenda.setAttribute('id','legend');
      fieldset_legenda.setAttribute('style','display:none');
        var img_legend = document.createElement('img');
        img_legend.setAttribute('src','/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&WIDTH=20&HEIGHT=20&LAYER='+_layer.kodelayer);
        img_legend.setAttribute('alt','Legenda');
      fieldset_legenda.append(img_legend);
      li_layer.append(fieldset_legenda);
      li_layer.addEventListener("click", layerclickEvent);

      return li_layer;
}
function layerclickEvent(e) {
  if($(e.target).hasClass('transparan')){
    if($(e.target).hasClass('active')){
      $(e.target).removeClass('active');
    }else{
      $(e.target).addClass('active');
    }
    
    $(this).find('fieldset#opacity').toggle();
  }else if($(e.target).hasClass('legenda')){
    $(this).find('fieldset#legend').toggle();
  }else if($(e.target).hasClass('visible')){
    $(this).find('div.control-right').toggle();
  }else if($(e.target).hasClass('zoom')){
    
    var layer_zoom = findBy(map.getLayerGroup(), 'id', $(e.target).attr('data-layer'));
    zoomToExtent(layer_zoom);
  }
}
function createGroupLayer() {
  grouOpBJ = $.getValues("/map/getdata/group");
  var _div = $('#layercontrol').find('.panel-body');
  for (var i=0; i<grouOpBJ.length; i++) {
    _group = grouOpBJ[i];
    var button = document.createElement('button');
    button.setAttribute('class','layer-control');
    button.append(_group.namalayer);
    
    _div.append(button);
    
    var div = document.createElement('div');
    div.setAttribute('class','layer-control-panel panel');
    div.setAttribute('id','layer-group-'+_group.id);

    button.addEventListener('click',function(){
      this.classList.toggle("active");
      console.log(this.nextElementSibling);
      var panel = this.nextElementSibling;
      if (panel.style.maxHeight){
        panel.style.maxHeight = null;
      } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
      } 
    });
    var ul_group = document.createElement('ul');
    ul_group.setAttribute('class','list-group');
    ul_group.setAttribute('id','list-group-'+_group.kodelayer.split(':')[1]);
    ul_group.setAttribute('data-parentid',_group.id);
    ul_group.setAttribute('data-kodegroup',_group.kodelayer);
    div.append(ul_group);
    _div.append(div);
    
  }
}
function changeInfoMap(info){
  infomap = info;
}
function zoomToExtent(source) {

  var url = '/geoserver/wms?request=GetCapabilities&service=WMS&version=1.1.1';
  var parser = new ol.format.WMSCapabilities();
  $.ajax(url).then(function(response) {
    
    var result = parser.read(response);
    var Layers = result.Capability.Layer.Layer;
    for (var i=0, len = Layers.length; i<len; i++) {
      var layerobj = Layers[i];
      if (layerobj.Name == source.get('id')) {
        //console.log(source.getSource().getProjection());
        extent = layerobj.BoundingBox[0].extent;
        extent_= ol.proj.transformExtent(extent,'EPSG:4326','EPSG:3857');
        console.log(extent,extent_);
        map.getView().fit(extent_, map.getSize()); 
        break;
      }
    }
    console.log(extent);
  });
}
function resetFilter() {
  if (pureCoverage) {
    return;
  }
  document.getElementById('query-text').value = "";
  updateFilter();
}
function updateFilter(){
  if (pureCoverage) {
    return;
  }
  var filter = document.getElementById('query-text').value;
  var filterParams = {
      'FILTER': null,
      'CQL_FILTER': null,
      'FEATUREID': null
  };
  var layer = findBy(map.getLayerGroup(), 'id', searchLayer);
  if (filter.replace(/^\s\s*/, '').replace(/\s\s*$/, '') != "") {
    filterParams["CQL_FILTER"] = "WHERE name LIKE '%"+filter+"%'";
    
    console.log(filterParams);
    layer.getSource().updateParams(filterParams);
  }
  if(filter == ""){
    filterParams["CQL_FILTER"] = null;
    layer.getSource().updateParams(filterParams);
  }
}

</script>

<script type="text/javascript">
  $.extend({
    getValues: function(url) {
      var result = null;
      $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        async: false,
        success: function(data) {
          result = data;
        }
      });
      return result;
    }
  });

	$(document).ready(function() {
    $("div.main-map").css("height", $(window).height() - ($(window).height() * 0.12)+'px');
    $(window).resize(function(){
      $("div.main-map").css("height", $(window).height() - ($(window).height() * 0.12)+'px');
    });
    
		$('.main-map').layout({
		  west__size:300,
		  stateManagement__enabled:	true,
      onresize: function () {
        map.updateSize(); 
      },
    }).sizePane("west", 300);
    
    
    initMap();
    createGroupLayer();
    overlaysOBJ = $.getValues("/map/getdata");

    objLayer(overlaysOBJ);
    initPopup();
    
    //initializeTree();
    identifyLayer();
    
    map.getLayers().forEach(function(layer, i) {
      bindInputs('#layer-base'+i, layer);
      if (layer instanceof ol.layer.Group) {
        layer.getLayers().forEach(function(sublayer, j) {
          //console.log(sublayer.get('id'));
          bindInputs('#layer-'+i+'-'+sublayer.get('id').split(':')[1], sublayer);
        });
      }
    });

    //map.getView().fit(bounds, map.getSize());

    map.getView().on('change:resolution', function(evt) {
      var resolution = evt.target.get('resolution');
      var units = map.getView().getProjection().getUnits();
      var dpi = 25.4 / 0.28;
      var mpu = ol.proj.METERS_PER_UNIT[units];
      var scale = resolution * mpu * 39.37 * dpi;
      if (scale >= 9500 && scale <= 950000) {
          scale = Math.round(scale / 1000) + "K";
      } else if (scale >= 950000) {
          scale = Math.round(scale / 1000000) + "M";
      } else {
          scale = Math.round(scale);
      }
      document.getElementById('scale').innerHTML = "Scale = 1 : " + scale;
    });

    $('#btn-infolayer').click(function(){
      changeInfoMap('info');
      identifyLayer();
      map.removeInteraction(measureTools.draw);
    });

    $('#btn-measure').click(function(){
      changeInfoMap('measure');
      if(vectorSource.getFeatures().length > 0){
        vectorSource.clear();
      }
      initMeasure();

      map.un('click',identifyLayerEvent);
    });
    
    $("#query-text").autocomplete({
        source: "/map/searchdata",
        minLength: 2
    });

    $("#btn-search").click(function(e){
      updateFilter();
    });

    $("#btn-reset").click(function(e){
      resetFilter();
    });

    
	});
</script>

@endsection
