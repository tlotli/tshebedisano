<?php

namespace App\Http\Controllers;

use App\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function logs() {
		$logs = Log::orderBy('created_at' , 'DESC')->get();
		$title = 'Log History';
		$font_style = "fa fa-clipboard";

		return view('log' , compact('logs' ,'title' ,'font_style'));
	}
}
