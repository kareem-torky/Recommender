<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Intro;

class IntroController extends Controller
{
    public function index(){
        $data['intro'] = Intro::first();
        return view('admin.intro.index')->with($data);
    }

    public function update(Request $request){
        $data = $request->validate([
            'title' => 'required|string',
            'section1' => 'required|string',
            'section2' => 'required|string'
        ]);

        $content = Intro::first();
        $content->title = $data['title'];
        $content->section1 = $data['section1'];
        $content->section2 = $data['section2'];
        $content->save();
        return redirect(route('admin.intro.index'));
    }
}
