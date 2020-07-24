<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];

    public function votes()
    {
        return $this->hasMany('App\Votes', 'candidate');
    }

}
