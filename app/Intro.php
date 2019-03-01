<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intro extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'title', 
        'section1',
        'section2'
    ];

}
