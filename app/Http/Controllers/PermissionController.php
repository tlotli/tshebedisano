<?php

namespace App\Http\Controllers;

use App\Permission;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
    	if(!Auth::user()) {
    		return redirect('/');
	    }
    }

	public function index()
    {
    	$permissions = DB::table('users')
	                     ->join('permissions', 'users.id', '=', 'permissions.user_id')
		                 ->orderBy('permissions.permission_type')
	                     ->select('users.*', 'permissions.*')
	                     ->get();
        return view('permission.index' , compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permission.create');
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
        	'name' => 'required|unique:permissions',
        ],
	    [
	        'name.required' => 'Permission name is required',
	    ]);

        $permission = new Permission();
        $permission->name = $request->name;
        $permission->permission_type = $request->permission_type;
        $permission->user_id = Auth::id();
        $permission->slug = str_slug($request->name);
        $permission->save();

        Session::flash('success' , 'Permission was added successfully');
        return redirect(route('permissions.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function edit($id) {
		$permission = Permission::where('id' , $id)->first();
		return view('permission.edit' , compact('permission'));
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
	    $this->validate($request , [
		    'name' => 'required|unique:permissions',
	    ],
		[
			'name.required' => 'Permission name is required',
		]);

	    $permission = Permission::find($id);
	    $permission->name = $request->name;
	    $permission->permission_type = $request->permission_type;
	    $permission->user_id = Auth::id();
	    $permission->slug = str_slug($request->name);
	    $permission->save();

	    Session::flash('success' , 'Permission was added updated');
	    return redirect(route('permissions.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	Permission::destroy($id);
	    Session::flash('danger' , 'Permission was successfully deleted');
	    return redirect(route('permissions.index'));
    }
}
