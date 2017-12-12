window.basemapTools = {};
var basemapTools = window.basemapTools;
function initBasemap(tools,map){    
    var div = document.createElement('div');
    div.id = 'divBasemap';
    div.className = '';
    var selectDom = document.createElement('select');
    selectDom.className = 'form-control';
    var options = '';
    for (var x = 0; x < basemapSource().length; x++) {
        var data = basemapSource();
        options += '<option value="' + data[x] +'">' + data[x] + '</option>';
    }
    selectDom.innerHTML = options;
    $(selectDom).change(function(e) {
       console.log($(this).val());
       
       
    });
    div.appendChild(selectDom);
    var basemap = document.getElementById(tools);
    basemap.appendChild(div);
}

basemapTools.basemapControl = function(opt_options) {
    var options = opt_options || {};

    var this_ = this;
    var basemapSource = function(){
        return ['esri_topo','esri_terrain','esri_street','esri_image','esri_natgeo','esri_ocean','osm','bing','rupabumi']
    }
    var findLayerBy = function(layer, key, value) {
        
        if (layer.get(key) === value) {
            return layer;
        }
        
        if (layer.getLayers) {
            var layers = layer.getLayers().getArray(),len = layers.length, result;
            for (var i = 0; i < len; i++) {
                result = findLayerBy(layers[i], key, value);
                if (result) {
                  return result;
                }
            }
        }
        
        return null;
    }
    var changeBasemap = function(_b){
        var basemap = findLayerBy(window.map.getLayerGroup(), 'id', 'basemap');
        if(basemap.get('isBasemap')){
            if(_b == 'esri_topo'){
                basemap.getSource().setUrl('http://services.arcgisonline.com/arcgis/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}');
            }else if(_b == 'esri_terrain'){
                basemap.getSource().setUrl('http://services.arcgisonline.com/arcgis/rest/services/World_Terrain_Base/MapServer/tile/{z}/{y}/{x}');
            }else if(_b == 'esri_street'){
                basemap.getSource().setUrl('http://services.arcgisonline.com/arcgis/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}');
            }else if(_b == 'esri_image'){
                basemap.getSource().setUrl('http://services.arcgisonline.com/arcgis/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}');
            }else if(_b == 'esri_natgeo'){
                basemap.getSource().setUrl('http://services.arcgisonline.com/arcgis/rest/services/NatGeo_World_Map/MapServer/tile/{z}/{y}/{x}');
            }else if(_b == 'esri_ocean'){
                basemap.getSource().setUrl('http://services.arcgisonline.com/arcgis/rest/services/Ocean_Basemap/MapServer/tile/{z}/{y}/{x}');
            }else if(_b == 'rupabumi'){
                basemap.getSource().setUrl('http://portal.ina-sdi.or.id/arcgis/rest/services/IGD/RupabumiIndonesia/MapServer/tile/{z}/{y}/{x}');
            }else if(_b == 'bing'){
                basemap.setSource(new ol.source.BingMaps({
                    key: 'AsxtakN7WqZ-AjpgvhxvrHgENDh-spnL7HIh3SaLOzmDjN8J4AO-PeSU-j7Ssav0',
                    imagerySet: 'AerialWithLabels'
                    // use maxZoom 19 to see stretched tiles instead of the BingMaps
                    // "no photos at this zoom level" tiles
                    // maxZoom: 19
                }));
            }else{
                basemap.setSource(new ol.source.OSM());
            }
        }
    }

    var div = document.createElement('div');
    div.id = 'divBasemap';
    div.className = 'basemapTools ol-unselectable ol-control';
    var selectDom = document.createElement('select');
    selectDom.className = 'form-control';
    var options = '';
    for (var x = 0; x < basemapSource().length; x++) {
        var data = basemapSource();
        options += '<option value="' + data[x] +'">' + data[x] + '</option>';
    }
    selectDom.innerHTML = options;
    basemapTools.map = window.map;
    $(selectDom).change(function(e) {
       console.log($(this).val());
       changeBasemap($(this).val());
    });
    div.appendChild(selectDom);
    //var basemap = document.getElementById(tools);
    //basemap.appendChild(div);

    ol.control.Control.call(this, {
        element: div,
        target: options.target
    });

    
}
ol.inherits(basemapTools.basemapControl, ol.control.Control);

