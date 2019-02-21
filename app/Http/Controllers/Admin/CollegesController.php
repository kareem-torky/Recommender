<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Classes\UploadClass;
use App\College;
use App\Speciality;
use App\University;
use File;

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

    public function create(){
        $data['specialities'] = Speciality::all();
        $data['universities'] = University::all();
        return view('admin.colleges.create')->with($data);
    }

    public function store(Request $request){
        $data = $request->validate([
            'college' => 'required|string',
            'university' => 'required|string',
            'speciality' => 'required|string',
            'desc' => 'required|string',
            'gender' => 'required',
            'gpa' => 'required|numeric|min:0|max:100',
            'price' => 'required|numeric',
            'rating' => 'required|numeric',
            'image' => 'required|image|dimensions:ratio=4/3',
        ]);

        $image = UploadClass::uploadImage($request, 'image', COLLEGES_PATH);
        $data['image'] = $image;

        College::create($data);
        return redirect(route('admin.colleges.index'));
    }

    public function edit(College $college){
        $data['college'] =$college;
        $data['specialities'] = Speciality::all();
        $data['universities'] = University::all();
        return view('admin.colleges.edit')->with($data);
    }

    public function update(College $college, Request $request){
        $data = $request->validate([
            'college' => 'required|string',
            'university' => 'required|string',
            'speciality' => 'required|string',
            'desc' => 'required|string',
            'gender' => 'required',
            'gpa' => 'required|numeric|min:0|max:100',
            'price' => 'required|numeric',
            'rating' => 'required|numeric',
            'image' => 'image|nullable|dimensions:ratio=4/3',
        ]);

        if($request->hasFile('image')){
            $old_image = $college->image;
            if($old_image != '1.jpg'){
                $path = UPLOADS_PATH. COLLEGES_PATH. $old_image;
                File::delete($path);
            }
            $image = UploadClass::uploadImage($request, 'image', COLLEGES_PATH);
            $data['image'] = $image;
        }

        $id = $college->id;
        College::updateOrCreate(['id'=>$id], $data);
        return redirect(route('admin.colleges.show', ['college'=>$id]));
    }

    public function destroy(College $college){
        $id = $college->id;
        $old_image = $college->image;
        $path = UPLOADS_PATH. COLLEGES_PATH. $old_image;
        File::delete($path);
        College::destroy($id);
        return redirect(route('admin.colleges.index'));
    }

}
