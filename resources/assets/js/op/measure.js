var measureTools = {};
measureTools.sketch;
measureTools.helpTooltipElement;
measureTools.helpTooltip;
measureTools.measureTooltipElement;
measureTools.measureTooltip;
measureTools.continuePolygonMsg = 'Click to continue drawing the polygon';      
measureTools.continueLineMsg = 'Click to continue drawing the line';
measureTools.draw; // global so we can remove it later
measureTools.typeSelect = document.getElementById('type');
measureTools.map = window.map;

function pointerMoveHandler(evt) {
  if (evt.dragging) {
    return;
  }
  /** @type {string} */
  var helpMsg = 'Click to start drawing';

  if (measureTools.sketch) {
    var geom = (measureTools.sketch.getGeometry());
    if (geom instanceof ol.geom.Polygon) {
      helpMsg = measureTools.continuePolygonMsg;
    } else if (geom instanceof ol.geom.LineString) {
      helpMsg = measureTools.continueLineMsg;
    }
  }

  measureTools.helpTooltipElement.innerHTML = helpMsg;
  measureTools.helpTooltip.setPosition(evt.coordinate);

  measureTools.helpTooltipElement.classList.remove('hidden');
}
function formatLength(line) {
  var length = ol.Sphere.getLength(line);
  var output;
  if (length > 100) {
    output = (Math.round(length / 1000 * 100) / 100) +
        ' ' + 'km';
  } else {
    output = (Math.round(length * 100) / 100) +
        ' ' + 'm';
  }
  return output;
}
function formatArea(polygon) {
  var area = ol.Sphere.getArea(polygon);
  var output;
  if (area > 10000) {
    output = (Math.round(area / 1000000 * 100) / 100) +
        ' ' + 'km<sup>2</sup>';
  } else {
    output = (Math.round(area * 100) / 100) +
        ' ' + 'm<sup>2</sup>';
  }
  return output;
}
function createHelpTooltip() {
  if (measureTools.helpTooltipElement) {
    measureTools.helpTooltipElement.parentNode.removeChild(measureTools.helpTooltipElement);
  }
  measureTools.helpTooltipElement = document.createElement('div');
  measureTools.helpTooltipElement.className = 'tooltip hidden';
  measureTools.helpTooltip = new ol.Overlay({
    element: measureTools.helpTooltipElement,
    offset: [15, 0],
    positioning: 'center-left'
  });
  map.addOverlay(measureTools.helpTooltip);
}
function createMeasureTooltip() {
  if (measureTools.measureTooltipElement) {
    measureTools.measureTooltipElement.parentNode.removeChild(measureTools.measureTooltipElement);
  }
  measureTools.measureTooltipElement = document.createElement('div');
  measureTools.measureTooltipElement.className = 'tooltip tooltip-measure';
  measureTools.measureTooltip = new ol.Overlay({
    element: measureTools.measureTooltipElement,
    offset: [0, -15],
    positioning: 'bottom-center'
  });
  map.addOverlay(measureTools.measureTooltip);
}
function addInteraction() {
  var type = (measureTools.typeSelect.value == 'area' ? 'Polygon' : 'LineString');
  measureTools.draw = new ol.interaction.Draw({
    source: findBy(map.getLayerGroup(), 'id', 'lyr_vector').getSource(),
    type: (type),
    style: new ol.style.Style({
      fill: new ol.style.Fill({
        color: 'rgba(255, 255, 255, 0.2)'
      }),
      stroke: new ol.style.Stroke({
        color: 'rgba(0, 0, 0, 0.5)',
        lineDash: [10, 10],
        width: 2
      }),
      image: new ol.style.Circle({
        radius: 5,
        stroke: new ol.style.Stroke({
          color: 'rgba(0, 0, 0, 0.7)'
        }),
        fill: new ol.style.Fill({
          color: 'rgba(255, 255, 255, 0.2)'
        })
      })
    })
  });  
  map.addInteraction(measureTools.draw);

  createMeasureTooltip();
  createHelpTooltip();

  var listener;
  measureTools.draw.on('drawstart',
      function(evt) {
        // set sketch
        measureTools.sketch = evt.feature;

        var tooltipCoord = evt.coordinate;

        listener = measureTools.sketch.getGeometry().on('change', function(evt) {
          var geom = evt.target;
          var output;
          if (geom instanceof ol.geom.Polygon) {
            output = formatArea(geom);
            measureTools.tooltipCoord = geom.getInteriorPoint().getCoordinates();
          } else if (geom instanceof ol.geom.LineString) {
            output = formatLength(geom);
            measureTools.tooltipCoord = geom.getLastCoordinate();
          }
          measureTools.measureTooltipElement.innerHTML = output;
          measureTools.measureTooltip.setPosition(measureTools.tooltipCoord);
        });
      }, this);

      measureTools.draw.on('drawend',
      function() {
        measureTools.measureTooltipElement.className = 'tooltip tooltip-static';
        measureTools.measureTooltip.setOffset([0, -7]);
        // unset sketch
        measureTools.sketch = null;
        // unset tooltip so that a new one can be created
        measureTools.measureTooltipElement = null;
        createMeasureTooltip();
        ol.Observable.unByKey(listener);
      }, this);
}
function initMeasure(){
  map.on('pointermove', pointerMoveHandler);
  map.getViewport().addEventListener('mouseout', function() {
    measureTools.helpTooltipElement.classList.add('hidden');
  });
  measureTools.typeSelect.onchange = function() {
    map.removeInteraction(measureTools.draw);
    addInteraction();
  };
  addInteraction();
}