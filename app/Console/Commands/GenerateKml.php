<?php

namespace App\Console\Commands;

use App\County;
use App\CountyPolygons;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GenerateKml extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kml:generate';

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
        $counties = County::all();

        $content = '<?xml version="1.0" encoding="utf-8" ?>
    <kml xmlns="http://www.opengis.net/kml/2.2">
        <Document id="root_doc">';

        foreach ($counties as $county) {
            if($county->active) {
                 $color = '00ddff';
            } else {
                $color = '6000e6';
            }

            $content .= '
            <StyleMap id="style-' . $county->id . '">
                <Pair>
                    <key>normal</key>
                    <styleUrl>#style-' . $county->id . '-normal</styleUrl>
                </Pair>
                <Pair>
                    <key>highlight</key>
                    <styleUrl>#style-' . $county->id . '-highlight</styleUrl>
                </Pair>
            </StyleMap>

            <Style id="style-' . $county->id . '-normal">
                <LineStyle>
                    <color>ffffffff</color>
                    <width>2</width>
                </LineStyle>
                <PolyStyle>
                    <color>99'.$color.'</color>
                </PolyStyle>
            </Style>
            <Style id="style-' . $county->id . '-highlight">
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


        foreach ($counties as $county) {

            $polygons = CountyPolygons::where(['county_id' => $county->id])->get();
            $content .= '
                <Placemark>
                    <styleUrl>#style-'.$county->id.'</styleUrl>
                    <ExtendedData>
                        <SchemaData schemaUrl="#OGRGeoJSON">
                            <SimpleData name="OBJECTID">' . $county->id . '</SimpleData>
                            <SimpleData name="APG_PAV">' . $county->name . '</SimpleData>
                            <SimpleData name="ACTIVE">' . $county->active . '</SimpleData>
                        </SchemaData>
                   </ExtendedData>';

            if (count($polygons) > 1) {
                $content .= '<MultiGeometry>';
            }

            foreach ($polygons as $polygon) {
                $polygonData = DB::table('counties_polygons_data')->where('polygon_id', $polygon->id)->get();

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

        // Delete Files
        $files = Storage::disk('public_maps')->allFiles();
        Storage::disk('public_maps')->delete($files);

        //Add file
        Storage::disk('public_maps')->put('all.kml', $content);

        echo 'OK';
    }

}
