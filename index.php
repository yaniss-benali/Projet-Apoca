<!DOCTYPE HTML>
<html>
  <head>
    <title>OpenLayers Demo</title>
    <style type="text/css">
      html, body, #basicMap {
          width: 100%;
          height: 100%;
          margin: 0;
      }
    </style>
    <script src="http://www.openlayers.org/api/OpenLayers.js"></script>
    <script>
      function init() {
        map = new OpenLayers.Map("basicMap");
        var mapnik = new OpenLayers.Layer.OSM();
        map.addLayer(mapnik);
        map.setCenter(new OpenLayers.LonLat( 2.352684100000033,48.856924) // Centre de la carte
          .transform(
            new OpenLayers.Projection("EPSG:4326"), // transformation de WGS 1984
            new OpenLayers.Projection("EPSG:900913") // en projection Mercator sphérique
          ), 15 // Zoom level
        );
      }
    </script>
  </head>
  <body onload="init();">
    <div id="basicMap"></div>
  </body>
</html>