<?php

namespace App\Http\Controllers;

use App\Log;
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
	public function __construct() {
		$this->middleware('auth');
	}

    public function index()
    {
	    $title = 'Manage Roles';
	    $font_style = 'fa fa-lock';

	    $roles = DB::table('users')
	                     ->join('roles', 'users.id', '=', 'roles.user_id')
	                     ->select('users.*', 'roles.*')
	                     ->get();

	    return view('role.index' , compact('roles' ,'title' ,'font_style'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    $title = 'Create Role';
	    $font_style = 'fa fa-lock';

	    $permissions = Permission::all();
	    $permissions_count = Permission::all()->count();

	    if($permissions_count < 1) {
	    	Session::flash('warning' , 'Please add permissions first before creating roles');
	    	return redirect()->back();
	    }
	    else {
		    return view('role.create' , compact('permissions' ,'title' ,'font_style'));
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

	    $log = Log::create([
		    'log' => Auth::user()->firstname . ' ' . Auth::user()->lastname . ' Created the following role ' . $role->name . ' ' .  $role->created_at ,
	    ]);

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
	    $title = 'Edit Roles';
	    $font_style = 'fa fa-lock';

	    $role = Role::find($id);
	    $permissions = Permission::all();
	    return view('role.edit' , compact('role' ,'permissions' ,'title' ,'font_style'));
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

    	$old_role = Role::find($id);

    	if($old_role->name == $request->name) {
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


		    $log = Log::create([
			    'log' => Auth::user()->firstname . ' ' . Auth::user()->lastname . ' Updated the following role ' . $old_role->name . ' to ' . $role->name . ' at ' .  $role->updated_at ,
		    ]);


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

		    $log = Log::create([
			    'log' => Auth::user()->firstname . ' ' . Auth::user()->lastname . ' Updated the following role ' . $old_role->name . ' to ' . $role->name . ' at ' .  $role->updated_at ,
		    ]);

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
