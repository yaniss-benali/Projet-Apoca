<!DOCTYPE HTML>
<html>
  <head>
      <link href="bootsrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="bootsrap/ico/demo-files/demo.cs" rel="stylesheet">
      <link href="bootsrap/ico/style.css" rel="stylesheet">
      <script src="bootsrap/js/bootstrap.min.js" ></script>
      <script src="bootsrap/js/bootstrap.js" ></script>
      <script src="bootsrap/ico/demo-files/demo.js" ></script>
      
    <title>OpenLayers Demo</title>
    <style type="text/css">
      html, body, #basicMap {site
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
    //Création d'un layer qui va contenir des marqueurs
    var markers = new OpenLayers.Layer.Markers( "Markers" );
    map.addLayer(markers);

    // creation d'un marqueur aux coordonnées longlat1 et transformation en coord de projection

    var lonLat1 = new OpenLayers.LonLat(2.352684100000033,48.856924)
    .transform(
    new OpenLayers.Projection("EPSG:4326"),
    map.getProjectionObject()
    );

    //creation d'un marqueur icone     
    var size = new OpenLayers.Size(30,30);
    var offset = new OpenLayers.Pixel(-(size.w/2), -size.h);
    var icon = new OpenLayers.Icon('../icon/mystere.png', size, offset);
    marker = new OpenLayers.Marker(lonLat1,icon);

    //ajout du marker      
    markers.addMarker(marker);

    //le marqueur devient intéractif: click : PC uniquement !
    marker.events.register("click", marker,cliquemarker);  
    //click ne marche pas sous openlayers sur mobile alors on met touchstart....
    marker.events.register("touchstart", marker,cliquemarker); 
      }
    </script>
  </head>
  <body onload="init();">
    <div id="basicMap"></div>
  </body>
</html>