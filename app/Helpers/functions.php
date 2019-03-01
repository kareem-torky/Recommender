<?php
use App\College;

if (!function_exists('cosine_similarity')) {
    function cosine_similarity($x, $y) {
        $nom = ($x[0]*$y[0]) + ($x[1]*$y[1]) + ($x[2]*$y[2]);
        $denom = sqrt(($x[0])**2 + ($x[1])**2 + ($x[2])**2) * sqrt(($y[0])**2 + ($y[1])**2 + ($y[2])**2);
        return $nom/$denom;
    }
}

if (!function_exists('gender_convert')) {
    function gender_convert($student_gender) {
        if($student_gender == 'male'){
            return ['Boys', 'Both'];
        } else if($student_gender == 'female') {
            return ['Girls', 'Both'];
        }
    }
}

if (!function_exists('select_group')) {
    function select_group($speciality) {
        $group1 = ['Medical', 'Dentistry', 'Pharmacy', 'Nursing'];
        $group2 = ['Engineering', 'Technology', 'Scientific', 'Agriculture'];
        $group3 = ['Relegious', 'Arts', 'Community', 'Social', 'Economical', 'Home Economics', 'Languages'];
        if(in_array($speciality, $group1)) return $group1;
        else if(in_array($speciality, $group2)) return $group2;
        else if(in_array($speciality, $group3)) return $group3;
    }
}

if (!function_exists('get_selected_ids')) {
    function get_selected_ids($colleges) {
        foreach ($colleges as $key => $college) {
            $ids[$key] = $college->id;
        }
        return $ids;
    }
}


if (!function_exists('calc_mean')) {
    function calc_mean($x) {
        $len = count($x);
        $sum = 0;
        foreach ($x as $val) {
            $sum += $val;
        }
        return $sum/$len;
    }
}

if (!function_exists('get_displayed_colleges')) {
    function get_displayed_colleges($colleges, $similarities, $diff = null) {
        $ids = get_selected_ids($colleges);
        $ids_vs_sim = array_combine($ids, $similarities);
        arsort($ids_vs_sim);
        $sorted_ids = array_keys($ids_vs_sim);
        foreach ($sorted_ids as $key => $sorted_id) {
            $displayed_colleges[$key] = College::where('id', $sorted_id)->first();
            if(($diff==null && $key==4) || ($diff!=null && $key==$diff-1)){
                break;
            }
        }
        return $displayed_colleges;
    }
}

if (!function_exists('get_collegesV_norm')) {
    function get_collegesV_norm($colleges) {
        $collegesV = [];
        $collegesV_norm = [];
        foreach ($colleges as $key => $college) {
            $collegeV = [$college['gpa'], $college['price'], $college['rating']];
            $collegesV[$key] = $collegeV;
            $collegeV_mean = calc_mean($collegeV);
            $collegeV_norm = [$college['gpa']-$collegeV_mean, $college['price']-$collegeV_mean, $college['rating']-$collegeV_mean];    
            $collegesV_norm[$key] = $collegeV_norm;
        }
        return $collegesV_norm;
    }
}

if (!function_exists('get_image')) {
    function get_image($path_image) {
        return url('/uploads/colleges/' . $path_image);
    }
}


//  pathes 

define("UPLOADS_PATH", "uploads/");
define("COLLEGES_PATH", "colleges/");