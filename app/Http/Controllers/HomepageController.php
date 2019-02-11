<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Speciality;

class HomepageController extends Controller
{
    public function index(){
        $data['specialities'] = Speciality::all();
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

        dd($student_list);

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
        return redirect(route('settings'));
    }
}
