<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $table = 'advertisements';
    protected $fillable = ['title','thumbnail','start_date','end_date','link','user_id','created_by','approve'];
}
