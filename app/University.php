<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
}
