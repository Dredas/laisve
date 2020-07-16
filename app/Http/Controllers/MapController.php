<?php

namespace App\Http\Controllers;

use App\County;

class MapController extends Controller
{
    public function show()
    {
        $counties = County::limit(1)->get();

        return view('map.counties',
            [
                'key' => 'AIzaSyB7GYhX46baN2z1m93jdLaesNHshn-uG3w',
                'counties' => $counties,
            ]
        );
    }
}
