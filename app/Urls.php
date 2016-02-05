<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Urls extends Model
{
    //
    protected $guarded=[];
    public static function get_unique_short_url()
    {
        $short=base_convert(rand(10000,99999),10,36);
        $recored=Urls::where('short',$short)->first();
        if(! empty($recored)){
            static::get_unique_short_url();
        }
        return $short;
    }
}
