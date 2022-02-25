<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
        public function index(){
            $roles = Role::all();

            return view('role.role') -> with(compact('roles'));
    }

        public function create(){
            return view('role.createrole');
    }

        public function store(Request $request){    
            $role = new Role;
            $role->name = $request->name;
            $role->save();
            return redirect('/role')->with('success','Role created successfully');
        }

        public function edit(Role $role)
        {
            return view('role.editrole',compact('role'));
        }
      
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \App\role  $role
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, Role $role)
        {
            $request->validate([
                'name' => 'required',
            ]);
      
            $role->update($request->all());
      
            return redirect('/role')->with('success','Role updated successfully');
        }
      
        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\role  $role
         * @return \Illuminate\Http\Response
         */
        public function destroy(Role $role)
        {
            $role->delete();
      
            return redirect('/role')->with('success','Role deleted successfully');
        }
} 

