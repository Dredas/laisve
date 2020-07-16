<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script>
        var map;

        @foreach ($counties as $county)
            var src{{$county->id}} = 'http://lp.koronainfo.lt/m/all.kml';
        @endforeach

        function initMap() {
            map = new google.maps.Map(document.getElementById('map-canvas'), {
                center: new google.maps.LatLng(55.2145906, 20.8726929),
                zoom: 10,
                mapTypeId: 'terrain'
            });

                @foreach ($counties as $county)
                var kmlLayer{{$county->id}} = new google.maps.KmlLayer(src{{$county->id}}, {
                        suppressInfoWindows: true,
                        preserveViewport: false,
                        map: map
                    });

                kmlLayer{{$county->id}}.addListener('click', function (event) {
                    console.log(event);
                });
                @endforeach
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key={{$key}}&callback=initMap">
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
