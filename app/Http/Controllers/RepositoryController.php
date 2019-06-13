<?php

namespace App\Http\Controllers;

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
		if(!Auth::user()) {
			return redirect('/');
		}
	}


	public function index()
    {
	    $repository = DB::table('users')
	                     ->join('repositories', 'users.id', '=', 'repositories.user_id')
	                     ->orderBy('repositories.name' ,'asc')
	                     ->select('users.*', 'repositories.*')
	                     ->get();

	    return view('repositories.index' , compact('repository'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('repositories.create');
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
        $repository = Repository::find($id);
        return view('repositories.edit', compact('repository'));
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
		    'name' => 'required|unique:repositories',
	    ],
		    [
			    'name.required' => 'Repository name is required',
		    ]);

	    $repository = Repository::find($id);
	    $repository->name = $request->name;
	    $repository->user_id = Auth::id();
	    $repository->save();

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
