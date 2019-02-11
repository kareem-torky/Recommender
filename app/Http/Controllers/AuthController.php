<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
    	return view('login');
	}
	


  	public function authenticate(Request $request)
    {
    	$request->validate([
    		'email'=>'required|email',
    		'password'=>'required|string|min:8|max:25',
        ]);
        
    	$remember = request()->has('remember') ? true: false;
    	if(\Auth::guard('student')->attempt(['email'=>request('email'),'password'=>request('password')],$remember))
    	{
    		return redirect(route('homepage'));
    	}
    	else
    	{
            $request->session()->flash('login-failure', 'failed');         
            return redirect(route('login'))->withInput();
    	}
	}
	
	

    public function logout()
    {
    	auth()->guard('student')->logout();
    	return redirect(route('intro'));
    }
}
