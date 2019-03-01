<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Intro;

class IntroController extends Controller
{
    public function index(){
        $data['intro'] = Intro::first();
        return view('intro')->with($data);
    }
}
