<?php

namespace App\Methods;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class Hash
{

    public static function getUniqueMapFileHash($length = 6)
    {
        $hash = Str::random($length);

        while (DB::table('counties')->where(DB::raw('BINARY `file_hash`'), $hash)->count() > 0) {
            $hash = self::getUniqueUserHash();
        }

        return $hash;
    }
}
