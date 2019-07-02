<?php

namespace App\Http\Controllers;

use App\Log;
use App\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RepositoryController extends Controller
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
	    $title = 'Manage Repositories';
	    $font_style = 'fa fa-folder';

	    $repository = DB::table('users')
	                     ->join('repositories', 'users.id', '=', 'repositories.user_id')
	                     ->orderBy('repositories.name' ,'asc')
	                     ->select('users.*', 'repositories.*')
	                     ->get();

	    return view('repositories.index' , compact('repository' , 'title' ,'font_style'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    $title = 'Manage Repositories';
	    $font_style = 'fa fa-folder';
        return view('repositories.create' , compact('title' ,'font_style'));
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
		    'name' => 'required|unique:repositories',
	    ],
		[
			'name.required' => 'Repository name is required',
		]);

	    $repository = new Repository();
	    $repository->name = $request->name;
	    $repository->user_id = Auth::id();
	    $repository->save();

	    $log = Log::create([
		    'log' => Auth::user()->firstname . ' ' . Auth::user()->lastname . 'Created the following repository ' . $request->name . ' at ' . $repository->created_at ,
	    ]);

	    Session::flash('success' , 'Repository was successfully added');
	    return redirect(route('repositories.index'));
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
    public function edit($id)
    {

	    $title = 'Manage Repositories';
	    $font_style = 'fa fa-folder';

        $repository = Repository::find($id);
        return view('repositories.edit', compact('repository' ,'title' ,'font_style'));
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

    	$old_rep = Repository::find($id);

	    $this->validate($request , [
		    'name' => 'required|unique:repositories',
	    ],
		    [
			    'name.required' => 'Repository name is required',
		    ]);

	    $repository = Repository::find($id);
	    $repository->name = $request->name;
	    $repository->user_id = Auth::id();
	    $repository->save();

	    $log = Log::create([
		    'log' => Auth::user()->firstname . ' ' . Auth::user()->lastname . ' Changed the repository name from ' . $old_rep->name . ' to ' . $request->name  . ' at ' . $repository->updated_at ,
	    ]);

	    Session::flash('success' , 'Repository was successfully updated');
	    return redirect(route('repositories.index'));
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
