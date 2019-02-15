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
            'price' => 'required|numeric|min:1000|max:10000'
        ]);
        
        $student_id = auth('student')->user()->id;
        $student = Student::find($student_id);

        // Getting Student data
        $student_list = [
            'gender' => $student->gender,
            'speciality'=> $data['speciality'],
            'gpa'=> $student->gpa,
            'price'=> (int)$data['price']
        ];

        // Forming Student vector
        $student_v = ['gpa'=>$student_list['gpa'], 'price'=>$student_list['price']];

        // Converting male to Boys & Both, female to Grils & Both
        $gender = gender_convert($student->gender);

        $data['specialities'] = Speciality::all();
        
        // Fetch available colleges from the db
        $main_colleges = College::where([
            ['speciality', '=', $student_list['speciality']],
            ['gpa', '<=', $student_list['gpa']],
            ['price', '<=', $student_list['price']]
            ])->whereIn('gender', $gender)->get();

        
        if($main_colleges){
            $num = count($main_colleges);
            if($num < 5){
                // Select cluster
                $cluster = select_cluster($data['speciality']);

                $diff = 5 - $num;
                $added_colleges = College::where([
                    ['gpa', '<=', $student_list['gpa']],
                    ['price', '<=', $student_list['price']]
                    ])->whereIn('gender', $gender)->whereIn('speciality', $cluster)->limit($diff)->get();
                $colleges = $main_colleges->toBase()->merge($added_colleges);
            } else {
                $colleges = $main_colleges;
            }
            $ids = get_selected_ids($colleges);
        } else {
            session()->flash('error', 'No Colleges Available For These Options');
            return redirect(route('homepage'));
        }

        // Forming college vectors and finding the mean
        $colleges_v = [];
        foreach ($colleges as $key => $college) {
            $college_v = college_to_vector($college);
            $colleges_v[$key] = $college_v;
            $mean = calc_mean($student_v, $college_v);
            $means[$key] = $mean;
        }

        // Adjusting the vectors by subtracting the mean then calculating similarity

        foreach ($colleges_v as $key => $college_v) {
            $x = [$student_v['gpa']-$mean, $student_v['price']-$mean];
            $y = [$college_v['gpa']-$mean, $college_v['price']-$mean];
            $similarities[$key] = cosine_similarity($x, $y);
        }


        $ids_vs_sim = array_combine($ids, $similarities);
        arsort($ids_vs_sim);
        $sorted_ids = array_keys($ids_vs_sim);

        foreach ($sorted_ids as $key => $sorted_id) {
            $displayed_colleges[$key] = College::where('id', $sorted_id)->first();
            if($key == 4) break;
        }
        $data['colleges'] = $displayed_colleges;
    
        dd($student_list, $student_v, $colleges, $num, $colleges_v, $means, $similarities, $sorted_ids, $ids_vs_sim, $data['colleges']);
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