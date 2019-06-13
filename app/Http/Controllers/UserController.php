<?php

namespace App\Http\Controllers;

use App\Repository;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
	public function index() {

		$users = User::all();
		return view('users.index' , compact('users'));
	}

    public function create() {
    	$role = Role::all();
		$repositories = Repository::all();
    	return view('users.create' ,compact('role' ,'repositories'));
    }

    public function store(Request $request) {
    	$this->validate($request , [
		    'firstname' => 'required|string|max:255',
		    'lastname' => 'required|string|max:255',
		    'email' => 'required|string|email|max:255|unique:users',
		    'password' => 'required|string|min:6|confirmed',
		    'role_id' => 'required',
		    'repository_id' => 'required',
	    ],
	    [
	    	'role_id.required' => 'Please select role for the user',
	    	'repository_id.required' => 'Please select repositories for the user',
	    ]);

    	$user = new User();
    	$user->firstname = $request->firstname;
    	$user->lastname = $request->lastname;
    	$user->email = $request->email;
    	$user->user_id = Auth::id();
    	$user->password = Hash::make($request->password);
    	$user->save();

    	$user->repositories()->sync($request->repository_id);
    	$user->roles()->sync($request->role_id);

    	Session::flash('success' ,'User was successfully created');
    	return redirect(route('user.index'));
    }

    public function edit($id) {
		$user = User::find($id);
	    $role = Role::all();
	    $repositories = Repository::all();
		return view('users.edit', compact('user' , 'role' ,'repositories'));
    }

    public function update(Request $request , $id) {
	    $user = User::find($id);
	    if($user->email == $request->email) {
		    $this->validate($request , [
			    'firstname' => 'required|string|max:255',
			    'lastname' => 'required|string|max:255',
			    'email' => 'required|string|email|max:255',
			    'role_id' => 'required',
			    'repository_id' => 'required',
		    ],
			    [
				    'role_id.required' => 'Please select role for the user',
				    'repository_id.required' => 'Please select repositories for the user',
			    ]);

		    $user->firstname = $request->firstname;
		    $user->lastname = $request->lastname;
		    $user->email = $request->email;
		    $user->user_id = Auth::id();
		    $user->save();

		    $user->repositories()->sync($request->repository_id);
		    $user->roles()->sync($request->role_id);

		    Session::flash('success' ,'User was successfully updated');
		    return redirect(route('user.index'));

	    }
	    else {

		    $this->validate($request , [
			    'firstname' => 'required|string|max:255',
			    'lastname' => 'required|string|max:255',
			    'email' => 'required|string|email|max:255|unique:users',
			    'role_id' => 'required',
			    'repository_id' => 'required',
		    ],
			    [
				    'role_id.required' => 'Please select role for the user',
				    'repository_id.required' => 'Please select repositories for the user',
			    ]);

		    $user->firstname = $request->firstname;
		    $user->lastname = $request->lastname;
		    $user->email = $request->email;
		    $user->user_id = Auth::id();
		    $user->save();

		    $user->repositories()->sync($request->repository_id);
		    $user->roles()->sync($request->role_id);

		    Session::flash('success' ,'User was successfully updated');
		    return redirect(route('user.index'));
	    }
    }
}
