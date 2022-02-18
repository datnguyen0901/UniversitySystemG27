<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
        public function view(){
        return view('role.view');
    }

        public function create(Request $request){
        $role = new Role();
        $role->name = $request->name;
        $role->save();
        return redirect('/role/view');
    }

        public function update(Request $request){
        $role = Role::find($request->id);
        $role->name = $request->name;
        $role->save();
        return redirect('/role/view');
    }

        public function delete(Request $request){
        $role = Role::find($request->id);
        $role->delete();
        return redirect('/role/view');
    }   
}
