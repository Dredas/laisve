import 'ol/ol.css';
import View from 'ol/View';
import Map from 'ol/Map';
import {fromLonLat} from 'ol/proj';
import {Point} from 'ol/geom';
import Feature from 'ol/Feature';
import {Tile as TileLayer, Vector as VectorLayer} from 'ol/layer';
import BingMaps from 'ol/source/BingMaps';
import KML from 'ol/format/KML';
import VectorSource from 'ol/source/Vector';
import {Style, Icon} from "ol/style";
import Fill from "ol/style/Fill";
import Stroke from "ol/style/Stroke";
import {OSM} from 'ol/source';

var defaultLayer = new TileLayer({
    source: new OSM()
});

var sourceBingMaps = new BingMaps({
    key: 'AvVdLIYuVCwDsUFEDG4g-PW05hOw3NgCDw_9nSQdUc-6DcNGjFqNJRyBKWTo4095',
    imagerySet: 'RoadOnDemand',
    culture: 'lt-LT',
});

var bingMapsRoad = new TileLayer({
    preload: Infinity,
    source: sourceBingMaps
});

var bingMapsAerial = new TileLayer({
    preload: Infinity,
    source: new BingMaps({
        key: 'AvVdLIYuVCwDsUFEDG4g-PW05hOw3NgCDw_9nSQdUc-6DcNGjFqNJRyBKWTo4095',
        imagerySet: 'AerialWithLabelsOnDemand',
    }),
    maxZoom: 25
});


//Colors
var activeStyle = new Style({
    fill: new Fill({
        color: 'rgba(255,221,0,0.6)'
    }),
    stroke: new Stroke({
        color: '#FFFFFF',
        width: 2
    })
});

var inactiveStyle = new Style({
    fill: new Fill({
        color: 'rgba(246,0,96,0.6)'
    }),
    stroke: new Stroke({
        color: '#FFFFFF',
        width: 2
    })
});

var activeHighlightStyle = new Style({
    fill: new Fill({
        color: 'rgba(255,221,0,0.7)'
    }),
    stroke: new Stroke({
        color: '#FFFFFF',
        width: 2
    })
});

var inactiveHighlightStyle = new Style({
    fill: new Fill({
        color: 'rgba(246,0,96,0.7)'
    }),
    stroke: new Stroke({
        color: '#FFFFFF',
        width: 2
    })
});


window.onload = () => {
    //Main map
    var target = document.getElementById('map');

    if(target) {
        var vector = new VectorLayer({
            source: new VectorSource({
                url: '/map/all.kml',
                format: new KML(),
                extractStyles: true,
                id: 'map',
            })
        });

        var map = new Map({
            layers: [bingMapsRoad, vector],
            target,
            view: new View({
                center: [2706874, 7380000],
                zoom: 7.5
            })
        });

        map.on('click', function(e) {
            map.forEachFeatureAtPixel(e.pixel, function (feature) {
                location.href = 'map/' + feature.values_.OBJECTID;

            })
        });


        var selected = null;

        map.on('pointermove', function(e) {
            if (selected !== null) {
                if(selected.values_.ACTIVE === "1") {
                    selected.setStyle(activeStyle);
                } else {
                    selected.setStyle(inactiveStyle);
                }

                selected = null;
            }

            map.forEachFeatureAtPixel(e.pixel, function(f) {
                selected = f;

                if(selected.values_.ACTIVE === "1") {
                    f.setStyle(activeHighlightStyle);
                } else {
                    f.setStyle(inactiveHighlightStyle);
                }

                return true;
            });
        });
    }


    ////DISTRICTS
    target = document.getElementById('districts');

    var dKml = (typeof districtsKML=== 'undefined') ? null : districtsKML;

    if(dKml) {
        var selectedDistricts = null;

        var districtsVector = new VectorLayer({
            opacity: 0.5,
            source: new VectorSource({
                url: dKml,
                format: new KML(),
                extractStyles: true,
            })
        });

        var myMarkers = [
            new Feature({
                geometry: new Point(fromLonLat([25.35247, 55.84673]))
            })
        ];

        var iconStyle = new Style({
            image: new Icon( ({
                anchor: [40, 46],
                anchorXUnits: 'pixels',
                anchorYUnits: 'pixels',
                src: '/images/marker.png',
                size: [50, 50]
            }))
        });

        myMarkers.forEach(function(marker) {
            marker.setStyle(iconStyle);
        });

        var markers = new VectorLayer({
            source: new VectorSource({
                features: myMarkers
            })
        });

        var districtsMap = new Map({
            layers: [defaultLayer, districtsVector, markers],
            target,
            view: new View({
                center: [2706874, 7380000],
                zoom: 7.5
            })
        });

        districtsMap.getViewport().addEventListener('contextmenu', function (evt) {
            evt.preventDefault();
            console.log(districtsMap.getEventCoordinate(evt));

        });

        districtsMap.on('click', function (e) {
            districtsMap.forEachFeatureAtPixel(e.pixel, function (feature, layer) {
                console.log(feature);
            })
        });


        // districtsMap.on('pointermove', function (e) {
        //     if (selectedDistricts !== null) {
        //         if (selectedDistricts.values_.ACTIVE === "1") {
        //             selectedDistricts.setStyle(activeStyle);
        //         } else {
        //             selectedDistricts.setStyle(inactiveStyle);
        //         }
        //
        //         selectedDistricts = null;
        //     }
        //
        //     districtsMap.forEachFeatureAtPixel(e.pixel, function (f) {
        //         selectedDistricts = f;
        //
        //         if (selectedDistricts.values_.ACTIVE === "1") {
        //             f.setStyle(activeHighlightStyle);
        //         } else {
        //             f.setStyle(inactiveHighlightStyle);
        //         }
        //
        //         return true;
        //     });
        // });
    }

}
