<?php

namespace App\Http\Controllers;

use App\Log;
use App\Repository;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {

		$title = 'Manage Users';
		$font_style = 'fa fa-users';
		$users = User::all();
		return view('users.index' , compact('users' ,'title' ,'font_style') );
	}

    public function create() {
	    $title = 'Create User';
	    $font_style = 'fa fa-users';
    	$role = Role::all();
		$repositories = Repository::all();
    	return view('users.create' , compact('role' ,'repositories' ,'title' ,'font_style'));
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

	    $log = Log::create([
		    'log' => Auth::user()->firstname . ' ' . Auth::user()->lastname . ' Added the following user ' . $user->firstname . ' ' . $user->lastname .  ' at ' . $user->created_at ,
	    ]);

    	$user->repositories()->sync($request->repository_id);
    	$user->roles()->sync($request->role_id);

    	Session::flash('success' ,'User was successfully created');
    	return redirect(route('user.index'));
    }

    public function edit($id) {
	    $title = 'Edit User';
	    $font_style = 'fa fa-users';
		$user = User::find($id);
	    $role = Role::all();
	    $repositories = Repository::all();
		return view('users.edit', compact('user' , 'role' ,'repositories' ,'font_style' ,'title'));
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

		    $log = Log::create([
			    'log' => Auth::user()->firstname . ' ' . Auth::user()->lastname . ' Updated the following user ' . $user->firstname . ' ' . $user->lastname .  ' information at ' . $user->updated_at ,
		    ]);

		    $user->repositories()->sync($request->repository_id);
		    $user->roles()->sync($request->role_id);

		    Session::flash('success' ,'User was successfully updated');
		    return redirect(route('user.index' ));

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

		    $log = Log::create([
			    'log' => Auth::user()->firstname . ' ' . Auth::user()->lastname . ' Updated the following user ' . $user->firstname . ' ' . $user->lastname .  ' information at ' . $user->updated_at ,
		    ]);

		    $user->repositories()->sync($request->repository_id);
		    $user->roles()->sync($request->role_id);

		    Session::flash('success' ,'User was successfully updated');
		    return redirect(route('user.index'));
	    }
    }


    public function reset_user_password($id) {

	    $title = 'Reset User Password';
	    $font_style = 'fa fa-key';
		$user = User::find($id);

	    return view('users.reset_password' , compact('title' , 'font_style' , 'user'));
    }


    public function update_user_password(Request $request , $id) {

		$this->validate($request , [
			'password' => 'required|string|min:6|confirmed',
		],
		[
			'password.required' => 'Password fields need to match',
		]);

		$user = User::find($id);
		$user->password = Hash::make($request->password);
		$user->save();


	    $log = Log::create([
		    'log' => Auth::user()->firstname . ' ' . Auth::user()->lastname . ' Updated the password of ' . $user->firstname . ' ' . $user->lastname .  ' at ' . $user->updated_at ,
	    ]);


	    Session::flash('success' ,'User password was successfully updated');
	    return redirect(route('user.index'));

    }


}
