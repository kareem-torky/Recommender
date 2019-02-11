<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function starter(){
        return view('starter');
    }

    public function homepage(){
        return view('homepage');
    }
}
