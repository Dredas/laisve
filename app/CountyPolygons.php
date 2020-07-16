<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountyPolygons extends Model
{
    protected $guarded = ['id'];

    protected $table = 'counties_polygons';
}
