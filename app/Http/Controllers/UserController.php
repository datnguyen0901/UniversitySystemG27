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
        $users = User::where('name', 'like', '%' . $request->name . '%')->get();
        return view('users.list',compact('users'));
    
        // while(true)
        // {
        //     if ($request->name == null) {
        //         if ($request->role_id == null) {
        //             if ($request->department_id == null) {
        //                 return back()->with('error', 'No data found');
        //             }
        //             else {
        //                 $users = User::where('department_id', $request->department_id)->get();
        //                 return view('users.edit', compact('users'));
        //             }
        //         } else {
        //             $users = User::where('role_id', $request->role_id)->get();
        //             return view('users.edit', compact('users'));
        //         }
        //     } else {
        //         $users = User::where('name', 'like', '%'.$request->name.'%')->get();
        //         return view('users.edit', compact('users'));
        //     }            
        // }
    }

    public function modify(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->department_id = $request->department_id;
        $user->save();
        return redirect('/users/edit');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->department_id = $request->department_id;
        $user->role_id = $request->role_id;
        $user->save();
        return redirect('/users/edit');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/users/edit');
    }
}