            var map;
            var container = document.getElementById('popup');
            var contentPopup = document.getElementById('popup-content');
            var closer = document.getElementById('popup-closer');
            var legendDiv = document.getElementById('legendDiv');
            var popup = new ol.Overlay(/** @type {olx.OverlayOptions} */ ({
                element: container,
                autoPan: true,
                autoPanAnimation: {
                  duration: 250
                }
              }));
            var geoserver_layer = [];
            var imagerySetA = [
                'Road',
                'Aerial',
                'AerialWithLabels',
                'collinsBart',
                'ordnanceSurvey'
            ];
            var view,map;
            var infoLayer = 'all';
            var singleAllLayers = [];
            var intLayersString,intLayers = [];
            var selectedLayer = 'all';

            var indonesiaEx = [93.970693781,-18.25167354,139.863065517,13.537752547];
            var bogorEx = [106.604388339,-6.71663787,107.003690281,-6.438022028];
            var rootUrl = 'http://localhost/anjarpro/public/';
            var overlaysOBJ;
            var coordinate;

            var toolPlugin = {draw:false,identify:true} 
            


            var overlays = {
               "Admin":"studio:Admin_Provinsi",
            };

            // Create layers instances
            var layerOSM = new ol.layer.Tile({
                source: new ol.source.OSM(),
                name: 'OpenStreetMap',
                id: 'osm'
            });

            var BingMapRoad = new ol.layer.Tile({

                source: new ol.source.BingMaps({key:'AsxtakN7WqZ-AjpgvhxvrHgENDh-spnL7HIh3SaLOzmDjN8J4AO-PeSU-j7Ssav0',imagerySet:'Road'}),
                name:'BingMap Road',
                visible: true,
                id:'bingmaproad'
            });
            
            var EsriTopo = new ol.layer.Tile({
                source: new ol.source.XYZ({
                    //attributions: [attribution],
                    url: 'http://services.arcgisonline.com/ArcGIS/rest/services/' +
                    'World_Topo_Map/MapServer/tile/{z}/{y}/{x}'
                }),
                name:'EsriTopo',
                id:'EsriTopo'

            });
            
            
            var PetaDasar = new ol.layer.Group({

                layers: [layerOSM,EsriTopo],
                name: 'Peta Dasar',
                id:'base'
            });

        

            /**
             * Build a tree layer from the map layers with visible and opacity 
             * options.
             * 
             * @param {type} layer
             * @returns {String}
             */

            function buildLayerTree(layer) {
                var elem;
                var name = layer.get('name') ? layer.get('name') : "Group";
                var idlayer = layer.get('id');

                var onclick;
                if (idlayer != 'base') {
                    onclick = "onclick='ZoomToLayer(\""+idlayer+"\")'";
                }else{
                    onclick = '';
                }
              
                var div = "<li data-layerid='" + name + "'> " +
                        "<span><i class='fa fa-file'></i> " + layer.get('name') + "</span>" +
                        "&nbsp;<i class='fa fa-check-square'></i> " +
                        "<div class='input-group-btn'>" +
                        "<a tabindex='-1' data-toggle='dropdown'>" +
                        "<span class='caret'></span>" +
                        "</a>"+
                        "<ul data-layerid='" + name + "' class='dropdown-menu icons-right dropdown-menu-right'>" +
                            "<li data-layerid='" + name + "'><a href='#'><div class='opacity' min='0' max='1' step='0.01' /><input class='vopacity' type='hidden' /></a></li> " +
                            "<li data-layerid='" + name + "' class='zoomLayer'><a  href='#' "+onclick+" ><i class='icon-grid3'></i> Zoom to Layer</a></li>" +
                        "</ul>"+
                        "</div>";

                if (layer.getLayers) {
                    var sublayersElem = '';

                    var layers = layer.getLayers().getArray(),len = layers.length;
                    for (var i = len - 1; i >= 0; i--) {
                        sublayersElem += buildLayerTree(layers[i]);
                    }
                    elem = div + " <ul class=\"list-unstyled\">" + sublayersElem + "</ul></li>";

                } else {
                    elem = div + " </li>";
                }
    
                return elem;
            }

            function initMap() {
                view = new ol.View({
                    //center: ol.proj.transform([-100.1833, 41.3833], 'EPSG:4326', 'EPSG:3857'),
                    zoom: 12,
                    //projection: ol.proj.get('EPSG:4326'),
                    projection: 'EPSG:4326',
                    center: [106.81, -6.6],
                });

                map = new ol.Map({
                    target: 'map',  // The DOM element that will contains the map
                    renderer: 'canvas', // Force the renderer to be used
                    controls: ol.control.defaults().extend([
                      new app.searchOLControl()
                    ]),
                    layers: [PetaDasar],
                    
                    // Create a view centered on the specified location and zoom level
                    view: view,
                    /*controls: ol.control.defaults().extend([
                        new ol.control.OverviewMap()
                    ]),*/
                    

                });

                var mousePosition = new ol.control.MousePosition({
                    coordinateFormat: ol.coordinate.createStringXY(2),
                    projection: 'EPSG:4326',
                    target: document.getElementById('myposition'),
                    undefinedHTML: '&nbsp;'
                  });

                map.addControl(mousePosition);
                map.addOverlay(popup);

                //
                // Name the root layer group
                map.getLayerGroup().set('name', 'List Utama');
            }


            function objLayer(overlaysOBJ) {

                
                if (overlaysOBJ) {
                    for (var i=0; i<overlaysOBJ.length; i++) {
                   
                        var wmsSource = new ol.source.TileWMS({     
                            url: '/geoserver/wms',
                            params: {
                                'LAYERS': overlaysOBJ[i].source_layer,
                                'VERSION': '1.1.1',
                                'FORMAT': 'image/png', 
                                tiled: true,
                            },
                        });
                        var wmsLayerTile = new ol.layer.Tile({
                            source: wmsSource,
                            visible: true,
                            name: overlaysOBJ[i].namalayer,
                            id: overlaysOBJ[i].source_layer
                        });
                        map.addLayer(wmsLayerTile);
                        //PetaLayer.setLayers(wmsLayerTile);
                        singleAllLayers = wmsLayerTile;
                        updateInteractiveLayers(overlaysOBJ[i].source_layer);

                    }
                    getLegend(overlaysOBJ);  
                }
                
                /*for (var i=0; i<overlaysOBJ.length; i++) {
                    console.log("JSON Data: ",overlaysOBJ[i]);
                    var wmsSource = new ol.source.TileWMS({     
                        url: '/geoserver/wms',
                        params: {
                            'LAYERS': overlaysOBJ[i].layer,
                            'VERSION': '1.1.1',
                            'FORMAT': 'image/png', 
                            tiled: true,
                        },
                    });
                    var wmsLayerTile = new ol.layer.Tile({
                        source: wmsSource,
                        visible: true,
                        name: overlaysOBJ[i].name,
                        id: overlaysOBJ[i].layer
                    });
                    map.addLayer(wmsLayerTile);
                    singleAllLayers = wmsLayerTile;
                }*/
                    
            }

            /**
             * Initialize the tree from the map layers
             * @returns {undefined}
             */
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

            /**
             * Finds recursively the layer with the specified key and value.
             * @param {ol.layer.Base} layer
             * @param {String} key
             * @param {any} value
             * @returns {ol.layer.Base}
             */
            function findBy(layer, key, value) {

                if (layer.get(key) === value) {

                    return layer;
                }

                // Find recursively if it is a group
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


            function tablePopup(feature){

                if (feature) {
                    var content = "<div class='panel panel-default'>";
                    content += "<div class='panel-heading'><h6 class='panel-title'><i class='icon-accessibility'></i><b><u>" + feature.id.split('.')[0] + "</u></b></h6><a href=\"#\" id=\"popup-closer\" class=\"ol-popup-closer\" onclick=\"close_popup()\">Close</a></div>";
                    content += "<div class='panel-body'>"
                    content += "<table class='table table-bordered'>";
                    for (var name in feature.properties) {

                        if (name == 'image_link' || name == 'IMAGE_LINK' || name == 'foto' || name == 'FOTO') {
                            content += "<tr><td><b>" + name + "</b></td><td><b>:</b> </td><td><image class='img-responsive' src='" + feature.properties[name] + "' width='100'/></td></tr>";
                        }else{
                            content += "<tr><td><b>" + name + "</b></td><td><b>:</b> </td><td>" + feature.properties[name] + "</td></tr>";    
                        }
                    };
                    content += '</table>';
                    content += '</div>';
                    content += '</div>';
                }else{

                    var content = "<table class='table table-bordered'>";

                    content += '<tr><td>Data tidak ada</td></tr>';
                    content += '</table>';
                }

                return content; 
            }

            function tablePopupVector(feature){

                if (feature) {
                    var content = "<div class='panel panel-default'>";
                    content += "<div class='panel-heading'><h6 class='panel-title'><i class='icon-accessibility'></i><b><u>feature</u></b></h6><a href=\"#\" id=\"popup-closer\" class=\"ol-popup-closer\" onclick=\"close_popup()\">Close</a></div>";
                    content += "<div class='panel-body'>"
                    content += "<table class='table table-bordered'>";
                    for (var name in feature.getProperties()) {
                        
                        if (name == 'image_link' || name == 'IMAGE_LINK' || name == 'foto' || name == 'FOTO') {
                            content += "<tr><td><b>" + name + "</b></td><td><b>:</b> </td><td><image class='img-responsive' src='" + feature.getProperties()[name] + "' width='100'/></td></tr>";
                        
                        }else{
                            content += "<tr><td><b>" + name + "</b></td><td><b>:</b> </td><td>" + feature.getProperties()[name] + "</td></tr>";    
                        }
                    };
                    content += '</table>';
                    content += '</div>';
                    content += '</div>';
                }else{

                    var content = "<table class='table table-bordered'>";

                    content += '<tr><td>Data tidak ada</td></tr>';
                    content += '</table>';
                }

                return content; 
            }

            

            function updateInteractiveLayers(layer) {
                var index = $.inArray(layer, intLayers);//intLayers.indexOf(layer);
                if(index > -1) {
                        intLayers.splice(index,1);
                } else {
                        intLayers.push(layer);
                }
                intLayersString = intLayers.join(',');
            };

            function ZoomToLayer(name) {
               // var featurePrefix = 'rth',featureType='publik';
                var layername = name;
                
                var url = '/geoserver/wms?request=GetCapabilities&service=WMS&version=1.1.1';
                var parser = new ol.format.WMSCapabilities();
                $.ajax(url).then(function(response) {
                    var result = parser.read(response);
                    var Layers = result.Capability.Layer.Layer;
                    var extent,extent_;
                    for (var i=0, len = Layers.length; i<len; i++) {
                        var layerobj = Layers[i];
                        if (layerobj.Name == layername) {
                            extent = layerobj.BoundingBox[0].extent;
                            //extent_= ol.proj.transformExtent(extent,'EPSG:32748','EPSG:4326');
                            break;
                        }
                    }
                    console.log(extent);
                    if(extent){   

                         map.getView().fit(extent, map.getSize());    
                    }
                    console.log(extent);
                    
                });
            }


            function ZoomToLayerManual(extent){
                map.getView().fit(extent, map.getSize());
            }

            function getGeoserverLayer () {
                
                var url = '/geoserver/wms?request=GetCapabilities&service=WMS&version=1.1.1&info_format=text/html';
                var parser = new ol.format.WMSCapabilities();
                $.ajax({
                    url: url,
                    dataType : 'json',
                }).then(function(response) {
                    console.log(json);
                    var result = parser.read(response);
                    var Layers = result.Capability.Layer.Layer;
                    for (var i=0, len = Layers.length; i<len; i++) {
                        var layerobj = Layers[i];
                        geoserver_layer.push(layerobj);
                    }

                    
                });
            }

        
            function updateFilter(){
            
                var filterType = 'cql';
                var filter = $('.textSearch').val();
                // by default, reset all filters
                var filterParams = {
                  'FILTER': null,
                  'CQL_FILTER': null,
                  'FEATUREID': null
                };
                if (filter.replace(/^\s\s*/, '').replace(/\s\s*$/, '') != "") {
                    if (filterType == "cql") {
                        filterParams["CQL_FILTER"] = filter;
                    }
                    if (filterType == "ogc") {
                        filterParams["FILTER"] = filter;
                    }
                    if (filterType == "fid")
                        filterParams["FEATUREID"] = filter;
                    }
                    // merge the new filter definitions
                    map.getLayers().forEach(function(lyr) {
                    
                        if(lyr.get('id') == 'rth:privat'){
                            lyr.getSource().updateParams(filterParams);
                            console.log(lyr.getSource());
                        
                        //map.getView().fit(extent, map.getSize()); 
                        }
                    });

            }

            function resetFilter() {
                $('.filter').val("");
                updateFilter();
            }

            
            function ZoomToLayerManual(extent){
                map.getView().fit(extent, map.getSize());
            }

            function getGeoserverLayer() {
                
                var url = '/geoserver/wms?request=GetCapabilities&service=WMS&version=1.1.1&info_format=text/html';
                var parser = new ol.format.WMSCapabilities();
                $.ajax({
                    url: url,
                    dataType : 'json',
                }).then(function(response) {
                    console.log(json);
                    var result = parser.read(response);
                    var Layers = result.Capability.Layer.Layer;
                    for (var i=0, len = Layers.length; i<len; i++) {
                        var layerobj = Layers[i];
                        geoserver_layer.push(layerobj);
                    }

                    
                });
            }

            function updateFilter(){
            
                var filterType = 'cql';
                var filter = $('.textSearch').val();
                // by default, reset all filters
                var filterParams = {
                  'FILTER': null,
                  'CQL_FILTER': null,
                  'FEATUREID': null
                };
                if (filter.replace(/^\s\s*/, '').replace(/\s\s*$/, '') != "") {
                    if (filterType == "cql") {
                        filterParams["CQL_FILTER"] = filter;
                    }
                    if (filterType == "ogc") {
                        filterParams["FILTER"] = filter;
                    }
                    if (filterType == "fid")
                        filterParams["FEATUREID"] = filter;
                    }
                    // merge the new filter definitions
                    map.getLayers().forEach(function(lyr) {
                    
                        if(lyr.get('id') == 'rth:privat'){
                            lyr.getSource().updateParams(filterParams);
                            console.log(lyr.getSource());
                        
                        //map.getView().fit(extent, map.getSize()); 
                        }
                    });

            }

            function resetFilter() {
                $('.filter').val("");
                updateFilter();
            }

            function getLegend(layers) {    

                for (var i = 0; i < layers.length; i++) {
                    if (layers[i] instanceof ol.layer.Group) {
                        var layersFromGroup = layers[i].getLayers().getArray();
                        for (var j=0; j < layersFromGroup.length; j++){
                            if (layersFromGroup[j].get('showLegend') === true) {
                                try {
                                    var url = layersFromGroup[j].getSource().getUrls()[0];
                                } catch (err) {
                                    var url = layersFromGroup[j].getSource().getUrl();
                                }
                                var legendImg = document.createElement('img');
                                legendImg.src = url + '?REQUEST=GetLegendGraphic&sld_version=1.0.0&layer=' + layersFromGroup[j].getSource().getParams().layers + '&format=' + format;
                                legendDiv.appendChild(legendImg);
                            }
                        }
                    } else {
                        if (layers[i].get('showLegend') === true) {
                            try {
                                var url = layers[i].getSource().getUrls()[0];
                            } catch (err) {
                                var url = layers[i].getSource().getUrl();
                            }
                            var legendImg = document.createElement('img');
                            legendImg.src = url + '?REQUEST=GetLegendGraphic&sld_version=1.0.0&layer=' + layers[i].getSource().getParams().layers + '&format=' + format;
                            legendDiv.appendChild(legendImg);
                        }
                    }

                }
                    
                //$('#legend').html(legendDiv);
            }


            function getLegend(layers) {
                

                for (var i = 0; i < layers.length; i++) {
                    if (layers[i] instanceof ol.layer.Group) {
                        var layersFromGroup = layers[i].getLayers().getArray();
                        for (var j=0; j < layersFromGroup.length; j++){
                            if (layersFromGroup[j].get('showLegend') === true) {
                                try {
                                    var url = layersFromGroup[j].getSource().getUrls()[0];
                                } catch (err) {
                                    var url = layersFromGroup[j].getSource().getUrl();
                                }
                                var legendImg = document.createElement('img');
                                legendImg.src = url + '?REQUEST=GetLegendGraphic&sld_version=1.0.0&layer=' + layersFromGroup[j].getSource().getParams().layers + '&format=' + format;
                                legendDiv.appendChild(legendImg);
                            }
                        }
                    } else {
                        
                            var legendImg = document.createElement('img');
                            legendImg.src = '/geoserver/wms' + '?REQUEST=GetLegendGraphic&sld_version=1.0.0&layer=' + layers[i].source_layer + '&format=image/png';
                            legendDiv.appendChild(legendImg);
                        
                    }

                }
                //console.log(legendDiv);
                //$('#legend').html(legendDiv);
            }

     


            function loadlayersingleobject(argument) {
                for (layer in overlays) {
                    var wmsSource = new ol.source.TileWMS({     
                        url: '/geoserver/wms',
                        params: {
                            'LAYERS': overlays[layer],
                            'VERSION': '1.1.1',
                            'FORMAT': 'image/png', 
                            tiled: true,
                        },
                    });
                    var wmsLayerTile = new ol.layer.Tile({
                        source: wmsSource,
                        visible: true,
                        name: layer,
                        id: overlays[layer]
                    });
                    map.addLayer(wmsLayerTile);
                    singleAllLayers = wmsLayerTile;
                };
            }

            function QueryVectorLayer() {
                $param = {
                    service:'WFS',
                    version:'1.0.0',
                    request:'GetFeature',
                    typeName:'rth:publik',
                    outputFormat:'application/json'
                }
                var url = '/geoserver/ows?'+ $.param($param);
                
                $.ajax({
                    url: url,
                    dataType : 'json',
                }).then(function(response) {
                    console.log(response);
                    var vectorSource = new ol.source.Vector({
                        features: (new ol.format.GeoJSON()).readFeatures(response)
                    });
                    
                    var vectorLayer = new ol.layer.Vector({
                        source: vectorSource,
                        id:'vector',
                        name:'vector'        
                    });
                    map.addLayer(vectorLayer); 
                }); 
            }

            function identifyLayer(layer = 'all') {

                if (toolPlugin.identify === true) {
                map.on('click', function(evt) {
                    
                    coordinate = evt.coordinate;
                
                    var feature = map.forEachFeatureAtPixel(evt.pixel, function(feature, layer) {
                        return feature;
                    });

                    if (feature) {
                        content = tablePopupVector(feature);
                        contentPopup.innerHTML = content;
                        popup.setPosition(coordinate);
                    }else{
                        if (selectedLayer == 'all') {
                            var url = singleAllLayers
                                .getSource()
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
                            var url = layer
                                .getSource()
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

                        var url = singleAllLayers
                        .getSource()
                        .getGetFeatureInfoUrl(
                            evt.coordinate,
                            map.getView().getResolution(),
                            map.getView().getProjection(),
                            {
                                'INFO_FORMAT': 'application/json',
                                //'propertyName': '*',
                                'FEATURE_COUNT': 50
                            }
                        );

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
                            var feature = data.features[0];
                                $('#loading').hide();
                                content = tablePopup(feature);
                                contentPopup.innerHTML = content;
                                popup.setPosition(evt.coordinate);
                                //popup.show(evt.coordinate, content);
                            
                        });   
                    }

                });
                }
            }

            function LayerTreeAction() {
                // Handle opacity slider control
                $('.opacity').slider({step: 0.1,value:0.5,min: 0,max: 1}).on('slide', function(ev) {
                    var layername = $(this).closest('ul').data('layerid');
                    var layer = findBy(map.getLayerGroup(), 'name', layername);
                    $( ".vopacity" ).val($( this ).slider( "value" ) );
                    layer.setOpacity($( ".vopacity" ).val());
                    //console.log(ev);
                });

                // Handle visibility control
                $('i').on('click', function() {
                    var layername = $(this).closest('li').data('layerid');
                    var layer = findBy(map.getLayerGroup(), 'name', layername);

                    layer.setVisible(!layer.getVisible());

                    if (layer.getVisible()) {
                        $(this).removeClass('fa-square-o').addClass('fa-check-square');
                    } else {
                        $(this).removeClass('fa-check-square').addClass('fa-square-o');
                    }
                });
            }

            function getSelectInfo() {
                var option = '';
                for (var i=0;i<intLayers.length;i++){
                   option += '<option value="'+ intLayers[i] + '">' + intLayers[i] + '</option>';
                }
                $('#identify').append(option);
                $('#identify').change(function(e) {
                    selectedLayer = $(this).val();
                    if (selectedLayer != "") {

                    }else{
                        selectedLayer = "all";
                    }
                   
                });

            }

            function close_popup(argument) {
                popup.setPosition(undefined);
                
                return false;
            }

            function change_action(aksi){
                if (aksi=='info') {
                    toolPlugin.identify = true;
                    toolPlugin.draw = false;
                }else if (aksi=='draw') {
                    toolPlugin.draw = true;
                    toolPlugin.identify = false;
                }else{
                    toolPlugin.identify = true;
                    toolPlugin.draw = false;   
                }

                if(toolPlugin.draw){
                    InitDraw();
                }else if(toolPlugin.identify){
                    identifyLayer();
                }
            }

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



            $(function() {
                initMap();

                overlaysOBJ = $.getValues("/map/openlayers/getlayers");
                objLayer(overlaysOBJ);
                initializeTree();
                //change_action('draw');
                var drawButton = $('#drawButton');
                drawButton.click(function (e) {
                    console.log(toolPlugin);
                    change_action('draw');

                });
                change_action('info');

                

                
                
                //overlaysOBJ = $.getValues("/map/openlayers/getlayers");
                //objLayer(overlaysOBJ);
                //accordionDisable()
                //initializeTree();

               

                //identifyLayer();
                //getSelectInfo();


            });