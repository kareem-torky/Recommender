<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
}
