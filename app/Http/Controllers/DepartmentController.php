<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(){

        $departments = Department::all();

        return view('department.department' , compact('departments'));
}

    public function create(){
        return view('department.createdepartment');
}

    public function store(Request $request){    
        $department = new Department;
        $department->name = $request->name;
        $department->save();
        return redirect('/department')->with('success','Department created successfully');
    }

    public function edit(Department $department)
    {
        return view('department.editdepartment',compact('department'));
    }
  
    public function update(Request $request, department $department)
    {
        $request->validate([
            'name' => 'required',
        ]);
  
        $department->update($request->all());
  
        return redirect('/department')->with('success','Department updated successfully');
    }
  
    public function destroy(Department $department)
    {
        $department->delete();
  
        return redirect('/department')->with('success','Department deleted successfully');
    }
} 

