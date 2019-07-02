<?php

namespace App\Http\Controllers;

use App\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$get_repos = DB::table('repositories')
		             ->join('repository_users' , 'repository_users.repository_id' ,'=' ,'repositories.id')
		             ->join('users' , 'users.id' , '=' ,'repository_users.user_id')
		             ->where('repository_users.user_id' , Auth::id())
		             ->select('repositories.*')
		             ->get();

    	$title = 'Repositories';
    	$font_style = "fa  fa-archive";
        return view('home' , compact('title' , 'font_style' , 'get_repos'));
    }
}
