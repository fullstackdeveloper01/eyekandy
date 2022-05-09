<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'country';

    public function items()
    {
        return $this->hasMany('App\State','country_id','id');
    }

    // public function restorant()
    // {
    //     return $this->belongsTo('App\Restorant');
    // }
}
