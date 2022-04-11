<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Role;
use App\Models\Department;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function show($id)
    {
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }

    public function edit()
    {
        $users = User::all();
        $roles = Role::all();
        $departments = Department::all();
        return view('users.edit',compact('users','roles','departments'));
    }

    public function find(Request $request)
    {
        if ($request->name == null) {
            return redirect('/useredit')->with('error', 'Please choose a method to find!');
        }
    }

    public function modify(Request $request)
    {
        $user = User::find($request->id);
        $user->role_name = Role::Select('name')->where('id', $user->role_id)->first()->name;
        $user->department_name = Department::Select('name')->where('id', $user->department_id)->first()->name;
        $roles = Role::all();
        $departments = Department::all();
        return view('users.modify',compact('user','roles','departments'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role_id' => 'required',
            'department_id' => 'required',
        ]);

        $user ->update($request->all());

        $users = User::where('name', 'like', '%' . $request->name . '%')->get();

        return view('users.list',compact('users'))->with('success','User updated successfully');

    }

    public function destroy($id)
    {
        return back()->with('error','User cannot be deleted please contact IT admin');
    }
}