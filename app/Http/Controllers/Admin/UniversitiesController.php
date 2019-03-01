<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\University;
use App\College;

class UniversitiesController extends Controller
{
    public function index(){
        $data['universities'] = University::orderBy('id', 'DESC')->paginate(15);
        return view('admin.universities.index')->with($data);
    }

    public function create(){
        return view('admin.universities.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:70'
        ]);
        University::create($data);
        return redirect(route('admin.universities.index'));
    }

    public function destroy(Request $request, University $university){
        $id = $university->id;
        $name = $university->name;
        $related_colleges = College::where('university', $name)->get();
        foreach ($related_colleges as $college) {
            $college->delete();
        }
        University::destroy($id);

        return redirect(route('admin.universities.index'));
    }
}
