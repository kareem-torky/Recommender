<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class RegisterController extends Controller
{
    public function signup(){
        return view('signup');
    }

    public function addStudent(Request $request){
        $data = $request->validate([
            'name' => 'required|string|min:5|max:30',
            'email' => 'required|email',
            'password' => 'required|string|min:8|max:25',
            'gender' => 'required',
            'gpa' => 'required|numeric|min:0|max:100'
        ]);
    
        $data['password'] = bcrypt($data['password']);
        Student::create($data);
        return redirect(route('login'));
    }
}
