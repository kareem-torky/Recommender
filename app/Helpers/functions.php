<?php

if (!function_exists('cosine_similarity')) {
    function cosine_similarity($x, $y) {
        $x_mag = $y_mag = $xy_corr = $x_mean = $y_mean = 0;
        foreach ($x as $key => $value){
            $x_mean += $x[$key];
            $y_mean += $y[$key];
        }
        $x_mean /= 3;
        $y_mean /= 3;

        foreach ($x as $key => $value) {
            $x[$key] -= $x_mean;
            $y[$key] -= $y_mean;
            $x_mag += $x[$key] ** 2;
            $y_mag += $y[$key] ** 2;
            $xy_corr += $x[$key] * $y[$key];
        }
        $x_mag = sqrt($x_mag);
        $y_mag = sqrt($y_mag);

        return $xy_corr/($x_mag * $y_mag);    
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

if (!function_exists('get_selected_ids')) {
    function get_selected_ids($colleges) {
        foreach ($colleges as $key => $college) {
            $ids[$key] = $college->id;
        }
        return $ids;
    }
}

if (!function_exists('college_to_vector')) {
    function college_to_vector($colleges) {
        foreach ($colleges as $key => $college) {
            $colleges_v[$key] = ['gpa' => $college['gpa'], 'price' => $college['price'], 'rating' => $college['rating']];
        }
        return $colleges_v;
    }
}


if (!function_exists('normalize_vector')) {
    function normalize_vector($vector, $min_max_arr) {
        $vector_n = [
            ($vector['gpa']-$min_max_arr['min_gpa']) / ($min_max_arr['max_gpa']-$min_max_arr['min_gpa']),
            ($vector['price']-$min_max_arr['min_price']) / ($min_max_arr['max_price']-$min_max_arr['min_price']),
            ($vector['rating']-$min_max_arr['min_rating']) / ($min_max_arr['max_rating']-$min_max_arr['min_rating'])
        ];
        return $vector_n;
    }
}
