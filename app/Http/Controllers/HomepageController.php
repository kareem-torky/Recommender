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
        $studentV = [$student_list['gpa'], $student_list['price'], 1];
        $studentV_mean = calc_mean($studentV);
        $studentV_norm = [];
        foreach ($studentV as $key => $value) {
            $studentV_norm[$key] = $value - $studentV_mean;
        }

        // Converting male to Boys & Both, female to Grils & Both
        $gender = gender_convert($student->gender);
        $data['specialities'] = Speciality::all();
        
        // Fetch available colleges from the db
        $main_colleges = College::where([
            ['speciality', '=', $student_list['speciality']],
            ['gpa', '<=', $student_list['gpa']],
            ['price', '<=', $student_list['price']]
            ])->whereIn('gender', $gender)->get();
        
        if(count($main_colleges) < 5){
            // Select group
            $diff = 5 - count($main_colleges);
            $group = select_group($data['speciality']);
            $added_colleges = College::where([
                ['gpa', '<=', $student_list['gpa']],
                ['price', '<=', $student_list['price']]
                ])->whereIn('gender', $gender)->whereIn('speciality', $group)->get();
            if(count($main_colleges)==0 && count($added_colleges)==0){
                session()->flash('error', 'No Colleges Available For These Options');
                return redirect(route('homepage'));
            }
        }

        //dd($main_colleges, $added_colleges, count($main_colleges), count($added_colleges));
        if(count($main_colleges) != 0){
            $collegesV_norm = get_collegesV_norm($main_colleges);
            foreach ($collegesV_norm as $key => $collegeV_norm) {
                $similarities[$key] = cosine_similarity($collegeV_norm, $studentV_norm);
            }
            $displayed_colleges = get_displayed_colleges($main_colleges, $similarities);
        }
        
        if(count($added_colleges) != 0){
            $collegesV_norm = get_collegesV_norm($added_colleges);
            foreach ($collegesV_norm as $key => $collegeV_norm) {
                $similarities[$key] = cosine_similarity($collegeV_norm, $studentV_norm);
            }
            $added_displayed_colleges = get_displayed_colleges($added_colleges, $similarities, $diff);
        }

        //dd($displayed_colleges, $added_displayed_colleges);
        if(isset($displayed_colleges) && isset($added_displayed_colleges)){
            $data['colleges'] = array_merge($displayed_colleges, $added_displayed_colleges); 
        } else if(isset($displayed_colleges) && !isset($added_displayed_colleges)){
            $data['colleges'] = $displayed_colleges;
        } else if(!isset($displayed_colleges) && isset($added_displayed_colleges)){
            $data['colleges'] = $added_displayed_colleges;
        } else {
            $data['colleges'] = [];
        }
      
        //dd($main_colleges, $collegesV_norm, $ids, $similarities, $ids_vs_sim)
        return view('homepage')->with($data);
    }

    public function viewCollege(College $college){
        $data['college'] = $college;
        return view('college')->with($data);
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