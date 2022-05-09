<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    // public function user()
    // {
    //     return $this->belongsTo('App\User','user_id','name');
    // }

    // public function show()
    // {
    //     return $this->belongsTo('App\Package','show_type');
    // }

    // public function country()
    // {
    //     return $this->belongsTo('App\Country','country_id');
    // }
}
