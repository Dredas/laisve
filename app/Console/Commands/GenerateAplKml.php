<?php

namespace App\Console\Commands;

use App\CountyPolygons;
use App\District;
use App\DistrictPolygons;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GenerateAplKml extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kml:generate_apl';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate KML files';

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
        $districtsGrouped = District::all()->groupBy('country_no');

        // Delete Files
        $files = Storage::disk('public_districts')->allFiles();
        Storage::disk('public_districts')->delete($files);


        foreach ($districtsGrouped as $districts) {

        $content = '<?xml version="1.0" encoding="utf-8" ?>
    <kml xmlns="http://www.opengis.net/kml/2.2">
        <Document id="root_doc">';

        foreach ($districts as $district) {
            if($district->active) {
                 $color = '00ddff';
            } else {
                $color = '6000e6';
            }

            $content .= '
            <StyleMap id="style-' . $district->id . '">
                <Pair>
                    <key>normal</key>
                    <styleUrl>#style-' . $district->id . '-normal</styleUrl>
                </Pair>
                <Pair>
                    <key>highlight</key>
                    <styleUrl>#style-' . $district->id . '-highlight</styleUrl>
                </Pair>
            </StyleMap>

            <Style id="style-' . $district->id . '-normal">
                <LineStyle>
                    <color>ffffffff</color>
                    <width>2</width>
                </LineStyle>
                <PolyStyle>
                    <color>99'.$color.'</color>
                </PolyStyle>
            </Style>
            <Style id="style-' . $district->id . '-highlight">
                <LineStyle>
                    <color>ffffffff</color>
                    <width>5</width>
                </LineStyle>
                <PolyStyle>
                    <color>99'.$color.'</color>
                </PolyStyle>
            </Style>
            ';
        }


        $content .= '<Schema name="OGRGeoJSON" id="OGRGeoJSON">
                <SimpleField name="OBJECTID" type="int"></SimpleField>
                <SimpleField name="ACTIVE" type="int"></SimpleField>
                <SimpleField name="APG_PAV" type="string"></SimpleField>
            </Schema>

            <Folder>
                <name>OGRGeoJSON</name>';


        foreach ($districts as $district) {

            $polygons = DistrictPolygons::where(['district_id' => $district->id])->get();
            $content .= '
                <Placemark>
                    <styleUrl>#style-'.$district->id.'</styleUrl>
                    <ExtendedData>
                        <SchemaData schemaUrl="#OGRGeoJSON">
                            <SimpleData name="OBJECTID">' . $district->id . '</SimpleData>
                            <SimpleData name="APL_PAV">' . $district->name . '</SimpleData>
                            <SimpleData name="ACTIVE">' . $district->active . '</SimpleData>
                        </SchemaData>
                   </ExtendedData>';

            if (count($polygons) > 1) {
                $content .= '<MultiGeometry>';
            }

            foreach ($polygons as $polygon) {
                $polygonData = DB::table('districts_polygons_data')->where('polygon_id', $polygon->id)->get();

                $coordinates = '';
                foreach ($polygonData as $pd) {
                    $coordinates .= $pd->lng . ',' . $pd->lat . ' ';
                }

                $coordinates = mb_substr($coordinates, 0, -1);
                $coordinates = trim(preg_replace('/\t+/', '', $coordinates));

                $content .= '
                        <Polygon>
                            <outerBoundaryIs>
                                <LinearRing>
                                    <coordinates>' . $coordinates . '</coordinates>
                                </LinearRing>
                             </outerBoundaryIs>
                        </Polygon>';
            }

            if (count($polygons) > 1) {
                $content .= '</MultiGeometry>';
            }

            $content .= '
                </Placemark>';

        }

        $content .= '
            </Folder>
        </Document>
    </kml>';

            Storage::disk('public_districts')->put($district->country_no . '.kml', $content);
        }

        //Add file

        echo 'OK';
    }

}
