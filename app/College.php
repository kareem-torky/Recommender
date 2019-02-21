<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'college', 
        'university',
        'speciality', 
        'desc', 
        'gender',
        'gpa',
        'price',
        'rating',
        'image'
    ];    
}
