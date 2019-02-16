<?php
if (!function_exists('cosine_similarity')) {
    function cosine_similarity($x, $y) {
        $nom = ($x[0]*$y[0]) + ($x[1]*$y[1]);
        $denom = sqrt(($x[0])**2 + ($x[1])**2) * sqrt(($y[0])**2 + ($y[1])**2);
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

if (!function_exists('select_cluster')) {
    function select_cluster($speciality) {
        $cluster1 = ['Medical', 'Dentistry', 'Pharmacy', 'Nursing'];
        $cluster2 = ['Engineering', 'Technology', 'Scientific', 'Agriculture'];
        $cluster3 = ['Relegious', 'Arts', 'Community', 'Social', 'Economical', 'Home Economics', 'Languages'];
        if(in_array($speciality, $cluster1)) return $cluster1;
        else if(in_array($speciality, $cluster2)) return $cluster2;
        else if(in_array($speciality, $cluster3)) return $cluster3;
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

if (!function_exists('college_to_vector')) {
    function college_to_vector($college) {
        $college_v = ['gpa' => $college['gpa'], 'price' => $college['price']];
        return $college_v;
    }
}

if (!function_exists('calc_mean')) {
    function calc_mean($x, $y) {
        $x_len = count($x);
        $y_len = count($y);
        if($x_len == $y_len){
            $counts = $x_len;
            $len = 2 * $x_len;
        } else {
            return false;
        }
        $sum = $x['gpa'] + $y['gpa'] + $x['price'] + $y['price'];
        return $sum/$len;
    }
}