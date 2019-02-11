<?php

namespace App\Http\Controllers;
use App\College;

use Illuminate\Http\Request;

class TrialController extends Controller
{
    public function trial(){
        $a = [3, 4, 5];
        $b = [7, 9, 10];

        $max_price = College::min('price');
        dd($max_price);

        // dd(cosine_similarity($a, $b));
    }
}
