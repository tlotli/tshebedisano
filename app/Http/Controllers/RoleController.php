<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $roles = DB::table('users')
	                     ->join('roles', 'users.id', '=', 'roles.user_id')
	                     ->select('users.*', 'roles.*')
	                     ->get();

	    return view('role.index' , compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    $permissions = Permission::all();
	    $permissions_count = Permission::all()->count();

	    if($permissions_count < 1) {
	    	Session::flash('warning' , 'Please add permissions first before creating roles');
	    	return redirect()->back();
	    }
	    else {
		    return view('role.create' , compact('permissions'));
	    }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
        	'name' => 'required|unique:roles',
        	'permission_id' => 'required',
        ],
	    [
		    'name.required' => 'Role name is required',
		    'permission_id.required' => 'Please select one or more permissions from the permissions lists',
	    ]);

        $role = new Role();
        $role->user_id = Auth::id();
        $role->name = $request->name;
        $role->slug = str_slug($request->name);
        $role->save();
        $role->permissions()->sync($request->permission_id);
        Session::flash('success' , 'User role was created successfully');
        return redirect(route('roles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	    $role = Role::find($id);
	    $permissions = Permission::all();
	    return view('role.edit' , compact('role' ,'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    	$role = Role::find($id);

    	if($role->name == $request->name) {
		    $this->validate($request , [
			    'name' => 'required',
			    'permission_id' => 'required',
		    ],
			    [
				    'name.required' => 'Role name is required',
				    'permission_id.required' => 'Please select one or more permissions from the permissions lists',
			    ]);

		    $role = Role::find($id);
		    $role->user_id = Auth::id();
		    $role->name = $request->name;
		    $role->slug = str_slug($request->name);
		    $role->save();
		    $role->permissions()->sync($request->permission_id);
		    Session::flash('success' , 'User role was successfully updated');
		    return redirect(route('roles.index'));

	    }
	    else {
		    $this->validate($request , [
			    'name' => 'required|unique:roles',
			    'permission_id' => 'required',
		    ],
			    [
				    'name.required' => 'Role name is required',
				    'permission_id.required' => 'Please select one or more permissions from the permissions lists',
			    ]);

		    $role = Role::find($id);
		    $role->user_id = Auth::id();
		    $role->name = $request->name;
		    $role->slug = str_slug($request->name);
		    $role->save();
		    $role->permissions()->sync($request->permission_id);
		    Session::flash('success' , 'User role was successfully updated');
		    return redirect(route('roles.index'));
	    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
