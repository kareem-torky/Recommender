<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('admin.login');
    }

    public function authenticate(Request $request){
        $request->validate([
    		'email'=>'required|email',
    		'password'=>'required|string|min:8|max:25',
        ]);
        
    	$remember = request()->has('remember') ? true: false;
    	if(\Auth::guard('admin')->attempt(['email'=>request('email'),'password'=>request('password')],$remember))
    	{
    		return redirect(route('admin.intro.index'));
    	}
    	else
    	{
            $request->session()->flash('login-failure', 'failed');         
            return redirect(route('admin.login'))->withInput();
    	}
    }

    public function logout()
    {
    	auth()->guard('admin')->logout();
    	return redirect(route('admin.login'));
    }
}
