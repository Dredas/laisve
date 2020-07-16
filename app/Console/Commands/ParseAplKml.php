<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\Support\Facades\DB;

class ParseAplKml extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kml:parse_apl';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse data from KML';

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
        $xml = XmlParser::load(base_path('storage/maps/apylinkes.kml'));

        $map = $xml->getContent();

        foreach ($map->Document->Folder->Placemark as $v) {
            $name = $v->ExtendedData->SchemaData->SimpleData[0];
            $municipality = $v->ExtendedData->SchemaData->SimpleData[1];
            $country_name = $v->ExtendedData->SchemaData->SimpleData[2];
            $no = $v->ExtendedData->SchemaData->SimpleData[3];
            $country_no = $v->ExtendedData->SchemaData->SimpleData[6];

            $districtId = DB::table('districts')->insertGetId(
                ['name' => $name, 'no' => $no, 'country_no' => $country_no, 'country_name' => $country_name, 'municipality' => $municipality]
            );

            if (isset($v->Polygon)) {
                $coords = $v->Polygon->outerBoundaryIs->LinearRing->coordinates;

                self::insertCoords($districtId, $coords);
            }

            if (isset($v->MultiGeometry)) {
                $multi = $v->MultiGeometry->Polygon;

                foreach ($multi as $m) {
                    $coords = $m->outerBoundaryIs->LinearRing->coordinates;

                    self::insertCoords($districtId, $coords);
                }
            }

            echo " " . $name;
        }
        echo 'OK';
    }

    private function insertCoords($districtId, $coords) {
        $coords = trim(preg_replace('/\t+/', '', $coords));
        $exploded = explode(' ', $coords);

        $polygonId = DB::table('districts_polygons')->insertGetId(
            ['district_id' => $districtId]
        );

        foreach ($exploded as $coord) {
            $coordExploded = explode(',', $coord);

            DB::table('districts_polygons_data')->insertGetId(
                ['polygon_id' => $polygonId, 'lat' => $coordExploded[1], 'lng' => $coordExploded[0]]
            );
        }
    }
}
