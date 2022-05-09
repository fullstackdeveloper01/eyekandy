<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $table = 'zone';

    public function items()
    {
        return $this->hasMany('App\Items','category_id','id');
    }

    public function restorant()
    {
        return $this->belongsTo('App\Restorant');
    }
}
