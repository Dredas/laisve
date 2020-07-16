<?php

namespace App\Http\Controllers\Admin;

use App\County;
use App\Http\Controllers\Controller;

class MapController extends Controller
{
    public function show()
    {
        return view('map.all');
    }

    public function districts($id)
    {
        $county = County::find($id);

        return view('map.districts',
            [
                'county' => $county,
            ]
        );
    }
}
