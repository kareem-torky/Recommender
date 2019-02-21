<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Speciality;

class SpecialitiesController extends Controller
{
    public function index(){
        $data['specialities'] = Speciality::paginate(15);
        return view('admin.specialities.index')->with($data);
    }

    public function create(){
        return view('admin.specialities.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:30'
        ]);
        Speciality::create($data);
        return redirect(route('admin.specialities.index'));
    }

    public function destroy(Request $request, Speciality $speciality){
        $id = $speciality->id;
        Speciality::destroy($id);
        return redirect(route('admin.specialities.index'));
    }
}
