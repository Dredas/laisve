<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Votes extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];
}
