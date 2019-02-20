<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\College;

class CollegesController extends Controller
{
    public function index(){
        $data['colleges'] = College::paginate(15);
        return view('admin.colleges.index')->with($data);
    }

    public function show(College $college){
        $data['college'] =$college;
        return view('admin.colleges.show')->with($data);
    }

    public function edit(College $college){
        $data['college'] =$college;
        return view('admin.colleges.edit')->with($data);
    }

    public function update(College $college){
        return view('admin.colleges.edit')->with($data);
    }

    public function destroy(College $college){
        return view('admin.colleges.edit')->with($data);
    }

}
