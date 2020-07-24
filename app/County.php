<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    protected $guarded = ['id'];

    public function votes()
    {
        return $this->hasMany('App\Votes', 'county');
    }
}
