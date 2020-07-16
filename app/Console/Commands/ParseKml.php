<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\Support\Facades\DB;

class ParseKml extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kml:parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse data from XML';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $xml = XmlParser::load(base_path('storage/maps/map.kml'));
        $map = $xml->getContent();

        foreach ($map->Document->Folder->Placemark as $v) {
            $name = $v->ExtendedData->SchemaData->SimpleData[0];
            $population = $v->ExtendedData->SchemaData->SimpleData[2];
            $no = $v->ExtendedData->SchemaData->SimpleData[4];

            $countyId = DB::table('counties')->insertGetId(
                ['name' => $name, 'no' => $no, 'population' => $population]
            );

            if (isset($v->Polygon)) {
                $coords = $v->Polygon->outerBoundaryIs->LinearRing->coordinates;

                self::insertCoords($countyId, $coords);
            }

            if (isset($v->MultiGeometry)) {
                $multi = $v->MultiGeometry->Polygon;

                foreach ($multi as $m) {
                    $coords = $m->outerBoundaryIs->LinearRing->coordinates;

                    self::insertCoords($countyId, $coords);
                }
            }

            echo " " . $name;
        }
        echo 'OK';
    }

    private function insertCoords($countyId, $coords) {
        $exploded = explode(',', $coords);

        $polygonId = DB::table('counties_polygons')->insertGetId(
            ['county_id' => $countyId]
        );

        $chunk = array_chunk($exploded, 2);
        foreach ($chunk as $key => $c) {
            //LONG
            $lng = $c[0];
            if (substr($lng, 0, 2) === '0 ') {
                $lng = substr($lng, 2);
            }
            $lng = str_replace(' ', '', $lng);

            if(!isset($c[1])) {
                continue;
            }

            //LAT
            $lat = $c[1];
            $lat = str_replace(' ', '', $lat);


            DB::table('counties_polygons_data')->insertGetId(
                ['polygon_id' => $polygonId, 'lat' => $lat, 'lng' => $lng]
            );
        }
    }
}
