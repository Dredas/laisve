<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];

    public function candidateRelation()
    {
        return $this->belongsTo('App\Candidate', 'candidate', 'id');
    }

    public function countyRelation()
    {
        return $this->belongsTo('App\County', 'county', 'id');
    }

    public function districtRelation()
    {
        return $this->belongsTo('App\District', 'district', 'id');
    }

    public function partyRelation()
    {
        return $this->belongsTo('App\Party', 'party', 'id');
    }
}
