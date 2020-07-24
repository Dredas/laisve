<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $guarded = ['id'];

    public function votes()
    {
        return $this->hasMany('App\Votes', 'district');
    }
}
