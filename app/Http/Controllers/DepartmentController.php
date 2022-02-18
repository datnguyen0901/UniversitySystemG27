<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    //

    public function view(){
        $departments = Department::all();
        return view('department.view', compact('departments'));
    }

    public function create(Request $request){
        $department = new Department();
        $department->name = $request->name;
        $department->save();
        return redirect('/department/view');
    }

    public function update(Request $request){
        $department = Department::find($request->id);
        $department->name = $request->name;
        $department->save();
        return redirect('/department/view');
    }

    public function delete(Request $request){
        $department = Department::find($request->id);
        $department->delete();
        return redirect('/department/view');
    }   
}
