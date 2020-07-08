<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    //
    protected $table = "Cars";

    protected $fillable = [

    		'make',
    		'model',
    		'image',
    		'year'

    ];
}
