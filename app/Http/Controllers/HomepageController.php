<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Speciality;
use App\College;

class HomepageController extends Controller
{
    public function index(){
        $data['specialities'] = Speciality::all();
        $data['colleges'] = [];
        return view('homepage')->with($data);
    }



    public function viewList(Request $request){
        $data = $request->validate([
            'speciality' => 'required',
            'price' => 'required|numeric|min:10000|max:30000'
        ]);
        
        $student_id = auth('student')->user()->id;
        $student = Student::find($student_id);

        $student_list = [
            'gender' => $student->gender,
            'speciality'=> $data['speciality'],
            'gpa'=> $student->gpa,
            'price'=> $data['price']
        ];

        $min_max_arr = ['min_gpa' => College::min('gpa'), 'max_gpa' => College::max('gpa'),
                        'min_price' => College::min('price'), 'max_price' => College::max('price'),
                        'min_rating' => College::min('rating'), 'max_rating' => College::max('rating')];

        $student_v = ['gpa'=>$student_list['gpa'], 'price'=>$student_list['price'], 'rating'=>$min_max_arr['min_rating']];
        $student_v_n = normalize_vector($student_v, $min_max_arr);

        $gender = gender_convert($student->gender);

        $data['specialities'] = Speciality::all();
        $colleges = College::where([
            ['speciality', '=', $student_list['speciality']],
            ['gpa', '<=', $student_list['gpa']],
            ['price', '<=', $student_list['price']]
            ])->whereIn('gender', $gender)->get();
        
        if($colleges){
            $ids = get_selected_ids($colleges);
        } else {
            session()->flash('error', 'No Colleges Available For These Options');
            return redirect(route('homepage'));
        }
        
        $colleges_v = college_to_vector($colleges);

        foreach ($colleges_v as $key => $college_v) {
            $colleges_v_n[$key] = normalize_vector($college_v, $min_max_arr);
            $similarities[$key] = cosine_similarity($student_v_n, $colleges_v_n[$key]);
        }

        $ids_vs_sim = array_combine($ids, $similarities);
        arsort($ids_vs_sim);
        $sorted_ids = array_keys($ids_vs_sim);
    
        $data['colleges'] = College::whereIn('id', $sorted_ids)->limit(5)->get();
        return view('homepage')->with($data);

    }

    public function settings(){
        $student_id = auth('student')->user()->id;
        $data['student'] = Student::find($student_id);

        return view('settings')->with($data);
    }

    public function settingsUpdate(Request $request){
        $data = $request->validate([
            'name' => 'required|string|min:5|max:30',
            'email' => 'required|email',
            'gender' => 'required',
            'gpa' => 'required|numeric|min:0|max:100'
        ]);

        $id = auth('student')->user()->id;
        Student::updateOrCreate(['id' => $id], $data);

        $request->session()->flash('edit-success', 'Sent successfully');
        return redirect(route('homepage'));
    }
}
