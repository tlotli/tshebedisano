<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{

	public function __construct() {
		$this->middleware('auth');
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contacts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("contacts.create");
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
        	'company_contact' => 'required',
	        'company_name' => 'required',
        ]);

        $contact = new Contact();
        $contact->company_name = $request->company_name;
        $contact->company_contact = $request->company_contact;
        $contact->cell_number = $request->cell_number;
        $contact->company_tel = $request->company_tel;
        $contact->company_fax = $request->company_fax;
        $contact->street_address = $request->street_address;
        $contact->city = $request->city;
        $contact->province = $request->province;
        $contact->email = $request->email;
        $contact->skype = $request->skype;
        $contact->facebook = $request->facebook;
        $contact->twitter = $request->twitter;
        $contact->linkedin = $request->linkedin;
        $contact->user_id = Auth::id();
        $contact->save();

        $log = Log::create([
        	'log' => Auth::user()->firstname . ' ' . Auth::user()->lastname . 'Created the following contact ' . $contact->company_name  . ' at ' . $contact->created_at,
        ]);

        Session::flash('success' ,'Contact was successfully updated');
        return redirect(route('contacts.index'));
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
        //
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
        //
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
