<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script>
        var map;
        var src = 'https://filebin.net/phqauj7szfwxvsnk/Ausros.kml?t=ga93k4lw';
        //var src2 = 'https://developers.google.com/maps/documentation/javascript/examples/kml/westcampus.kml';

        function initMap() {
            map = new google.maps.Map(document.getElementById('map-canvas'), {
                center: new google.maps.LatLng(55.2145906, 20.8726929),
                zoom: 10,
                mapTypeId: 'terrain'
            });

            var kmlLayer = new google.maps.KmlLayer(src, {
                suppressInfoWindows: true,
                preserveViewport: false,
                map: map
            });

            // var kmlLayer2 = new google.maps.KmlLayer(src2, {
            //     suppressInfoWindows: true,
            //     preserveViewport: false,
            //     map: map
            // });

            kmlLayer.addListener('click', function(event) {

            });
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7GYhX46baN2z1m93jdLaesNHshn-uG3w&callback=initMap">
    </script>

    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .container, .container > div, .container > div #map-canvas {
            height: inherit;
        }
    </style>
</head>

<body>
<div class="container">
    <div>
        <div id="map-canvas"></div>
    </div>
</div>
</body>

</html>
<?php /**PATH /home/dredas/lp/web/laisvespartija/resources/views/map.blade.php ENDPATH**/ ?>