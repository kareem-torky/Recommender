<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\University;

class UniversitiesController extends Controller
{
    public function index(){
        $data['universities'] = University::paginate(15);
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
        University::destroy($id);
        return redirect(route('admin.universities.index'));
    }
}
